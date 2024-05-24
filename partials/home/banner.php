   
<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$taxonomies = get_field('products_taxonomies');
$products = get_field('products_slide');
?>
<section class="banner-partial-bfa418">
    <!-- Product taxonomies -->
    <?php if($taxonomies): ?>
        <div class="taxonomies">
            <div class="row">
                <?php foreach($taxonomies as $taxonomy): $tax = $taxonomy['select_taxonomy']; ?>
                    <div class="col-6 col-md-3" data-aos="zoom-in">
                        <a href="<?= home_url(); ?>/product_cat/<?= $tax->slug; ?>">
                            <div class="taxonomi-card">
                                <img src="<?= get_field('feature_image', $tax->taxonomy . '_' . $tax->term_id); ?>" alt="<?= $tax->name; ?>">
                                <div class="name-category" style="background:<?= get_field('color', $tax->taxonomy . '_' . $tax->term_id) ?>;">
                                    <span style="width:<?= get_field('size_title', $tax->taxonomy . '_' . $tax->term_id); ?>px;"><?= $tax->name; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- Products slide -->
    <?php if($products): ?>
        <div class="products-slide-container">
            <img src="<?= get_field('slide_background'); ?>" alt="Texture gray" class="texture-slide">
            <div class="container">
                <div class="slide-products owl-carousel">
                    <?php foreach($products as $product): $prod = $product['select_product']; ?>
                        <div class="row align-items-center">
                            <div class="col-12 col-md-8 col-lg-7">
                                <p class="short-description"><?= get_field('short_description', $prod->ID); ?></p>
                                <div class="ctas-container">
                                    <a href="<?= get_permalink($prod->ID); ?>" class="permalink-product"><?php if(get_bloginfo("language") == "en-US"): echo "Learn more"; else: echo "Conocer más"; endif; ?></a>
                                    <a href="<?= $product['solutions_link']; ?>" class="solutions-link">
                                        <span class="text-cta"><?php if(get_bloginfo("language") == "en-US"): echo "Solutions"; else: echo "Soluciones"; endif; ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="393.629" height="81.797" viewBox="0 0 393.629 81.797">
                                            <path id="Trazado_164" data-name="Trazado 164" d="M826.828,925a39.17,39.17,0,0,0-35.483,22.573,13.929,13.929,0,0,1-6.561,5.039c-3.292,1.216-9.064,1.181-13.536-.059-2.58-.715-5.908-4.762-8.249-8.033a40.888,40.888,0,0,0-35.872-21.246H513.269a40.9,40.9,0,0,0-40.9,40.9h0a40.9,40.9,0,0,0,40.9,40.9H727.127a40.833,40.833,0,0,0,33-16.754v.01l.068-.1q.909-1.248,1.726-2.563c2.329-3.349,6.428-8.83,9.226-10.255,4.461-2.272,10.38-2.673,13.672-1.456,2.263.836,4.5,3.344,6.286,6.3a39.126,39.126,0,0,0,1.887,3.66l.018.038a2.809,2.809,0,0,0,.417.7A39.173,39.173,0,1,0,826.828,925Z" transform="translate(-472.371 -923.271)" fill="#002d74" fill-rule="evenodd"/>
                                        </svg>
                                        <span class="icon"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-5">
                                <img src="<?= get_the_post_thumbnail_url($prod->ID); ?>" alt="<?= get_the_title($prod->ID); ?>" class="product-image">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    $(document).ready(function(){
        $('.solutions-link .icon').html(`
            <svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
                <g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
                    <line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                    <line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                    <line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                </g>
            </svg>
        `);
    });
</script>