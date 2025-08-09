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
$('.submenu').on('click', 'a', function(e){
    var id = $(this).attr('href');
    $(id).addClass('active');
    e.preventDefault();
});
$('.submenu').on('click', function(){
    var id = $(this).children('a').attr('href');
    $(id).addClass('active');
    e.preventDefault();
});
$(()=>{
    if($(window).width() > 768){
        $('.submenu').on('mouseover', 'a', function(e){
            var id = $(this).attr('href');
            $(id).addClass('active');
            e.preventDefault();
        });
        $('#submenu').on('mouseleave', function(){
            $(this).removeClass('active');
            $('.menus ul').removeClass('active');
            $('#product-image').html('');
        });
        $('.menus').on('mouseover', '.name-category', function(){
            $('.menus ul').removeClass('active');
            $(this).parent().children('ul').addClass('active');
        });
        $('.menus').on('mouseover', '.the-product', function(){
            product_name = $(this).text();
            getProduct()
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