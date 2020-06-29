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
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- ##### Header Area Start ##### -->
@include('header')
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">
    @include ('cart', [ $carts,$cartsubtotal])

</div>


<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(public/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>COMPLETA L'ORDINE</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Indirizzo di fatturazione</h5>
                    </div>

                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Nome <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" value="{{$users[0]->name}}"
                                       required>
                            </div>
                            @if((empty($addresses[0])))

                                <div class="col-12 mb-3">
                                    <li><a href="/adress">CLICCA QUI PER INSERIRE IL TUO INDIRIZZO </a></li>
                                </div>
                            @else
                                <div class="col-12 mb-3">
                                    <li><a href="/adress">CLICCA QUI PER INSERIRE UN NUOVO INDIRIZZO! </a></li>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Indirizzo <span>*</span></label>
                                    <select class="w-100" id="Address">
                                        @foreach($addresses as $a)
                                            <option value="Address 1">
                                                <p style="color: black; line-height:2px;"> {{$a->street}} </p>
                                                <p style="color: black; line-height:2px;"> {{$a->city}} </p>
                                                <p style="color: black; line-height:2px;"> {{$a->province}} </p>
                                                <p style="color: black; line-height:2px;"> {{$a->cap}}</p>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-12 mb-3">
                                <label for="phone_number">Telefono<span>*</span></label>
                                <input type="number" class="form-control" id="phone_number"
                                       value="{{$users[0]->phone}}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Indirizzo e-mail <span>*</span></label>
                                <input type="email" class="form-control" id="email_address"
                                       value="{{$users[0]->email}}">
                            </div>

                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Termini e condizioni</label>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Il tuo ordine</h5>
                        <p>Dettagli</p>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Prodotto</span> <span>Totale</span></li>
                        @foreach($carts as $cart)
                            <li><span>{{$cart->name}}</span> <span>{{$cart->price}} €</span></li>
                        @endforeach

                        <li><span>Spedizione</span> <span>GRATUITA</span></li>
                        <li><span>Totale</span> <span>{{$cartsubtotal}}€</span></li>
                    </ul>

                    <div id="accordion" role="tablist" class="mb-4">
                        <div class="card">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <h6 class="mb-0">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">PAGA ALLA
                                            CONSEGNA</label>
                                    </h6>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h6 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree"
                                       aria-expanded="false" aria-controls="collapseThree">CARTA DI CREDITO</a>
                                </h6>
                            </div>
                            <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree"
                                 data-parent="#accordion">
                                @if(!(empty($cards[0])))
                                    <label for="street_address">La tua carta</label>

                                    @foreach($cards as $card)
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox d-block mb-2">
                                                <h6 class="mb-0">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck3">
                                                    <label class="custom-control-label"
                                                           for="customCheck3">{{$card->card_number}}</label>
                                                </h6>
                                            </div>

                                        </div>
                                    @endforeach

                                    <div class="col-12 mb-3">
                                        <li><a href="/my_card">CLICCA QUI PER AGGIUNGERE UNA NUOVA CARTA</a></li>
                                    </div>
                                @else
                                    <div class="col-12 mb-3">
                                        <li><a href="/my_card">CLICCA QUI PER AGGIUNGERE UNA NUOVA CARTA! </a></li>
                                    </div>

                                @endif


                            </div>
                        </div>


                        <a href="/pippo" class="btn essence-btn">Acquista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
@include('footer')
<!-- ##### Footer Area End ##### -->

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


    <script src={{asset('js/cart.js')}}></script>

</body>

</html>
