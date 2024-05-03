   
<?php
/**
 * 
 * Partial Name: product-details
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$feature_image = get_field('presentation_of_the_product');
?>
<section class="product-details-partial-d60d33">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 image-container">
                <img src="<?= $feature_image['url']; ?>" alt="<?= $feature_image['title']; ?>">
            </div>
            <div class="col-12 col-md-6 col-lg-5 offset-lg-1 description">
                <h1><?= the_title(); ?></h1>
                <div class="the-content">
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    