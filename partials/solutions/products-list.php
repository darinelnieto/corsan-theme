   
<?php
/**
 * 
 * Partial Name: products-list
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$category = get_queried_object();
if($category->taxonomy): 
    $products = new WP_Query(array(
        'post_type' => 'products',
        'product_cat' => $category->slug,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title'
    ));
else:
    $products = new WP_Query(array(
        'post_type' => 'products',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title'
    ));
endif;

if($products->have_posts()):
?>
<section class="products-list-partial-fb197d">
    <div class="container">
        <div class="row">
            <?php while($products->have_posts()): $products->the_post(); ?>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a href="<?= get_permalink($products->ID); ?>" class="card-produc">
                        <div class="body-product">
                            <div class="img-container">
                                <span class="color-hover"></span>
                                    <img src="<?= get_the_post_thumbnail_url($products->ID); ?>" alt="Imagen del producto <?= get_the_title($products->ID); ?>">
                                </div>
                            <div class="product-name">
                                <h4 class="default"><?= get_the_title($products->ID); ?></h4>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>