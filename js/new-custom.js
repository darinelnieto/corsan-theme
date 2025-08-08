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
$('.submenu').on('mouseover', 'a', function(e){
    var id = $(this).attr('href');
    $(id).addClass('active');
    e.preventDefault();
});
$('.submenu').on('click', 'a', function(e){
    var id = $(this).attr('href');
    $(id).addClass('active');
    e.preventDefault();
});
$('#submenu').on('mouseleave', function(){
   $(this).removeClass('active');
});