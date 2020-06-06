@extends('layouts.main')

@section('title')
<title>Cart - Ayency Stores</title>
@endsection


@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="../plugins/flexslider/flexslider.css">
<link rel="stylesheet" type="text/css" href="../css/cart.css">
<link rel="stylesheet" type="text/css" href="../css/cart_responsive.css">
@endsection

@section('content')

<div class="super_container">

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Home -->

        <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Shopping Cart</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="#">Home</a></li>
                            <li>Your Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart -->

        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="cart_container">

                            <!-- Cart Bar -->
                            <div class="cart_bar">
                                <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                    <li class="mr-auto">Product</li>
                                    <li>Price</li>
                                    <li>Quantity</li>
                                    <li>Total</li>
                                </ul>
                            </div>

                            <!-- Cart Items -->
                            <div class="cart_items">
                                <ul class="cart_items_list" id="remove-refresh">
                                    @if(Session::has('cart'))
                                        
                                    @foreach($products as $product)
                                        <!-- Cart Item -->
                                        <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                            <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                                <div><a href="#{{ $product['item'] ['id']}}" class="product_number close" id="removeItem{{ $product['item'] ['id']}}">
                                                    &times;
                                                </a></div>
                                                <div><div class="product_image"><img src="{{ $product['item'] ['image']}}" alt=""></div></div>
                                                <div class="product_name_container">
                                                    <div class="product_name"><a href="product.html">{{ $product['item'] ['name'] }}</a></div>
                                                    {{-- <div class="product_text">{{ $product['item'] ['description']}}</div> --}}
                                                </div>
                                            </div>
                                        
                                            <div class="product_price product_text"><span>Price: </span>${{ $product['item']['price']}}</div>
                                            <div class="product_quantity_container">
                                                <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                    <span class="product_text product_num">{{ $product['qty'] }}</span>
                                                    <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                                                    <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
                                                </div>
                                            </div>
                                            <div class="product_total product_text"><span>Total: </span>${{ $totalPrice}}</div>
                                        </li>          
                                    @endforeach
                                            
                                    @else
                                        
                                     <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                            <h4>Cart is Empty</h4>
                                        </li>          

                                    @endif

                                    
                                </ul>
                            </div>

                            <!-- Cart Buttons -->
                            <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="button button_clear trans_200"><a href="categories.html">clear cart</a></div>
                                    <div class="button button_continue trans_200"><a href="categories.html">continue shopping</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row cart_extra_row">
                    <div class="col-lg-6">
                        <div class="cart_extra cart_extra_1">
                            <div class="cart_extra_content cart_extra_coupon">
                                <div class="cart_extra_title">Coupon code</div>
                                <div class="coupon_form_container">
                                    <form action="#" id="coupon_form" class="coupon_form">
                                        <input type="text" class="coupon_input" required="required">
                                        <button class="coupon_button">apply</button>
                                    </form>
                                </div>
                                <div class="coupon_text">Phasellus sit amet nunc eros. Sed nec congue tellus. Aenean nulla nisl, volutpat blandit lorem ut.</div>
                                <div class="shipping">
                                    <div class="cart_extra_title">Shipping Method</div>
                                    <ul>
                                        <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                            <label class="radio_container">
                                                <input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio">
                                                <span class="radio_mark"></span>
                                                <span class="radio_text">Next day delivery</span>
                                            </label>
                                            <div class="shipping_price ml-auto">$4.99</div>
                                        </li>
                                        <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                            <label class="radio_container">
                                                <input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio">
                                                <span class="radio_mark"></span>
                                                <span class="radio_text">Standard delivery</span>
                                            </label>
                                            <div class="shipping_price ml-auto">$1.99</div>
                                        </li>
                                        <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                            <label class="radio_container">
                                                <input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" checked>
                                                <span class="radio_mark"></span>
                                                <span class="radio_text">Personal Pickup</span>
                                            </label>
                                            <div class="shipping_price ml-auto">Free</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 cart_extra_col">
                        <div class="cart_extra cart_extra_2">
                            <div class="cart_extra_content cart_extra_total">
                                <div class="cart_extra_title">Cart Total</div>
                                <ul class="cart_extra_total_list">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Subtotal</div>
                                        <div class="cart_extra_total_value ml-auto">$29.90</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Shipping</div>
                                        <div class="cart_extra_total_value ml-auto">Free</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_extra_total_title">Total</div>
                                        <div class="cart_extra_total_value ml-auto">$29.90</div>
                                    </li>
                                </ul>
                                <div class="checkout_button trans_200"><a href="checkout.html">proceed to checkout</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection

@section('script')
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/toastr.init.js') }}"></script>
<script src="../js/cart.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    }); 
    $(document).ready(function() {

        $('[id^=removeItem]').each(function(index, el) {
            $(this).click(function(event) {
                event.preventDefault();
                var id = $(this). attr("href").replace(/[^0-9]/gi, '').trim();
                console.log(id);
                $(this). attr("href"); 
                $.ajax({

                    url: '/remove/'+id+'',
                    type: "GET", 
                    success: function(response) {
                         var type = (response.alert);
                          switch(type){
                              case 'info':
                                  toastr.info(response.message);
                                  break;
                              case 'warning':
                                  toastr.warning(response.message);
                                  break;
                              case 'success':
                                  toastr.success(response.message);
                                  break;
                              case 'error':
                                  toastr.error(response.message);
                                  break;
                         
                         }
                   
                    $('#cart-refresh').load(location.href + ' #cart-refresh');
                    $('#remove-refresh').load(location.href + ' #remove-refresh');
                    console.log(response);     
                  }
                });
                    // $(this).load(location.href + this);

             });
           
        

        });

      
    });  


</script>


@endsection
