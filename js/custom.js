$(document).ready(function(){
  controle_pop_up();
});
/*============ Language drop down ============*/
var lang = false;
$('.wpm-languages [aria-current="page"]').on('click', function(e){
  if(lang === false){
    $('.sub-menu').addClass('show');
    lang = true;
  }else{
    $('.sub-menu').removeClass('show');
    lang = false;
  }
  e.preventDefault();
});
/*============ End function Language drop down ============*/
var cambio = false;
$('.menu-menu-main-container  ul li a').each(function(index) {
  if(this.href.trim() == window.location){
      $(this).addClass("active");
      cambio = true;
  }
});
/*======= Slide products banner =======*/
$('.slide-products').owlCarousel({
    autoplay:false,
    loop:true,
    nav:false,
    dots:true,
    margin:10,
    items:1,
}).css({'visibility':'visible'});
/*======== Single product ========*/
var acc = $('.open-options');
var i;
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function(e) {
        this.parentElement.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.visibility === "visible") {
            panel.style.visibility = "hidden";
        } else {
            $('.select-units').removeClass('active');
            this.parentElement.classList.toggle("active");
            $('.options-container').css({'visibility':'hidden'});
            panel.style.visibility = "visible";
        }
        e.preventDefault();
    });
}
/*============ Add to car =============*/
$(()=>{
  get_items_to_car();
  product_added();
  validate_options();
});
function validate_options(){
  var options = $('.item.selected');
  if(options.length > 0){
    $('.add-to-cart-button').removeClass('d-none');
  }else{
    $('.add-to-cart-button').addClass('d-none');
  }
}
let all_references = [];
// add to car single product
function add_to_car(value_initial){
  var references = $('.item.selected');
  for(i = 0; i < references.length; i++){
    var product_name = references[i].querySelectorAll('.format-name > .product-name');
    var feature = references[i].querySelectorAll('.format-name > .the-feature-image');
    var reference_name = references[i].querySelectorAll('.format-name > p');
    var presentation = references[i].querySelectorAll('.presentation > p');
    var units = references[i].querySelectorAll('.add-to-car-container > .select-units > .open-options > .selected-units');
    var sku = references[i].querySelectorAll('.add-to-car-container > .sku');
    all_references.push({
      sku: sku[0].value,
      feature:feature[0].value,
      product_name: product_name[0].value,
      reference_name: reference_name[0].innerHTML,
      presentation: presentation[0].innerHTML,
      units: units[0].innerHTML,
    });
  }
  var list = JSON.stringify(all_references);
  localStorage.setItem('car', list);
  car_count();
  open_car();
  // Reset options
  $('.selected-units').html(`${value_initial}`);
  // Reset items
  references.removeClass('selected');
  validate_options();
}
// Validate car
function get_items_to_car(){
  var car_obejct = JSON.parse(localStorage.getItem('car'));
  if(car_obejct != null){
    for(item of car_obejct){
      all_references.push({
        sku:item.sku,
        feature:item.feature,
        product_name: item.product_name,
        reference_name: item.reference_name,
        presentation: item.presentation,
        units: item.units,
      });
    }
  }
  product_added();
  car_count();
};
// Car count
function car_count(){
  count = all_references.length;
  $('#car-count').html(`${count}`);
  if(count > 0){
    $('.end-quote').removeClass('d-none');
  }else{
    $('.end-quote').addClass('d-none');
  }
}
// Print cart
function product_added(){
  $('#car-body').html('');
  if(all_references.length > 0){
    $('.message-zero').addClass('d-none');
    for(item of all_references){
      $('#car-body').append(`
        <div class="car-item">
          <div>
            <input type="hidden" class="the-feature-image" value="${item.feature}">
            <input type="hidden" class="the-product-name" value="${item.product_name}">
            <input type="hidden" class="the-reference-name" value="${item.reference_name}">
            <input type="hidden" class="the-sku" value="${item.sku}">
            <input type="hidden" class="the-units" value="${item.units}">   
            <input type="hidden" class="the-presentation" value="${item.presentation}">
          </div>
          <div class="image-container">
            <img src="${item.feature}" alt="${item.product_name}">
          </div>
          <div class="product-description">
              <h4>${item.reference_name}</h4>
              <div class="row caracteristic-product">
                <div class="col-12">
                  <p><strong>SKU:</strong> ${item.sku}</p>
                  <p><strong>Unidades:</strong> ${item.units}</p>
                  <p><strong>Presentación:</strong> ${item.presentation}</p>
                  <span class="this-delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.006" height="27.327" viewBox="0 0 24.006 27.327">
                      <g id="Grupo_8" data-name="Grupo 8" transform="translate(-282.924 -359.588)">
                        <path id="Trazado_1" data-name="Trazado 1" d="M298.4,359.588a6.316,6.316,0,0,1,1.137.48,2.284,2.284,0,0,1,1,1.963c.006.239,0,.479,0,.759h.291c1.209,0,2.419-.005,3.628,0a2.4,2.4,0,0,1,1.053,4.584.333.333,0,0,0-.242.324c-.148,1.87-.306,3.739-.462,5.608q-.257,3.069-.512,6.139c-.134,1.612-.277,3.224-.391,4.838a2.681,2.681,0,0,1-1.071,2.187,2.385,2.385,0,0,1-1.4.439q-6.5,0-12.993,0a2.376,2.376,0,0,1-2.42-2.2c-.159-1.654-.284-3.312-.422-4.969q-.232-2.777-.462-5.554-.225-2.724-.448-5.448c-.03-.364-.053-.728-.1-1.089a.364.364,0,0,0-.18-.242,2.4,2.4,0,0,1-1.3-3.108,2.429,2.429,0,0,1,2.31-1.506c1.2-.006,2.4,0,3.6,0h.346a9.4,9.4,0,0,1,.006-1.077,2.339,2.339,0,0,1,2-2.086.506.506,0,0,0,.1-.039Zm-12.2,8.017c.144,1.762.286,3.5.429,5.234q.255,3.07.512,6.139c.15,1.807.292,3.615.447,5.421.059.679.335.913,1.022.913h12.645c.08,0,.161,0,.24,0a.793.793,0,0,0,.758-.7c.022-.149.033-.3.046-.451q.171-2.073.341-4.146.23-2.777.462-5.554.2-2.418.4-4.836c.056-.669.108-1.339.162-2.022Zm8.734-1.613h9.365a2.833,2.833,0,0,0,.32-.007.793.793,0,0,0,.643-1.127.86.86,0,0,0-.881-.469q-9.445,0-18.892,0a2.136,2.136,0,0,0-.24.006.8.8,0,0,0,0,1.587,2.838,2.838,0,0,0,.32.007Zm4-3.212c0-.251,0-.481,0-.71a.81.81,0,0,0-.88-.88c-.6,0-1.208,0-1.812,0q-2.213,0-4.425,0a.794.794,0,0,0-.873.685,8.788,8.788,0,0,0-.006.9Z" fill="#002361"/>
                        <path id="Trazado_2" data-name="Trazado 2" d="M291.722,382.793a.8.8,0,0,1-1.076.862.767.767,0,0,1-.519-.71c-.111-1.72-.215-3.44-.323-5.161q-.2-3.271-.407-6.544c-.025-.39-.057-.78-.069-1.171a.8.8,0,1,1,1.6-.069q.273,4.4.543,8.806C291.55,380.118,291.635,381.431,291.722,382.793Z" fill="#002361"/>
                        <path id="Trazado_3" data-name="Trazado 3" d="M298.138,382.717q.255-4.071.51-8.141.143-2.274.28-4.549a.8.8,0,1,1,1.6.1c-.053.949-.116,1.9-.175,2.847q-.15,2.408-.3,4.815c-.107,1.721-.211,3.441-.323,5.161a.792.792,0,0,1-.831.763.8.8,0,0,1-.765-.831v-.16Z" fill="#002361"/>
                        <path id="Trazado_4" data-name="Trazado 4" d="M294.127,376.426q0-3.176,0-6.35a.8.8,0,0,1,1.06-.831.775.775,0,0,1,.535.7,2.373,2.373,0,0,1,.005.267V382.7c0,.641-.295,1.013-.8,1.013s-.8-.372-.8-1.013Z" fill="#002361"/>
                      </g>
                    </svg>      
                  </span>
                </div>
              </div>
          </div>
        </div>
      `);
    }
  }else{
    $('.message-zero').removeClass('d-none');
  }
}
// Item delete
$('#car-body').on('click', '.this-delete', function(){
  item = $(this);
  item.parent().parent().parent().parent().remove();
  delet_item();
});
// Car depure
function delet_item(){
  all_references = [];
  var car_list = $('.car-item');
  for(e = 0; car_list.length > e; e++){
    sku = car_list[e].querySelectorAll('.the-sku');
    feature = car_list[e].querySelectorAll('.the-feature-image');
    product_name = car_list[e].querySelectorAll('.the-product-name');
    reference_name = car_list[e].querySelectorAll('.the-reference-name');
    presentation = car_list[e].querySelectorAll('.the-presentation');
    units = car_list[e].querySelectorAll('.the-units');
    all_references.push({
      sku:sku[0].value,
      feature:feature[0].value,
      product_name: product_name[0].value,
      reference_name: reference_name[0].value,
      presentation: presentation[0].value,
      units: units[0].value,
    });
  }
  list = JSON.stringify(all_references);
  localStorage.setItem('car', list);
  car_count();
  product_added();
  if(car_list.length == 0){
    close_car();
  }
}
/*============= Close form end quote ==============*/
function close_end_quote(){
  $('.end-quote-form-pop-up').removeClass('show');
}
function open_end_quote(){
  close_car();
  $('.end-quote-form-pop-up').addClass('show');
  add_products_to_quote_form();
}
function add_products_to_quote_form(){
  var product_name = $('.product-details-partial-d60d33 h1');
  $('#products-to-quote').val(product_name.text());
}
/*=========== Reset car ===========*/
function clear_car_after_submit_qoute_form(){
  setTimeout(function(){
    close_end_quote();
  }, 1000);
  localStorage.removeItem('car');
  all_references = [];
  get_items_to_car();
}
/*========== FQAs ==========*/
var fqa = $('.the-question');
var i;
for (i = 0; i < fqa.length; i++) {
    fqa[i].addEventListener("click", function(e) {
        this.parentElement.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.visibility === "visible") {
            panel.style.visibility = "hidden";
        } else {
            $('.fqa-item').removeClass('active');
            this.parentElement.classList.toggle("active");
            $('.the-answer').css({'visibility':'hidden'});
            panel.style.visibility = "visible";
        }
        e.preventDefault();
    });
}
/*============= About us gallery ==============*/
$('.gallery').owlCarousel({
  autoplay:false,
  loop:false,
  nav:true,
  navText:[`<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51">
    <g id="Grupo_248" data-name="Grupo 248" transform="translate(-1751.45 -1397.993)">
      <g id="Grupo_246" data-name="Grupo 246">
        <circle id="Elipse_67" data-name="Elipse 67" cx="25" cy="25" r="25" transform="translate(1751.95 1398.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1"/>
      </g>
      <g id="Grupo_247" data-name="Grupo 247">
        <line id="Línea_66" data-name="Línea 66" x1="13.653" y1="13.653" transform="translate(1770.123 1423.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
        <line id="Línea_67" data-name="Línea 67" y1="13.653" x2="13.653" transform="translate(1770.123 1409.839)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
      </g>
    </g>
  </svg>
  `, `<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51">
    <g id="Grupo_251" data-name="Grupo 251" transform="translate(-1814.731 -1397.993)">
      <g id="Grupo_249" data-name="Grupo 249">
        <circle id="Elipse_68" data-name="Elipse 68" cx="25" cy="25" r="25" transform="translate(1815.231 1398.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1"/>
      </g>
      <g id="Grupo_250" data-name="Grupo 250">
        <line id="Línea_68" data-name="Línea 68" x2="13.653" y2="13.653" transform="translate(1833.404 1409.839)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
        <line id="Línea_69" data-name="Línea 69" x1="13.653" y2="13.653" transform="translate(1833.404 1423.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
      </g>
    </g>
  </svg>
  `],
  margin:0,
  responsive:{
    0:{
      items:1
    },
    768:{
      items:2
    }
  }
}).css({'visibility':'visible'});
// Likes function
$('.cta-likes').on('click', function(){
  var post_id = $('.post-id').val();
  var ip_user = $('.ip-user').val();
  var rout = _dittoURL_ + "/wp-json/post/likes";
  $.ajax({
      type: 'POST',
      url: rout,
      data:{
          post_id: post_id,
          ip_user: ip_user
      }
  }).done(function(data){
      $('.likes-count').html(`<p>${data.length}</p>`);
  }).fail(function(data){
      if(data.status === 403){
          $('.cta-likes').addClass('active');
      };
  });
});
function get_likes(){
  var post_id = $('.post-id').val();
  var ip_user = $('.ip-user').val();
  var get_rout = _dittoURL_ + "/wp-json/get/likes";
  $.ajax({
      type: 'GET',
      url: get_rout,
      data:{
          post_id: post_id,
          ip_user: ip_user
      }
  }).done(function(resp){
      $('.likes-count').html(`<p>${resp.length}</p>`);
  })
}
// Share this
var share_end = false;
$('.cta-share-action-end').on('click', function(){
    if(share_end === false){
        $(this).addClass('active');
        $('.content-cta-share-end').removeClass('d-none');
        share_end = true;
    }else{
        $(this).removeClass('active');
        $('.content-cta-share-end').addClass('d-none');
        share_end = false;
    }
});
// 
$('.feature-posts-slide').owlCarousel({
  autoplay:false,
  loop:false,
  nav:false,
  dots:false,
  margin:20,
  responsive:{
    0:{
      items:1,
      loop:true,
      autoplay:false,
      margin:30
    },
    600:{
      items:2,
      loop:true,
      autoplay:true,
      margin:30
    },
    768:{
      items:3,
      nav:false
    }
  }
}).css({'visibility':'visible'});
// Work team gallery
$('.gallery-our-team').owlCarousel({
  autoplay:false,
  loop:false,
  navText:[`<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51">
    <g id="Grupo_248" data-name="Grupo 248" transform="translate(-1751.45 -1397.993)">
      <g id="Grupo_246" data-name="Grupo 246">
        <circle id="Elipse_67" data-name="Elipse 67" cx="25" cy="25" r="25" transform="translate(1751.95 1398.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1"/>
      </g>
      <g id="Grupo_247" data-name="Grupo 247">
        <line id="Línea_66" data-name="Línea 66" x1="13.653" y1="13.653" transform="translate(1770.123 1423.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
        <line id="Línea_67" data-name="Línea 67" y1="13.653" x2="13.653" transform="translate(1770.123 1409.839)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
      </g>
    </g>
  </svg>
  `, `<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51">
    <g id="Grupo_251" data-name="Grupo 251" transform="translate(-1814.731 -1397.993)">
      <g id="Grupo_249" data-name="Grupo 249">
        <circle id="Elipse_68" data-name="Elipse 68" cx="25" cy="25" r="25" transform="translate(1815.231 1398.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1"/>
      </g>
      <g id="Grupo_250" data-name="Grupo 250">
        <line id="Línea_68" data-name="Línea 68" x2="13.653" y2="13.653" transform="translate(1833.404 1409.839)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
        <line id="Línea_69" data-name="Línea 69" x1="13.653" y2="13.653" transform="translate(1833.404 1423.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
      </g>
    </g>
  </svg>
  `],
  nav:true,
  dots:false,
  margin:0,
  items:1
}).css({'visibility':'visible'});
// Our clients
$('.our-clients').owlCarousel({
  loop:true,
  autoplay:false,
  navText:[`<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51">
    <g id="Grupo_248" data-name="Grupo 248" transform="translate(-1751.45 -1397.993)">
      <g id="Grupo_246" data-name="Grupo 246">
        <circle id="Elipse_67" data-name="Elipse 67" cx="25" cy="25" r="25" transform="translate(1751.95 1398.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1"/>
      </g>
      <g id="Grupo_247" data-name="Grupo 247">
        <line id="Línea_66" data-name="Línea 66" x1="13.653" y1="13.653" transform="translate(1770.123 1423.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
        <line id="Línea_67" data-name="Línea 67" y1="13.653" x2="13.653" transform="translate(1770.123 1409.839)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
      </g>
    </g>
  </svg>
  `, `<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51">
    <g id="Grupo_251" data-name="Grupo 251" transform="translate(-1814.731 -1397.993)">
      <g id="Grupo_249" data-name="Grupo 249">
        <circle id="Elipse_68" data-name="Elipse 68" cx="25" cy="25" r="25" transform="translate(1815.231 1398.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1"/>
      </g>
      <g id="Grupo_250" data-name="Grupo 250">
        <line id="Línea_68" data-name="Línea 68" x2="13.653" y2="13.653" transform="translate(1833.404 1409.839)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
        <line id="Línea_69" data-name="Línea 69" x1="13.653" y2="13.653" transform="translate(1833.404 1423.493)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
      </g>
    </g>
  </svg>
  `],
  nav:true,
  dots:true,
  margin:30,
  responsive:{
    0:{
      items:2
    },
    768:{
      items:4
    },
    1000:{
      items:6
    }
  }
}).css({'visibility':'visible'});
/*========= open pop up =========*/
var open_status = false;
var stat = false;
function menu_controller(){
  if(stat === false){
    $('.menu-movil').addClass('show');
    stat = true;
    open_status = false;
    $('.search-form-container').removeClass('show');
    close_car();
  }else{
    $('.menu-movil').removeClass('show');
    stat = false;
  }
}
/*=========== Search form ===========*/
function open_search(){
  if(open_status === false){
    $('.search-form-container').addClass('show');
    open_status = true;
    stat = false;
    $('.menu-movil').removeClass('show');
    close_car();
  }else{
    $('.search-form-container').removeClass('show');
    open_status = false;
  }
}
/*========== Car ==========*/
// Open car
function open_car(){
  $('#car-pop-up').addClass('show');
  if(stat === true){
    $('.menu-movil').removeClass('show');
    stat = false;
  }
  if(open_status === true){
    $('.search-form-container').removeClass('show');
    open_status = false;
  }
  product_added();
}
// Close car
function close_car(){
  $('#car-pop-up').removeClass('show');
}
/*============= Single products slider =============*/
$('.gallery-product').owlCarousel({
  autoplay:false,
  loop:true,
  nav: false,
  dots: false,
  items: 1,
  margin:10,
}).css({'opacity':1}).on('translated.owl.carousel', function() {
  controle_pop_up();
});
// Nav gallery
$('.nav-gallery').owlCarousel({
  autoplay:false,
  loop:false,
  navText: [
    '<i class="fa-solid fa-chevron-left"></i>',
    '<i class="fa-solid fa-chevron-right"></i>'
],
  nav:true,
  dots:false,
  responsive:{
      0:{
          items:4,
          margin:10,
      },
      640:{
          items:4,
          margin:0,
      }
  }
}).css({'opacity':1});
// Nav controller by click
$('.nav-gallery').on('click', '.nav-image', function(){
  var position = $(this).children('.position').val();
  $('.gallery-product').trigger('to.owl.carousel', position);
});
$('.gallery-product-pop-up').owlCarousel({
  autoplay:false,
  loop:false,
  nav: false,
  dots: false,
  items: 1,
  margin:10,
  touchDrag: false,
  mouseDrag: false
});
function controle_pop_up(){
  var position = $('.gallery-product .active .position').val();
  $('.nav-image').removeClass('active');
  $('.item-'+position).addClass('active');
  $('.gallery-product-pop-up').trigger('to.owl.carousel', position);
};
$('.gallery-product').on('click', '.item-image', function(){
  $('.gallery-pop-up-container').addClass('show');
});
$('.close-pop-up-gallery').on('click', function(){
  $('.gallery-pop-up-container').removeClass('show');
});
$(document).on('keyup', (e)=>{
  if (e.key == "Escape"){
      $('.gallery-pop-up-container').removeClass('show');
  }
});
// Suscribe policies animate
$('.input-and-button .button').prop('disabled', true);
$('.policies-container label').on('click', function(){
  checkbox = $('input[type="checkbox"]', this);
  if(checkbox.prop('checked')){
    $('.checkbox', this).addClass('active');
    $('.input-and-button .button').prop('disabled', false);
  }else{
    $('.checkbox', this).removeClass('active');
    $('.input-and-button .button').prop('disabled', true);
  }
});
// Slide category movil
if($(window).width() < 768) {
  $('.taxonomies').owlCarousel({
    autoplay:true,
    loop:true,
    nav:false,
    dots:true,
    items:1,
    margin:0
  }).css({ 'opacity':1 });
}
/*=========== Submit quote ============*/
var wpcf7Elm = document.querySelector( '.wpcf7' );
if( wpcf7Elm != null){
  wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
    clear_car_after_submit_qoute_form();
  }, false );
}
// Product slide home
var productSlide = $('.products-slide-partial-19f476 .prduct-slide-home').owlCarousel({
    autoplay:false,
    loop:false,
    nav:false,
    dots:false,
    margin:0,
    items:1
});
$('.products-slide-partial-19f476 .nav .prev').click(function(e){
    e.preventDefault();
    productSlide.trigger('prev.owl.carousel');
});

