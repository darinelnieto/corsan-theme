   
<?php
/**
 * 
 * Partial Name: products-slide
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$products_list = get_field('products_list');
if($products_list):
?>
<section class="products-slide-partial-19f476">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="prduct-slide-home owl-carousel">
                    <?php foreach($products_list as $product): $prod = $product['product']; $advantages = get_field('advantages', $prod->ID); ?>
                        <div class="item">
                            <div class="image-contain">
                                <img src="<?= get_the_post_thumbnail_url($prod->ID) ?>" alt="<?= get_the_title($prod->ID); ?>" width="773" height="475">
                            </div>
                            <div class="text-contain">
                                <h3 class="product-name"><?= get_the_title($prod->ID); ?></h3>
                                <?php if($advantages): ?>
                                    <h4 class="advantages-title">
                                        <?php if(get_bloginfo("language") == "en-US"): ?>
                                            Advantages
                                        <?php else: ?>
                                            Ventajas
                                        <?php endif; ?>
                                    </h4>
                                    <ul class="advantages">
                                        <?php foreach($advantages as $li): ?>
                                            <li>
                                                <svg width="23.264" height="24.64" viewBox="0 0 23.264 24.64">
                                                    <path id="Trazado_531" data-name="Trazado 531" d="M5.688,25.408q0-.416-.16-.416l-.736.352a.334.334,0,0,0-.256-.32l-.256-.032a1.353,1.353,0,0,0-.64.224,2.239,2.239,0,0,0-.16-.32q-.1-.16-.16-.288-.416-.8-.832-1.76-.384-.992-.736-1.888-.32-.9-.512-1.408Q1.112,19.136.952,18.3t-.32-2.112a1.157,1.157,0,0,0,.544.224q.224,0,.416-.672a.416.416,0,0,0,.352.128.337.337,0,0,0,.288-.128l.512-.768.576.192h.032A.184.184,0,0,0,3.48,15.1a.745.745,0,0,1,.192-.128.851.851,0,0,1,.384-.16l.1.032a1.9,1.9,0,0,1,1.024,1.408q.576,2.432,1.152,2.432t1.344-1.216a13.962,13.962,0,0,0,.768-1.408q.416-.8.832-1.792.064.384.128.384.16,0,.544-.8.416-.8,1.312-2.208.512-.864,1.28-1.952.8-1.088,1.7-2.24T15.96,5.28q.864-1.024,1.536-1.76a7.38,7.38,0,0,1,.992-.96,11.158,11.158,0,0,0,1.92-1.6,2.372,2.372,0,0,1-.1.416,1.352,1.352,0,0,0-.032.224.113.113,0,0,0,.128.128l.9-.448v.128q0,.256.128.256.1,0,.384-.288a1.227,1.227,0,0,0,.32-.416l-.064.448L23.16.768l-.256.576A1.64,1.64,0,0,1,23.64.992q.128,0,.192.16a.568.568,0,0,1,.064.256.88.88,0,0,1-.16.448q-.16.256-.416.608-.192.256-.64.768-.416.48-1.28,1.44-.864.928-2.3,2.592-.384.416-1.184,1.472-.8,1.024-1.824,2.4Q15.1,12.48,14.1,13.856t-1.76,2.5q-.768,1.088-1.088,1.632l-1.984,3.36q-.64,1.088-1.056,1.792a7.821,7.821,0,0,1-.64.928A6.837,6.837,0,0,1,6.52,25.088l-.288-.16-.256.16Z" transform="translate(-0.632 -0.768)" fill="#4d4d4d"/>
                                                </svg>
                                                <?= $li['item']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <a href="<?= get_permalink($prod->ID); ?>" class="cta">
                                    <span class="text"><?php if(get_bloginfo("language") == "en-US"): ?>Learn more<?php else: ?>Conocer más<?php endif; ?></span>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <ul class="nav">
                    <li>
                        <a href="" class="prev">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1213 18.5001H29V21.5001H16.1213L21.0606 26.4395L18.9393 28.5608L10.3787 20.0001L18.9393 11.4395L21.0606 13.5608L16.1213 18.5001Z" fill="#999999"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <ul>
                            <?php foreach($products_list as $product): ?>
                                <li>
                                    <a href="" class="dot"></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="next">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.478 21.557H10.9243V18.443H23.478L18.6633 13.316L20.7311 11.114L29.0757 20L20.7311 28.886L18.6633 26.6841L23.478 21.557Z" fill="#999999"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<script>
    var owl = $('.prduct-slide-home').owlCarousel({
        autoplay:false,
        loop:false,
        nav:false,
        dots:false,
        margin:0,
        items:1
    });
    $('.nav .prev').click(function(e){
        e.preventDefault();
        owl.trigger('prev.owl.carousel');
    });

    $('.nav .next').click(function(e){
        e.preventDefault();
        owl.trigger('next.owl.carousel');
    });

    $('.nav .dot').each(function(index){
        $(this).attr('data-slide', index);
    });

    $('.nav .dot').click(function(e){
        e.preventDefault();
        var slideTo = $(this).data('slide');
        owl.trigger('to.owl.carousel', [slideTo, 300]);
    });

    owl.on('changed.owl.carousel', function(event) {
        var index = event.item.index - event.relatedTarget._clones.length / 2;
        var count = event.item.count;
        if(index >= count) index = index % count;
        if(index < 0) index = count + index;

        $('.nav .dot').removeClass('active');
        $('.nav .dot').eq(index).addClass('active');
    });

    $('.nav .dot').eq(0).addClass('active');
</script>
<?php endif; ?>                 