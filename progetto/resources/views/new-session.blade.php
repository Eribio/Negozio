<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('storage/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>

<body>

<!-- ##### include Header Area Start ##### -->
@include('header')

<div class="right-side-cart-area">
@include ('cart', ['carts' => $carts])
<!-- ##### Right Side Cart End ##### -->
</div>

<section class="welcome_area bg-img background-overlay" style="background-image: url(
   /img/bg-img/bg-1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h2>New Collection</h2>
                    <a href="/shopping" class="btn essence-btn">view collection</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Woman Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                @foreach($prodwomans as $prodwoman)
                    <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href='/shop/single-product-details/{{$prodwoman->id}}'>
                                    <img src="{{asset('storage/img/'.$prodwoman->path.'.jpg')}}" alt="">
                                </a>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{$prodwoman->brand}}</span>
                                <a href="/shop/single-product-details/{{$prodwoman->id}}">
                                    <h6>{{$prodwoman->name}}</h6>
                                </a>
                                <p class="product-price">{{$prodwoman->price}}€</p>

                                <!-- Hover Content -->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
<!-- ##### New Arrivals Area End ##### -->

<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Man Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                @foreach($prodmans as $prodman)
                    <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href='/shop/single-product-details/{{$prodman->id}}'>
                                    <img src="{{asset('storage/img/'.$prodman->path.'.jpg')}}" alt="">
                                </a>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{$prodman->brand}}</span>
                                <a href='/shop/single-product-details/{{$prodman->id}}'>
                                    <h6>{{$prodman->name}}</h6>
                                </a>
                                <p class="product-price">{{$prodman->price}}€</p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Accessories</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                @foreach($accessories as $accessorie)
                    <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href='/shop/single-product-details/{{$accessorie->id}}'>
                                    <img src="{{asset('storage/img/'.$accessorie->path.'.jpg')}}" alt="">
                                </a>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{$accessorie->brand}}</span>
                                <a href="/shop/single-product-details/{{$accessorie->id}}">
                                    <h6>{{$accessorie->name}}</h6>
                                </a>
                                <p class="product-price">{{$accessorie->price}}€</p>

                                <!-- Hover Content -->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>

<!-- ##### New Arrivals Area End ##### -->

<!-- include Footer Menu -->
@include('footer')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

<script src={{asset('js/CategoryFilter.js')}}></script>
<script src={{asset('js/cart.js')}}></script>
<script src="{{asset('js/paginate.js')}}"></script>

<script src={{asset('js/cart.js')}}></script>

</body>

</html>
