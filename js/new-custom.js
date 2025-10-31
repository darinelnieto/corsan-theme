/*============ Tabs products home =============*/
$('.tabs-content').on('click', 'a', function(e){
    var item = $(this).attr('href');
    $('.tabs a').removeClass('active');
    $(this).addClass('active');
    $('.the-tabs').removeClass('active');
    $(item).addClass('active');
    e.preventDefault();
});
/*=========== Category solutions ===========*/
$('.taxonomies-partial-a0ac83').on('click', '.card-content', function(){
    $('.card-taxonomy').removeClass('active');
    $(this).parent().addClass('active');
});
/*=========== Menú ===========*/
var product_name = '';
$(()=>{
    if($(window).width() > 768){
        let submenuTimeout;
        // Hover sobre los enlaces del menú principal
        $('.submenu').on('mouseenter', 'a', function() {
            clearTimeout(submenuTimeout);
            $('#submenu').addClass('active');

            // guardamos cuál es el item activo
            $('.submenu a').removeClass('active');
            $(this).addClass('active');
        });

        // Cuando el mouse sale del enlace del menú principal
        $('.submenu').on('mouseleave', 'a', function() {
            submenuTimeout = setTimeout(() => {
                $('#submenu').removeClass('active');
                $('.submenu a').removeClass('active');
                $('.menus ul').removeClass('active');
                $('#product-image').html('');
            }, 150); // pequeño delay por si entra al submenu
        });

        // Cuando el mouse entra al submenu (para mantenerlo abierto)
        $('#submenu').on('mouseenter', function() {
            clearTimeout(submenuTimeout);
            $(this).addClass('active');
        });

        // Cuando el mouse sale del submenu (para cerrarlo)
        $('#submenu').on('mouseleave', function() {
            submenuTimeout = setTimeout(() => {
                $(this).removeClass('active');
                $('.submenu a').removeClass('active');
                $('.menus ul').removeClass('active');
                $('#product-image').html('');
            }, 150);
        });

        // Mostrar subcategorías y productos
        $('.menus').on('mouseover', '.name-category', function() {
            $('.menus ul').removeClass('active');
            $(this).parent().children('ul').addClass('active');
        });

        $('.menus').on('mouseover', '.the-product', function() {
            product_name = $(this).text();
            getProduct();
        });
    }else{
        var status_bar = false;
        $('.bar-menu').on('click', function(){
            if(status_bar === false){
                $('.menu-movil').addClass('active');
                status_bar = true;
            }else{
                $('.menu-movil').removeClass('active');
                $('#submenu').removeClass('active');
                status_bar = false;
            }
        });
        $('.submenu').on('click', 'a', function(e){
            if (!$(this).data('clicked')) {
                $('#submenu').addClass('active');
                $(this).data('clicked', true);
                e.preventDefault();
            } else {
                // Permite el comportamiento por defecto (ir al enlace)
                $(this).data('clicked', false); // Opcional: reinicia el estado
            }
        });
        $('.close-submenu').on('click', ()=>{
            $('#submenu').removeClass('active');
        })
    }
})
function getProduct(){
    $.ajax({
        url: rout,
        type: 'GET',
        data: {
            name: product_name
        }
    }).done(function(resp){
        console.log(resp);
        $('#product-image').html('');
        if(resp.length > 0){
            var product = resp[0];
            $('#product-image').append(`
                <a href="${product.permalink}">
                    <img src="${product.thumbnail}" alt="${product.title}" />
                </a>
            `);
        }
    }).fail(function(error){
        console.log(error);
    })
}