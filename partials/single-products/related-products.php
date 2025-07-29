   
<?php
/**
 * 
 * Partial Name: related-products
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$the_id = get_the_id();
$the_name = get_the_title();
$the_category = get_object_term_cache($the_id, 'product_cat');
$related_products = new WP_Query(array('post_type' => 'products', 'product_cat' => $the_category[0]->slug, 'post_status' => 'publish', 'post_per_page' => 5, 'orderby' => 'rand'));
if($related_products->have_posts()):
?>
<section class="related-products-partial-573627">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?php if(get_bloginfo("language") == "en-US"): echo "Related products"; else: echo "Productos relacionados"; endif; ?></h2>
                <div class="products-slide owl-carousel">
                    <?php 
                        while($related_products->have_posts()): 
                        $related_products->the_post(); 
                        $color = get_field('color', $the_category[0]->taxonomy . '_' . $the_category[0]->term_id);
                        if(get_the_title($related_products->ID) !== $the_name):
                    ?>
                        <div class="item">
                            <a href="<?= get_permalink($related_products->ID); ?>">
                                <div class="card-product">
                                    <div class="img-container">
                                        <img src="<?= get_the_post_thumbnail_url($related_products->ID); ?>" alt="<?= get_the_title($related_products->ID); ?>" class="product-image">
                                    </div>
                                    <div class="product-name">
                                        <h4 class="default"><?= get_the_title($related_products->ID); ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>  
<?php endif; ?>            