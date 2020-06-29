<!-- Cart Button -->
<div class="cart-button">
    <a href="#" id="rightSideCart"><img src={{asset('img/core-img/bag.svg')}} alt=""> </a>
</div>


<div class="cart-content d-flex">

    <!-- Cart List Area-->
    <div class="cart-list">
        @include ('cartprod', [$carts])
    </div>


@if(!(empty($carts[0])))

    <!-- Cart Summary -->
        <div class="cart-amount-summary">
            <h2>Riepilogo</h2>
            <ul class="summary-table">
                <li><span>Consegna:</span> <span>Gratuita</span></li>
                <li><span>Totale:</span> <span>{{$cartsubtotal}}€</span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="/checkout" class="btn essence-btn">Procedi all'ordine</a>
            </div>
        </div>
    @endif
</div>
