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