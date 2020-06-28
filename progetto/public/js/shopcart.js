$( document ).ready(function() {
    $(document).on('click', '#addcart', function () {
        var a = $(this).attr('value');
        var url = '/shop/single-product-details/'+ a +'/add';
        console.log(url);
        $.get(url, function (data) {
            $( ".right-side-cart-area" ).html( data );
        });
    });
});

    $(document).on("click", '.product-remove', function () {
        var data = $(this).attr("id");
        console.log(data);
        $.get("/shop/single-product-details/" + data + "/remove", function (data) {
            $(".right-side-cart-area").html(data);

        });
    })