$('.products-slide-partial-19f476 .nav .next').click(function(e){
    e.preventDefault();
    productSlide.trigger('next.owl.carousel');
});

$('.products-slide-partial-19f476 .nav .dot').each(function(index){
    $(this).attr('data-slide', index);
});

$('.products-slide-partial-19f476 .nav .dot').click(function(e){
    e.preventDefault();
    var slideTo = $(this).data('slide');
    productSlide.trigger('to.owl.carousel', [slideTo, 300]);
});

productSlide.on('changed.owl.carousel', function(event) {
    var index = event.item.index - event.relatedTarget._clones.length / 2;
    var count = event.item.count;
    if(index >= count) index = index % count;
    if(index < 0) index = count + index;

    $('.nav .dot').removeClass('active');
    $('.nav .dot').eq(index).addClass('active');
});

$('.products-slide-partial-19f476 .nav .dot').eq(0).addClass('active');
// Product tabs home
$(()=>{
    if($(window).width() < 768){
        $('.products-slide-partial-5303c9 .the-tabs').addClass('owl-carousel');
        $('.products-slide-partial-5303c9 .the-tabs').owlCarousel({
            autoplay:false,
            loop:true,
            nav:false,
            dots:false,
            margin:20,
            responsive:{
                0:{
                    items:1.5,
                    center:true
                },
                640:{
                    items:2
                }
            }
        });
    }
    // Timeline Slide About us
    var $owlTL_slide = $('.time-line-partial-76a83f .time-line-slide');
    var owlSlide_TL = $owlTL_slide.owlCarousel({
        autoplay: false,
        loop: false,
        nav: false,
        dots: false,
        margin: 0,
        responsive: {
            0: { items: 1, margin:30 },
            640: { items: 2, margin:30 },
            768: { items: 3 }
        }
    });

    // Función para obtener el número de ítems visibles según ancho
    function getItemsPerPage() {
        var width = $(window).width();
        if (width < 640) return 1;
        if (width < 768) return 2;
        return 3;
    }

    // Función para regenerar los dots personalizados
    function generateCustomDots() {
        $('#dots-content').empty();

        var totalItems = $owlTL_slide.find('.owl-item:not(.cloned)').length;
        var itemsPerPage = getItemsPerPage();
        var totalPages = Math.ceil(totalItems / itemsPerPage);

        for (var i = 0; i < totalPages; i++) {
            $('#dots-content').append(
                `<li><a href="#" class="dot" data-slide="${i}"></a></li>`
            );
        }

        // Click en cada dot para mover al slide correspondiente
        $('.dot').click(function (e) {
            e.preventDefault();
            var page = $(this).data('slide');
            owlSlide_TL.trigger('to.owl.carousel', [page * itemsPerPage, 300]);
        });

        // Activar el primero al inicio
        $('.dot').removeClass('active').eq(0).addClass('active');
    }

    // Mover con flechas
    $('.nav .prev').click(function (e) {
        e.preventDefault();
        owlSlide_TL.trigger('prev.owl.carousel');
    });

    $('.nav .next').click(function (e) {
        e.preventDefault();
        owlSlide_TL.trigger('next.owl.carousel');
    });

    // Actualizar el dot activo al cambiar de slide
    $owlTL_slide.on('changed.owl.carousel', function (event) {
        var itemsPerPage = getItemsPerPage();
        var pageIndex = Math.floor(event.item.index / itemsPerPage);

        $('.dot').removeClass('active');
        $('.dot').eq(pageIndex).addClass('active');
    });

    // Generar los dots al inicio
    generateCustomDots();

    // Regenerar al cambiar de tamaño
    $(window).on('resize', function () {
        setTimeout(generateCustomDots, 300);
    });
});
// Banner video -> Vol event
const video = document.getElementById('customVideo');
if(video !== null){
  const volumeBtn = document.getElementById('volumeBtn');
  volumeBtn.addEventListener('click', function () {
      video.muted = !video.muted;
      volumeBtn.innerHTML = video.muted ? `<i class="fa-solid fa-volume-high"></i>` : `<i class="fa-solid fa-volume-xmark"></i>`;
  });
}
// Feature posts slide
var slideFeaturePosts = $('#single-blog-post-template-0f368e .slide-related-post');
if(slideFeaturePosts !== null){
  slideFeaturePosts.owlCarousel({
    autoplay:false,
    loop:false,
    nav:false,
    navText:[
        `<svg width="68" height="69" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_142_196)">
                <circle cx="34" cy="30.5" r="30" transform="rotate(180 34 30.5)" fill="white" fill-opacity="0.7"/>
                <path d="M38 22.5L30 30.5L38 38.5" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <filter id="filter0_d_142_196" x="0" y="0.5" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0.05 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_142_196"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_142_196" result="shape"/>
                </filter>
            </defs>
        </svg>`,
        `<svg width="68" height="69" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_142_264)">
                <circle cx="34" cy="30.5" r="30" fill="white" fill-opacity="0.7"/>
                <path d="M29 38.5L37 30.5L29 22.5" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <filter id="filter0_d_142_264" x="0" y="0.5" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0.05 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_142_264"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_142_264" result="shape"/>
                </filter>
            </defs>
        </svg>`
    ],
    dots:true,
    margin:20,
    responsive:{
        0:{
            items:1.5,
            center:true,
            loop:true,
            nav:false
        },
        640:{
            items:2,
            nav:false,
        },
        991:{
            items:3
        }
    }
  }).css({'visibility':'visible'});
}
// Active solutions categories
var tax_links = $('.taxonomies-partial-a0ac83 .taxonomi-link');
if(tax_links !== null){
  tax_links.each(function(index) {
      if(this.href.trim() == window.location.href){
          $('.main-card').removeClass('active');
          $(this).parent().parent().addClass("active");
          $(this).addClass("active");
      }
  });
}
var cat_links = $('.taxonomies-partial-a0ac83 .category-list a');
if(cat_links !== null){
  cat_links.each(function(index) {
      if(this.href.trim() == window.location.href){
          $('.category-list a').removeClass('active');
          $(this).addClass("active");
      }
  });
}
// Single product
var nav_gallery_prod = $('.product-details-partial-d60d33 .nav-galery');
if(nav_gallery_prod !== null){
  nav_gallery_prod.on('click', '.item-image', function(e){
    var item = $(this).attr('href');
    $('.item-image').removeClass('show');
    $(item).addClass('show');
    e.preventDefault();
  });
}
var zoom_tr_prod = $('.product-details-partial-d60d33 .zoom-trigger');
if(zoom_tr_prod !== null){
  zoom_tr_prod.each(function() {
    $(this).zoom({
      url: $(this).attr('href'),
      magnify: 2
    });
  });
}

