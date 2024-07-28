<?php

namespace App\Http\Controllers;

use Exception;
use App\Jobs\UserJob;
use App\Mail\Invoice;
use App\Models\Admin\Cart;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Variation;
use App\Models\Admin\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EsewaController extends Controller
{
    public function verifyPayment(Request $request)
    {
        $status = $request->q;
        $total_price = $request->amt;
        $oid = $request->oid;
        $refId = $request->refId;
        // dd($status);

        if($status == 'su'){
            //payement success
            $userID = session()->get('userData.id');
            $cartItems = Cart::where('user_id',$userID)->get()->toArray();

            $sum = array_reduce($cartItems, function($i, $arr)
            {
                return $i += $arr['sub_total'];
            });

            $verifyTransaction = SELF::verifyTransaction($request,$sum);
            if(strpos($verifyTransaction,'Success')){
                //verified..(process further)
                $allSufficientQuantity = SELF::checkSufficientQuantity($cartItems);
                if($allSufficientQuantity){
                    $orderData = Order::create([
                        'user_id' => $userID,
                        'date' => date('Y-m-d'),
                        'total_amount' => $sum,
                        'status' => 'Success'
                    ]);
                    foreach($cartItems as $cart){
                        $orderItemData = OrderDetail::create([
                            'variation_id' => $cart['variation_id'],
                            'order_id' => $orderData->id,
                            'quantity' => $cart['quantity'],
                            'sub_amount' => $cart['sub_total'],
                        ]);

                        $deleteCart = Cart::destroy($cart['id']);
                    }
                    $sendMail = SELF::sendMail($orderData->id);
                    return redirect('/user/order')->with('success','Successfully Added Order With Payment');
                }else{
                    return redirect('/user/order')->with('success','Payment Successfull');
                }
            }else{
                //not verified
                return redirect('/user/cart')->with('error','Payment Not Verified');
            }


        }else{
            //payement failed
            return redirect('/user/cart')->with('error','Payment failed');
        }
    }

    public function checkSufficientQuantity($cartItems)
    {
        DB::beginTransaction();
        try {
            foreach($cartItems as $cart)
            {
                $sufficientQuatity = Variation::where('id',$cart['variation_id'])->where('quantity', '>=',$cart['quantity'])->exists();
                if($sufficientQuatity){
                    Variation::where('id',$cart['variation_id'])
                    ->update([
                        'quantity' => DB::raw('quantity - '.$cart['quantity']),
                        'purchased_quantity' => DB::raw('purchased_quantity + '.$cart['quantity'])
                    ]);
                }else{
                    //Insufficient quantity
                    // DB::rollBack();
                    // return false;
                }
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function verifyTransaction($data, $sum)
    {
        $url = "https://uat.esewa.com.np/epay/transrec";
        $data =[
            'amt'=> $sum,
            'rid'=> $data->refId,
            'pid'=> $data->oid,
            'scd'=> 'EPAYTEST'
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function sendMail($order_id)
    {
        $orderData = Order::with('order_detail.variation.shoe:id,name,price','user:id,name,email')->where('id',$order_id)->get()->first();
        dispatch(new UserJob($orderData));
        // Mail::to($orderData->user->email)->send(new Invoice($orderData));
        // dispatch(function () {
        //     Mail::to($orderData->user->email)->send(new Invoice($orderData));
        // })->afterResponse();
    }
}
