   
<?php
/**
 * 
 * Partial Name: banner-working
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$product_photo = get_field('product_image_banner');
?>
<section class="banner-working-partial-927159">
    <img src="<?= get_field('texture'); ?>" alt="Textrura" class="texture">
    <div class="container" id="banner-container">
        <div class="row">
            <div class="col-12 col-md-7 col-xl-8 text-and-product-photo">
                <h1><?= get_field('title_banner'); ?></h1>
                <img src="<?= $product_photo['url']; ?>" alt="<?= $product_photo['title']; ?>" class="product-photo">
            </div>
            <div class="col-12 col-md-5 col-lg-4 form-container">
                <div class="from-card">
                    <h2><?= get_field('title_form_contact'); ?></h2>
                    <p><?= get_field('intro_form_contact'); ?></p>
                    <div class="form">
                        <?= do_shortcode(get_field('add_shortcode_to_contact_form', 'option')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('.button-container .icon').html(`
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