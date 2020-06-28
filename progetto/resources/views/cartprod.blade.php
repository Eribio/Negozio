<!-- Single Cart Item -->
@csrf

@foreach($carts as $cart)

    <div class="single-cart-item">
        <a href="#" class="product-image">
            <img src={{asset('storage/img/'.$cart->path.'.jpg')}} class="cart-thumb" alt="">
            <!-- Cart Item Desc -->
            <div class="cart-item-desc">


                <span id="{{$cart->id}}" class="product-remove" ><i class="fa fa-close" aria-hidden="true"></i></span>
                <span class="badge">{{$cart->brand}}</span>
                <h6>{{$cart->name}}</h6>

                @if(!(empty($cart->size)))

                <p class="size" >Size: {{$cart->size}}</p>

                @endif

                <p class="price">{{$cart->price}}€</p>
                <span class="badge"> x {{$cart->quantity}}</span>


             </div>
        </a>
    </div>
@endforeach


