$(document).ready(function() {

    let name;
    let sex;


    $('.sub-menu').on('click','li' ,function(){
        var pluto = $(this).parent('.collapse').attr('id');
        console.log(pluto);
        sex=pluto;
        var pd = $(this).attr('value');
        var pc= $(this).attr('id');
        if(pd!=null) {
            name=pc;
            console.log(pd);
            console.log(pc);
            $.get(pd, function (data) {
                $('#html').html(data);
                console.log('ok');
            });

        }



    });



    // il name è tipo shirt, tshirt capss...
    // sex è woman man
    // funzione per il filtro dei prezzi

    $('#cazzettiPiccoli').on('click','li', function () {
        console.log('------------------------------------------------------------------------');

        console.log(name);
        console.log(sex)
        var pd = $(this).attr('value');
        console.log(pd);

        if(pd!=null) {


            $.get( pd, { name:name , sex:sex}, function (data) {
                $('#html').html(data);
                console.log('ok');
            });

        }



    });

    // funzione per i brand


    $('#canePazzoPazzoCane').on('click','li', function () {
        console.log('------------------------------------------------------------------------');
        var url=window.location.pathname;
        var urlsplit=url.split("/").slice(-1)[0];
        console.log(urlsplit);
        if (sex==null){
            sex=urlsplit;
        }
        console.log(name);
        console.log(sex);

        var pd = $(this).attr('value');

        console.log(pd);

        if(pd!=null) {


            $.get( pd, { sex:sex, name:name }, function (data) {
                $('#html').html(data);
                console.log('ok');
            });



        }



    })
});