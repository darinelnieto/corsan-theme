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
  car_count();
  product_added();
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
  for(item of all_references){
    $('#car-body').append(`
      <div class="car-item">
        <span class="this-delete"></span>
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
              <div class="col-4">
                <p><strong>SKU</strong></p>
              </div>
              <div class="col-8">
                <p>${item.sku}</p>
              </div>
              <div class="col-4">
                <p><strong>Unidades</strong></p>
              </div>
              <div class="col-8">
                <p>${item.units}</p>
              </div>
              <div class="col-4">
                <p><strong>Presentación</strong></p>
              </div>
              <div class="col-8">
                <p>${item.presentation}</p>
              </div>
            </div>
        </div>
      </div>
    `);
  }
}
// Item delete
$('#car-body').on('click', '.this-delete', function(){
  item = $(this);
  item.parent().remove();
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
/*=========== Submit quote ============*/
var wpcf7Elm = document.querySelector( '.the-form > .wpcf7' );
 
wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
  clear_car_after_submit_qoute_form();
}, false );
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