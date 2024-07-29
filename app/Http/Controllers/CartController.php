<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems;
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product_id']);
        Auth::user()->cartItems()->create([
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'price' => $product->price,
        ]);

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Auth::user()->cartItems()->find($id);

        if ($cartItem) {
            $validated = $request->validate([
                'quantity' => 'required|integer|min:1',
            ]);
            $cartItem->update(['quantity' => $validated['quantity']]);
            return redirect()->route('cart')->with('success', 'Cart updated successfully!');
        }

        return redirect()->route('cart')->with('error', 'Cart item not found!');
    }

    public function remove($id)
    {
        $cartItem = Auth::user()->cartItems()->find($id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart')->with('success', 'Cart item removed successfully!');
        }

        return redirect()->route('cart')->with('error', 'Cart item not found!');
    }

    public function checkout(Request $request)
    {
        // Implement your eSewa payment processing logic here

        // Example placeholder logic for order processing
        // Redirect to eSewa with necessary parameters
        return redirect('https://uat.esewa.com.np/epay/main')->with('success', 'Proceeding to checkout');
    }
}
