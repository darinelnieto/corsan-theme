$(document).ready(function(){
  var cambio = false;
  $('.menu-menu-main-container  ul li a').each(function(index) {
    if(this.href.trim() == window.location){
        $(this).addClass("active");
        cambio = true;
    }
  });
  controle_pop_up();
})
/*======= Slide products banner =======*/
$('.slide-products').owlCarousel({
    autoplay:false,
    loop:false,
    nav:true,
    margin:10,
    items:1,
}).css({'visibility':'visible'});
/*======== Product slide of solutions =========*/
$('.products-slide').owlCarousel({
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
    margin:40,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        768:{
            items:3
        },
        1000:{
            items:4
        }
    }
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
  var products = [];
  var list = [];
  var product_list = $('.car-item');
  for(e = 0; product_list.length > e; e++){
    sku = product_list[e].querySelectorAll('.the-sku');
    product_name = product_list[e].querySelectorAll('.the-product-name');
    reference_name = product_list[e].querySelectorAll('.the-reference-name');
    presentation = product_list[e].querySelectorAll('.the-presentation');
    units = product_list[e].querySelectorAll('.the-units');
    products.push({
      sku:sku[0].value,
      product_name: product_name[0].value,
      reference_name: reference_name[0].value,
      presentation: presentation[0].value,
      units: units[0].value,
    });
  }
  for(item of products){
    list.push(`Nombre del producto: ${item.reference_name}, Sku: ${item.sku}, presentación: ${item.presentation}, cantidad: ${item.units} |--|`);
  }
  if(list.length > 0){
    $('#products-to-quote').val(list);
    list = [];
  }
}
/*=========== Reset car ===========*/
function clear_car_after_submit_qoute_form(){
  setTimeout(function(){
    close_end_quote();
  }, 3000);
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
      console.log(data);
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
      autoplay:true
    },
    600:{
      items:2,
      loop:true,
      autoplay:true
    },
    970:{
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
/*=========== Submit quote ============*/
var wpcf7Elm = document.querySelector( '.the-form > .wpcf7' );
 
wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
  clear_car_after_submit_qoute_form();
}, false );
/*============= Single products slider =============*/
$('.gallery-product').owlCarousel({
  autoplay:false,
  loop:false,
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
          items:3,
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