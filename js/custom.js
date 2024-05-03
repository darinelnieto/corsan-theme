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
var all_references = [];
$('.add-to-cart-button').on('click', function(){
  var references = $('.item.selected');
  for(i = 0; i < references.length; i++){
    var product_name = $('.product-name').val();
    var reference_name = references[i].querySelectorAll('.format-name > p');
    var presentation = references[i].querySelectorAll('.presentation > p');
    var units = references[i].querySelectorAll('.add-to-car-container > .select-units > .open-options > .selected-units');
    var sku = references[i].querySelectorAll('.add-to-car-container > .sku');
    all_references.push({
      sku: sku[0].value,
      item:i,
      product_name: product_name,
      reference_name: reference_name[0].innerHTML,
      presentation: presentation[0].innerHTML,
      units: units[0].innerHTML,
    }); 
    console.log(all_references);
  }
  var list = JSON.stringify(all_references);
  localStorage.setItem('car', list);
});
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