<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .navbar {
            background-color: #b5c99a; /* Light brown background color */
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }
        .nav-item {
            margin-left: 30px;
        }
        .btn-outline-secondary {
            background-color: #b5c99a;
            color: black;
        }
        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .signin {
            background-color: #1c2331;
            color: white;
            font-weight: 200;
            border-radius: 5px;
        }
        .custom-card {
            position: relative;
            overflow: hidden;
        }
        .custom-card img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease-in-out; /* Smooth transition for motion effect */
        }
        .custom-card:hover img {
            transform: scale(1.1); /* Scale up the image on hover */
        }
        .card-bottom-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
            color: white;
            text-align: center;
            padding: 20px;
        }
        .empty {
            height: 20px;
            width: 100%;
        }
        .emptytwo {
            height: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-link active" aria-current="page" href="index.html">
                <img src="{{ asset('assets/image/logo1.png') }}" alt="Yfasma" style="height: 40px; padding-top: 0; margin-top: 0;">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}" style="padding-bottom:0">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('designer') }}" style="padding-bottom:0">Designer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('aboutus') }}" style="padding-bottom:0">About</a>
                    </li>
                    @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'designer'))
                    <li class="nav-item">
                        <a class="nav-link" href="#">Upload</a>
                    </li>
                @endif
                    <!-- Add other menu items as needed -->
                    @auth
                        {{-- <li class="nav-item">
                            <a class="nav-link active" href="{{ route('cart') }}" style="padding-bottom:0">Cart</a>
                        </li> --}}
                    @endauth
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <div id="the-basics">
                        <div class="input-group">
                            <input name="searchField" id="searchField" type="search" class="form-control form-control-dark" style="width: 426px;">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                <a href="cart.html" class="me-2">
                    <img src="{{ asset('assets/image/cart.png') }}" alt="Cart" style="height: 25px; padding-top: 0; margin-top: 0;">
                </a>
                <!-- Login button -->
                <button class="signin" type="submit">
                    <a href="login.html" style="text-decoration: none; color: white;">Login</a>
                </button>
            </div>
        </div>
    </nav>
    <section class="page-banner">
     <div class="container">
         <div class="page-banner-in">
             <div class="row">
                 <div class="col-xl-6 col-lg-6 col-12">
                     <h1 class="page-banner-title text-uppercase">Shopping Cart</h1>
                 </div>
 <!--                 <div class="col-xl-6 col-lg-6 col-12">
                     <ul class="right-side">
                         <li><a href="index.html">Home</a></li>
                         <li>Cart</li>
                     </ul>
                 </div> -->
             </div>
         </div>
     </div>
 </section>
 <section class="pt-100 container" x-data="cartItem({{$cartItems}})" @update-cart.window="updateCart($event.detail)">
     <div class="row">
         <div class="wishlist-table col-md-8">
             <div class="responsive-table">
                 <table class="table border text-center">
                     <thead>
                         <tr>
                             <th>Product</th>
                             <th>Size</th>
                             <th>Price(Rs.)</th>
                             <th>Quantity</th>
                             <th>Sub Total(Rs.)</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <template x-for="(cart,key) in cartItems" :key="key">
                             <tr>
                                 <td class="text-left">
                                     <div class="seller-box align-flax w-100">
                                         <div class="seller-img">
                                             <a  x-bind:href="'/shoe-detail/'+cart.variation.shoe.id" class="display-b">
                                                 <template x-if="cart.variation.shoe.imageURL == null">
                                                     <img src="{{ asset('assets/img/default_shoe.png') }}" class="transition" style="opacity: 0.5;">
                                                 </template>
                                                 <template x-if="cart.variation.shoe.imageURL != null">
                                                     <img :src="cart.variation.shoe.imageURL" alt="product" class="transition">
                                                 </template>
                                             </a>
                                         </div>
                                         <div class="seller-contain pl-15">
                                             <a x-bind:href="'/shoe-detail/'+cart.variation.shoe.id"
                                                 class="product-name text-uppercase" x-text="cart.variation.shoe.name"></a>
                                         </div>
                                     </div>
                                 </td>
                                 <td><span class="price" x-text="cart.variation.size"></span></td>
                                 <td><span class="price" x-text="cart.price"></span></td>
                                 <td>
                                     <!-- <select data-id="100" class="quantity_cart" name="quantity_cart">
                                         <option value="1">1</option>
                                         <option selected="" value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                     </select> -->
                                     <div class="custom-qty">
                                         <button
                                             @click="decreaseQuantityValue(cart.id)"
                                             class="reduced items btn very-small" type="button"> <i class="fa fa-minus"></i> </button>
                                         <input type="text" class="input-text qty" title="Qty"
                                             :value="cart.quantity" maxlength="8" :id="'qty-'+cart.id" :data-id="cart.variation.id" name="qty">
                                         <button
                                             @click="increaseQuantityValue(cart.id)"
                                             class="increase items btn very-small" type="button"> <i
                                                 class="fa fa-plus"></i> </button>
                                     </div>
                                 </td>
                                 <td><span class="price" x-text="cart.sub_total"></span></td>
                                 <td>
                                     <ul>
                                         <li><a @click="deleteCart(cart.id)" style="background-color:#4e5fa9;"><i class="fa fa-trash-o text-white" aria-hidden="true"></i></a></li>
                                     </ul>
                                 </td>
                             </tr>
                         </template>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="share-wishlist shoping-con">
                         <a href="{{ url('/') }}" class="btn small"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-4">
             <div class="cart-total-table">
                 <div class="responsive-table">
                     <table class="table border">
                         <thead>
                             <tr>
                                 <th colspan="2">Cart Total</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>Total (Rs.)</td>
                                 <td>
                                     <div class="price-box">
                                         <span class="price" x-text="cartItems.reduce((n, {sub_total}) => n + sub_total, 0)"></span>
                                     </div>
                                 </td>
                             </tr>
                             {{-- <tr>
                                 <td>Shipping (Rs.)</td>
                                 <td>
                                     <div class="price-box">
                                         <span class="price">0.00</span>
                                     </div>
                                 </td>
                             </tr> --}}
                             <tr>
                                 <td class="payable"><b>Amount Payable (Rs.)</b></td>
                                 <td>
                                     <div class="price-box">
                                         <span class="price" x-text="cartItems.reduce((n, {sub_total}) => n + sub_total, 0)" id="checkout-price"></span>
                                     </div>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 <div class="share-wishlist">
                     <form action="https://uat.esewa.com.np/epay/main" method="POST" x-data="checkoutForm(cartItems)" @submit.prevent="submitForm()" id="checkoutForm">
                         <input value="100" name="tAmt" type="hidden" id="tAmt">
                         <input value="90" name="amt" type="hidden" id="amt">
                         <input value="0" name="txAmt" type="hidden">
                         <input value="0" name="psc" type="hidden">
                         <input value="0" name="pdc" type="hidden">
                         <input value="EPAYTEST" name="scd" type="hidden">
                         <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d455" name="pid" type="hidden" id="pid">
                         <input value="http://127.0.0.1:8000/user/payment-verify?q=su" type="hidden" name="su">
                         <input value="http://127.0.0.1:8000/user/payment-verify?q=fu" type="hidden" name="fu">
                         <input value="Proceed to checkout" type="submit" class="btn small text-white">
                     </form>
                 </div>
             </div>
         </div>
     </div>
 <!--     @if(session('error'))
         <div class="alert alert-danger mt-3">{{session('error')}}</div>
     @endif -->
 </section>

 <script>

     function loadInfo(info,action)
     {
         let event = new CustomEvent("load-"+action+"-detail", {
             detail: info
         });
         window.dispatchEvent(event);
     }

     function cartItem(cartItems){
         return{
             cartItems:cartItems,
             updateCart(cartData)
             {
                 this.cartItems = cartData
             }
         }
     }

     var getLatestData = function()
     {
         axios.get('cart/latestData')
         .then(response => {
             let event = new CustomEvent('update-cart', {
                 detail: response.data
             });
             window.dispatchEvent(event);
         }).catch(err => {
             vt.error(err.response.data.message);
         }).finally(()=>{
         })
     }

     function deleteCart(id)
     {
         // console.log(id);
         axios.delete('cart/'+id)
         .then(res => {
             vt.success(res.data);
             let cartCount = $('.count-cart-item').text();
             cartCount = $.trim(cartCount);
             cartCount = cartCount - 1;
             $('.count-cart-item').text(cartCount);
         })
         .catch(err => {
             vt.error(err.response.data.message);
         })
         .finally(() => {
             getLatestData();
         })
     }

     function decreaseQuantityValue(cartID)
     {
         let formData = {};
         let quantityValue = $('#qty-'+cartID).val();
         quantityValue = parseInt(quantityValue) - 1;
         if(quantityValue > 0){
             formData.quantityValue = quantityValue;
             formData.variation_id = $('#qty-'+cartID).data("id");
             // console.log(formData);
             axios.patch('cart/'+cartID,formData)
             .then(res => {
                 vt.success(res.data);
                 $('#qty-'+cartID).val(quantityValue);
             })
             .catch(err => {
                 vt.error(err.response.data.message);
             })
             .finally(() => {
                 getLatestData();
             })
         }else{
             return false;
         }
     }

     function increaseQuantityValue(cartID)
     {
         let formData = {};
         let quantityValue = $('#qty-'+cartID).val();
         quantityValue = parseInt(quantityValue) + 1;
         if(quantityValue > 0){
             formData.quantityValue = quantityValue;
             formData.variation_id = $('#qty-'+cartID).data("id");
             // console.log(formData);
             axios.patch('cart/'+cartID,formData)
             .then(res => {
                 vt.success(res.data);
                 $('#qty-'+cartID).val(quantityValue);
             })
             .catch(err => {
                 vt.error(err.response.data.message);
             })
             .finally(() => {
                 getLatestData();
             })
         }else{
             return false;
         }
     }

     function checkoutForm(cartItems)
     {
         let total_price = cartItems.reduce((n, {sub_total}) => n + sub_total, 0);
         return{
             cartItems:cartItems,
             total_price:total_price,
             submitForm(){
                 if(this.cartItems.length > 0)
                 {
                     axios.post('order',this.cartItems)
                     .then(res => {
                         //Sufficient quantity
                         Swal.fire({
                             title: res.data,
                             icon: 'success',
                             showCancelButton: true,
                             cancelButtonText: 'Continue Shopping...',
                             confirmButtonColor: '#4e5fa9',
                             confirmButtonText: 'Checkout Using Esewa'
                         })
                         .then(function(result) {
                             let total_amount = $('#checkout-price').text().trim();
                             if (result.value) {
                                 //proceed for checkout
                                 $('#pid').val('ee2c3ca1-696b-4cc5-a6be-'+makeid());
                                 $('#tAmt').val(total_amount);
                                 $('#amt').val(total_amount);
                                 $('#checkoutForm').submit();
                             }
                         });
                     })
                     .catch(err => {
                         vt.error(err.response.data.message);
                     })
                     .finally(() => {
                         //do nothing...
                     })
                 }
             }
         }
     }

     function makeid() {
         let text = "";
         let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
         for (var i = 0; i < 5; i++){
             text += possible.charAt(Math.floor(Math.random() * possible.length));
         }
         return text;
     }
 </script>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
           <!--footer-->
           <div class="container-fluid p-0">
             <!-- Footer -->
             <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
                     <!-- Left -->

                     <!-- Right -->
                     <div>
                         <a href="" class="text-white me-4">
                             <i class="fab fa-facebook-f"></i>
                         </a>
                         <a href="" class="text-white me-4">
                             <i class="fab fa-twitter"></i>
                         </a>
                         <a href="" class="text-white me-4">
                             <i class="fab fa-google"></i>
                         </a>
                         <a href="" class="text-white me-4">
                             <i class="fab fa-instagram"></i>
                         </a>
                         <a href="" class="text-white me-4">
                             <i class="fab fa-linkedin"></i>
                         </a>
                         <a href="" class="text-white me-4">
                             <i class="fab fa-github"></i>
                         </a>
                     </div>
                     <!-- Right -->
                 <!-- Section: Social media -->

                 <!-- Section: Links  -->
                 <section class="">
                     <div class="container text-center text-md-start mt-5">
                         <!-- Grid row -->
                         <div class="row mt-3">
                             <!-- Grid column -->
                             <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                 <!-- Content -->
                                 <h6 class="text-uppercase fw-bold">Yfasma</h6>
                                 <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                                 <p>
                                     Our website is based on providing our customers about their customs design dress according to their needs. mainly our website focused on events.
                                 </p>
                             </div>
                             <!-- Grid column -->

                             <!-- Grid column -->
                             <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                 <!-- Links -->
                                 <h6 class="text-uppercase fw-bold">Products</h6>
                                 <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                                 <p>
                                     <a href="cultural.html" class="text-white">Cultural</a>
                                 </p>
                                 <p>
                                     <a href="western.html" class="text-white">Western</a>
                                 </p>
                                 <p>
                                     <a href="women.html" class="text-white">Women</a>
                                 </p>
                                 <p>
                                     <a href="men.html" class="text-white">Men</a>
                                 </p>
                             </div>
                             <!-- Grid column -->

                             <!-- Grid column -->
                             <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                 <!-- Links -->
                                 <h6 class="text-uppercase fw-bold">Useful links</h6>
                                 <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                                 <p>
                                     <a href="#!" class="text-white">Your Account</a>
                                 </p>
                                 <p>
                                     <a href="#!" class="text-white">Become an Affiliate</a>
                                 </p>
                                 <p>
                                     <a href="#!" class="text-white">Shipping Rates</a>
                                 </p>
                                 <p>
                                     <a href="#!" class="text-white">Help</a>
                                 </p>
                             </div>
                             <!-- Grid column -->

                             <!-- Grid column -->
                             <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                 <!-- Links -->
                                 <h6 class="text-uppercase fw-bold">Contact</h6>
                                 <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                                 <p><i class="fas fa-home mr-3"></i>Mid-Baneshor, Kathmandu, Nepal</p>
                                 <p><i class="fas fa-envelope mr-3"></i>info@yfasma.com</p>
                                 <p><i class="fas fa-phone mr-3"></i> + 977 551 2345</p>
                                 <p><i class="fas fa-print mr-3"></i> + 977 551 2346</p>
                             </div>
                             <!-- Grid column -->
                         </div>
                         <!-- Grid row -->
                     </div>
                 </section>
                 <!-- Section: Links  -->

                 <!-- Copyright -->
                 <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                     © 2024 Copyright:
                     <a class="text-white" href="https://mdbootstrap.com/">Yfasma</a>
                 </div>
                 <!-- Copyright -->
             </footer>
             <!-- Footer -->

         </div>
       </body>
     </html>
