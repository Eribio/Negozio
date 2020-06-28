

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src={{asset('img/core-img/bag.svg')}} alt=""> </a>
    </div>



    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
        @include ('cartprod', [$carts])
        </div>


         @if(!(empty($carts[0])))

        <!-- Cart Summary -->
        <div class="cart-amount-summary">
            <h2>Summary</h2>
            <ul class="summary-table">
                <li><span>Subtotal:</span> <span>{{$cartsubtotal}}€</span></li>
                <li><span>Delivery:</span> <span>Free</span></li>
                <li><span>Total:</span> <span>{{$cartsubtotal}}€</span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="/checkout" class="btn essence-btn">CHECKOUT</a>
            </div>
        </div>
    @endif
    </div>
</div>
