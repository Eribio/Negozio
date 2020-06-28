
$( document ).ready(function() {
    $('#addcart').click(function () {

        var sizes= $('.current').attr("value");
        var data = $('.single_product_desc').attr("id");
        console.log(data);
        console.log(sizes);
        $.get( "/shop/single-product-details/"+data+"/"+sizes+"/add" ,  function( data ) {

            $( ".right-side-cart-area" ).html( data);

            Swal.fire({
                type: 'success',
                title: 'Added to Cart!',
                showConfirmButton: false,
                timer: 3000
            });
                   })
            .fail(function() {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'You have not logged in!',
                    footer: '<a href="/login">Log in</a>'
                })
            });
    });
});


    $(document).on("click", '.product-remove', function () {
        var datas = $(this).attr("id");

        console.log(datas) ;


       $.get( "/shop/single-product-details/"+datas+"/remove", function( data ) {
           $( ".right-side-cart-area" ).html( data );
       });
    });

