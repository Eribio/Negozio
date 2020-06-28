
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

<!-- ##### Right Side Cart End ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">
@include ('cart', ['carts' => $carts])
<!-- ##### Right Side Cart End ##### -->
</div>

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>MY ADDRESSES </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">

    <div class="container">

        <div class="row">

            <div class="col-12 col-md-4 col-lg-3">


                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">My Account</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul>
                                <li > <a id="myorders" href="/my_orders" > My Orders</a></li>
                                <li><a href="/data"> My Data</a></li>
                                <li><a href="/adress">  My Adresses</a></li>
                                <li><a href="/my_card">  My Card</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>




            <div id="d" class="col-12 col-md-8 col-lg-9">
                <div class="card">
                    <div class="card-header  bg-secondary text-white">ADDRESES </div>
                    <div class="card-body">



                        @if (isset($addresses))
                            @if (count($addresses)>0)
                      @foreach($addresses as $address)
                                        <p style="color: black; line-height:2px;"> Street: {{$address->street}} </p>
                                        <p style="color: black; line-height:2px;"> City: {{$address->city}} </p>
                                        <p style="color: black; line-height:2px;"> Province: {{$address->province}} </p>
                                        <p style="color: black; line-height:2px;"> Cap: {{$address->cap}} <hr></p>

                                @endforeach
                                @else
                                    <p class="card-text text-black">no addresses yet!</p>

                                @endif
                                    @endif

                        <input id="addbutton" class="card-link"  type="button" value="Add ▼" onclick="addNewAddress();" />
                        <form action="{{route('users.store')}}" method="post">
                            @csrf
                        <div id="addadress" class="add address">






                        </div>
                        </form>
                    </div>

                </div><br>




            </div>

            <!-- Pagination -->
            <nav aria-label="navigation">

            </nav>

        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->

<!-- ##### Footer Area Start ##### -->
@include('footer')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src={{asset('js/jquery/jquery-2.2.4.min.js')}}></script>
<!-- Popper js -->
<script src={{asset('js/popper.min.js')}}></script>
<!-- Bootstrap js -->
<script src={{asset('js/bootstrap.min.js')}}></script>
<!-- Plugins js -->
<script src={{asset('js/plugins.js')}}></script>
<!-- Classy Nav js -->
<script src={{asset('js/classy-nav.min.js')}}></script>
<!-- Active js -->
<!-- Active js -->
<script src={{asset('js/active.js')}}></script>
<script src={{asset('js/CategoryFilter.js')}}></script>
<script src={{asset('js/cart.js')}}></script>
<script src="{{asset('js/paginate.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  function addNewAddress()
  {
   var x= document.getElementById("addbutton").value;

      if (x== "Add ▼"){

          document.getElementById("addadress").innerHTML=('<br><div class="row"> <div class="col-12 mb-3"> <label for="street">Address <span>*</span></label>   <input type="text" class="form-control mb-3" name="street" id="street" value=""> </div> <div class="col-12 mb-3">  <label for="city">Town/City <span>*</span></label> <input type="text" class="form-control" name="city" id="city" value=""> </div>  <div class="col-12 mb-3"> <label for="province">Province <span>*</span></label>  <input type="text" class="form-control"  name="province" id="province" value=""> </div> <div class="col-12 mb-3"> <label for="cap">Postcode <span>*</span></label> <input type="text" class="form-control"  name="cap" id="cap" value=""> </div>  </div> <div class="col-md-6 offset-md-4"><button type="submit" class="btn btn-primary"> Update Data        </button>    </div>');





          document.getElementById("addbutton").setAttribute("value","Add ▲");


   }
   else if (x=="Add ▲"){
       document.getElementById("addbutton").setAttribute("value","Add ▼");
          document.getElementById("addadress").innerText=' ';

   }
  }
</script>
</body>

</html>
