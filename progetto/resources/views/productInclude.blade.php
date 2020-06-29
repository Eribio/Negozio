@foreach($products as $product)


    <!-- Single Product -->
    <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-product-wrapper">
            <!-- Product Image -->
            <div class="product-img">
                <a href='/shop/single-product-details/{{$product->id}}'>
                <img src="{{asset('/storage/img/'.$product->path.'.jpg')}}" alt="">
                </a>
                <!-- Hover Thumb -->
                <!--   <img class="hover-img" src="img/product-img/product-1.jpg" alt="">-->
                <!-- Favourite -->

            </div>

            <!-- Product Description -->
            <div class="product-description">
                <span>{{$product->brand}}</span>
                <a href='/shop/single-product-details/{{$product->id}}'>
                    <h6>{{$product->name}}</h6>
                </a>
                <p class="product-price">{{$product->price}}€</p>


            </div>
        </div>
    </div>
@endforeach

@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)

    <div class="w-100">
        {{ $products->links() }}
    </div>

@endif