$(()=>{
  var button_icon_form = $('.product-details-partial-d60d33 .the-form button .icon');
  if(button_icon_form !== null){
    $('.product-details-partial-d60d33 .the-form button .icon').html(`
        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12.4648H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 5.46484L19 12.4648L12 19.4648" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `); 
  }
});
// Manuals slide
var manuals_slide_prod = $('.related-manuals-partial-d5f0ac .mauals-slide');
manuals_slide_prod.owlCarousel({
  loop:false,
  autoplay:false,
  nav:true,
  navText:[
      `<svg width="68" height="69" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter0_d_142_196)">
              <circle cx="34" cy="30.5" r="30" transform="rotate(180 34 30.5)" fill="white" fill-opacity="0.7"/>
              <path d="M38 22.5L30 30.5L38 38.5" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
          <defs>
              <filter id="filter0_d_142_196" x="0" y="0.5" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                  <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                  <feOffset dy="4"/>
                  <feGaussianBlur stdDeviation="2"/>
                  <feComposite in2="hardAlpha" operator="out"/>
                  <feColorMatrix type="matrix" values="0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0.05 0"/>
                  <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_142_196"/>
                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_142_196" result="shape"/>
              </filter>
          </defs>
      </svg>`,
      `<svg width="68" height="69" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g filter="url(#filter0_d_142_264)">
              <circle cx="34" cy="30.5" r="30" fill="white" fill-opacity="0.7"/>
              <path d="M29 38.5L37 30.5L29 22.5" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
          <defs>
              <filter id="filter0_d_142_264" x="0" y="0.5" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                  <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                  <feOffset dy="4"/>
                  <feGaussianBlur stdDeviation="2"/>
                  <feComposite in2="hardAlpha" operator="out"/>
                  <feColorMatrix type="matrix" values="0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0.05 0"/>
                  <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_142_264"/>
                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_142_264" result="shape"/>
              </filter>
          </defs>
      </svg>`
  ],
  dots:true,
  margin:20,
  responsive:{
      0:{
          items:1.5,
          center:true,
          loop:true,
          nav:false
      },
      640:{
          items:2,
          nav:false,
      },
      991:{
          items:3
      }
  }
}).css({'visibility':'visible'});
// Single product related posts slide
var owlSlideRelatedProduct = $('.related-products-partial-573627 .products-slide');
$(()=>{
  if(owlSlideRelatedProduct !== null){
    owlSlideRelatedProduct.owlCarousel({
        autoplay:false,
        loop:false,
        nav:false,
        margin:40,
        responsive:{
            0:{
                items:1.5,
                center:true,
            },
            768:{
                items:2
            },
            1000:{
                items:4
            }
        }
    }).css({'visibility':'visible'});
    // Función para obtener el número de ítems visibles según ancho
    function getItemsPerPage() {
        var width = $(window).width();
        if (width < 640) return 1;
        if (width < 768) return 2;
        return 4;
    }

    // Función para regenerar los dots personalizados
    function generateCustomDots() {
        $('#dots-content').empty();

        var totalItems = owlSlideRelatedProduct.find('.owl-item:not(.cloned)').length;
        var itemsPerPage = getItemsPerPage();
        var totalPages = Math.ceil(totalItems / itemsPerPage);

        for (var i = 0; i < totalPages; i++) {
            $('#dots-content').append(
                `<li><a href="#" class="dot" data-slide="${i}"></a></li>`
            );
        }

        // Click en cada dot para mover al slide correspondiente
        $('.related-products-partial-573627 .dot').click(function (e) {
            e.preventDefault();
            var page = $(this).data('slide');
            owlSlideRelatedProduct.trigger('to.owl.carousel', [page * itemsPerPage, 300]);
        });

        // Activar el primero al inicio
        $('.related-products-partial-573627 .dot').removeClass('active').eq(0).addClass('active');
    }

    // Mover con flechas
    $('.related-products-partial-573627 .nav .prev').click(function (e) {
        e.preventDefault();
        owlSlideRelatedProduct.trigger('prev.owl.carousel');
    });

    $('.related-products-partial-573627 .nav .next').click(function (e) {
        e.preventDefault();
        owlSlideRelatedProduct.trigger('next.owl.carousel');
    });

    // Actualizar el dot activo al cambiar de slide
    owlSlideRelatedProduct.on('changed.owl.carousel', function (event) {
        var itemsPerPage = getItemsPerPage();
        var pageIndex = Math.floor(event.item.index / itemsPerPage);

        $('.related-products-partial-573627 .dot').removeClass('active');
        $('.related-products-partial-573627 .dot').eq(pageIndex).addClass('active');
    });

    // Generar los dots al inicio
    generateCustomDots();

    // Regenerar al cambiar de tamaño
    $(window).on('resize', function () {
        setTimeout(generateCustomDots, 300);
    });
  }
});
// Contact page form
var c_form_button = $('#contact-us-template-55cc3c .form button .icon');
if(c_form_button !== null){
  c_form_button.html(`
    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 12.4648H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M12 5.46484L19 12.4648L12 19.4648" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  `);
}