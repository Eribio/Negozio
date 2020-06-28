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
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
   @include('header')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">
    @include ('cart',  [$carts, $cartsubtotal])
    <!-- ##### Right Side Cart End ##### -->
    </div>
    <!-- ##### Single Product Details Area Start ##### -->

    <section class="single_product_details_area d-flex align-items-center">
    @if(!(empty($details)))
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
                <div class="product-img">
                    <img src="{{asset('storage/img/'.$details[0]->path.'.jpg')}}" alt="">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix" id="{{$details[0]->id}}">
            <span>{{$details[0]->brand}}</span>
            <a>
                <h2>{{$details[0]->name}}</h2>
            </a>
            <p class="product-price">{{$details[0]->price}}€</p>
            <p class="product-desc">{{$details[0]->description}}</p>
            @endif
            <!-- Form -->
            <!--  <form class="cart-form clearfix" method="post"> -->
                 <!-- Select Box -->
            @if(empty($measure[0]))
                <div class="cart-fav-box d-flex align-items-center">
                    <h4> This product is not available </h4>
                    <div class="product-favourite ml-4" id="whisheshandler">
                        @if(empty($wishlist))
                            <a class="favme fa fa-heart" id="add"></a>
                        @else
                            <a class="favme fa fa-heart active is_animating" id="remove"></a>
                        @endif
                    </div>
                </div>
            @else
            @if($details[0]->type !== 'Accessories')
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        @foreach($measure as $m)
                        <option value="{{$m->size}}">Size: {{$m->size}}</option>
                            @endforeach

                    </select>
                </div>
            @endif

                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!--Cart -->
                    <button id="addcart" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->

                    <div class="product-favourite ml-4" id="whisheshandler" >
                        @if(empty($wishlist))
                        <a class="favme fa fa-heart" id="add"></a>
                        @else
                            <a class="favme fa fa-heart active is_animating" id="remove"></a>
                            @endif
                    </div>

               </div>
                <!-- </form> -->
            @endif
            </div>
        </section>

    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Suggested</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    @foreach($prds as $prd)
                        <!-- Single Product -->
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <a href='/shop/single-product-details/{{$prd->id}}'>
                                        <img src="{{asset('storage/img/'.$prd->path.'.jpg')}}" alt="">
                                    </a>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <span>{{$prd->brand}}</span>
                                    <a href="/shop/single-product-details/{{$prd->id}}">
                                        <h6>{{$prd->name}}</h6>
                                    </a>
                                    <p class="product-price">{{$prd->price}}€</p>

                                    <!-- Hover Content -->

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
        <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('footer')
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- Classy Nav js -->
    <script src="{{asset('js/classy-nav.min.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>

    <script src={{asset('js/cart.js')}}></script>
    <script src={{asset('js/CategoryFilter.js')}}></script>
    <script src="{{asset('js/paginate.js')}}"></script>
    <script src={{asset('js/addtowish.js')}}></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.option', function () {
                console.log($(this).attr('data-value'));
                $('.current').attr('value', $(this).attr('data-value'));
            });
        });
    </script>


</body>

</html>

