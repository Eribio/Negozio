<!-- Laravel genera automaticamente un "token" CSRF per ogni sessione utente attiva gestita
dall'applicazione. Questo token viene utilizzato per verificare che l'utente autenticato sia quello che
sta effettivamente facendo le richieste all'applicazione.

Ogni volta che si definisce un modulo HTML nella propria applicazione, è necessario includere un
campo token CSRF nascosto nel modulo in modo che il middleware di protezione CSRF possa convalidare
la richiesta. È possibile utilizzare la direttiva @csrf Blade per generare il campo token:-->
@csrf

@foreach($carts as $cart)

    <div class="single-cart-item">
        <a href="#" class="product-image">
            <img src={{asset('storage/img/'.$cart->path.'.jpg')}} class="cart-thumb" alt="">
            <!-- Cart Item Desc -->
            <div class="cart-item-desc">


                <span id="{{$cart->id}}" class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                <span class="badge">{{$cart->brand}}</span>
                <h6>{{$cart->name}}</h6>


                <p class="size">Taglia: {{$cart->size}}</p>


                <p class="price">{{$cart->price}}€</p>
                <span class="badge"> x {{$cart->quantity}}</span>


            </div>
        </a>
    </div>
@endforeach


