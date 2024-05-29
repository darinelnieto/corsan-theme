   
<?php
/**
 * 
 * Partial Name: products-slide
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$solutions_products = get_field('solutions_products');
if($solutions_products):
?>
<section class="products-slide-partial-5303c9">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="solutions-title" ><?= get_field('solutions_title'); ?></h2>
                <p class="solutions-description" ><?= get_field('solutions_description'); ?></p>
            </div>
            <!-- Products slide -->
            <div class="col-12">
                <h3 class="slide-name"><?php if(get_bloginfo("language") == "en-US"): echo "Featured Products"; else: echo "Productos destacados"; endif; ?></h3>
                <div class="products-slide owl-carousel">
                    <?php 
                        foreach($solutions_products as $product): 
                        $prod = $product['product']; 
                        $cat = get_the_terms($prod->ID, 'product_cat'); 
                        $color = get_field('color', $cat[0]->taxonomy . '_' . $cat[0]->term_id);
                    ?>
                        <div class="item" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
                            <a href="<?= get_permalink($prod->ID); ?>">
                                <div class="card-product">
                                    <div class="img-container">
                                        <span class="color-hover" style="background:<?= $color; ?>"></span>
                                        <img src="<?= get_the_post_thumbnail_url($prod->ID); ?>" alt="<?= get_the_title($prod->ID); ?>" class="product-image">
                                    </div>
                                    <div class="product-name">
                                        <h4 class="default"><?= get_the_title($prod->ID); ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>        