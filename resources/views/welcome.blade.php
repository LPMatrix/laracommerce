@extends('layouts.main')

@section('title')
<title>Ayency Stores</title>
@endsection


<style>
    .card{
        margin: 200px 0px !important;
    }
    .product_buttons > div > div svg {
        max-width: 15% !important;
        height: auto;
    }
    .modal-header{
        background: #f1c40f !important;
        color: #fff !important;
    }
    .btn-info{
        background: transparent !important;
        border:1px solid #000 !important;
        color: #242424 !important; 
    }

    .kill{
        background: transparent;
        border: 0px none;
        outline: none;
    }
    .kill:focus{
     
        outline: none;
    }
</style>


@section('content')
<!-- <div class="loader">
		<img src="{{ asset('images/ayLogo.jpg')}}" alt="salem_university_logo">
    </div> -->
    
    
<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

 

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">BUY NOW</div>
                </div>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <ul class="d-flex flex-row align-items-start justify-content-center">
                            <li class="active"><a href="category.html">Women</a></li>
                            <li><a href="category.html">Men</a></li>
                            <li><a href="category.html">Kids</a></li>
                            <li><a href="category.html">Home Deco</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row products_row">
                

        @foreach ($products as $key => $product)
            
        <!-- Product -->
        <div class="col-xl-4 col-md-6">
            <div class="product">
                <div class="product_image"><img src="{{ $product->image }}" alt=""></div>
                <div class="product_content">
                    <div class="product_info d-flex flex-row align-items-start justify-content-start">
                        <div>
                            <div>
                                <div class="product_name"><a href="{{ url('show') }}/{{$product->id}}">{{ $product->name }}</a></div>
                                <div class="product_category">In <a href="category.html">Category</a></div>
                            </div>
                        </div>
                        <div class="ml-auto text-right">
                            <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                            <div class="product_price text-right">${{ $product->price }}</div>
                        </div>
                    </div>
                    <div class="product_buttons">
                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                    <a href="{{ url('show') }}/{{$product->id}}" target="_blank"><div><img src="images/heart_2.svg" class="svg" alt="">
                    <p class="text-hide">{{$product->id}}</p></div></a>
                    </div>
                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                    <button  id="cart{{$product->id}}" class="kill" ><div><img src="images/cart.svg" class="svg" alt=""><p class="text-hide">{{$product->id}}</p></div></button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

            </div>
            <div class="row load_more_row">
                <div class="col">
                    <!-- <div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div> -->
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

   

    <!-- Features -->

    <div class="features">
        <div class="container">
            <div class="row">
                
                <!-- Feature -->
                <div class="col-lg-4 feature_col">
                    <div class="feature d-flex flex-row align-items-start justify-content-start">
                        <div class="feature_left">
                            <div class="feature_icon"><img src="images/icon_1.svg" alt=""></div>
                        </div>
                        <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                            <div class="feature_title">Fast Secure Payments</div>
                        </div>
                    </div>
                </div>

                <!-- Feature -->
                <div class="col-lg-4 feature_col">
                    <div class="feature d-flex flex-row align-items-start justify-content-start">
                        <div class="feature_left">
                            <div class="feature_icon ml-auto mr-auto"><img src="images/icon_2.svg" alt=""></div>
                        </div>
                        <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                            <div class="feature_title">Premium Products</div>
                        </div>
                    </div>
                </div>

                <!-- Feature -->
                <div class="col-lg-4 feature_col">
                    <div class="feature d-flex flex-row align-items-start justify-content-start">
                        <div class="feature_left">
                            <div class="feature_icon"><img src="images/icon_3.svg" alt=""></div>
                        </div>
                        <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                            <div class="feature_title">Free Delivery</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection