   
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
    $postucts = new WP_Query(array(
        'post_type' => 'products',
        'product_cat' => $category->slug,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));
else:
    $postucts = new WP_Query(array(
        'post_type'      => 'products',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC'
    ));
endif;
$postucts_array = $postucts->posts;
function get_translated_title($post) {
    $language = get_bloginfo("language"); // 'en-US' o 'es-ES'
    // WP Multilang usa el filtro 'the_title' para manejar traducciones
    return apply_filters('the_title', $post->post_title, $post->ID);
}

// Ordenar los productos alfabéticamente según el idioma activo
usort($postucts_array, function($a, $b) {
    return strcmp(get_translated_title($a), get_translated_title($b));
});
wp_reset_postdata();
if($postucts_array):
?>
<section class="products-list-partial-fb197d">
    <div class="container">
        <div class="row">
            <?php foreach($postucts_array as $post): $cat = get_the_terms($post->ID, 'product_cat'); $icons = get_field('icons_for_cards', $post->ID); ?>
                <div class="col-12 col-md-6 col-lg-3 mb-5">
                    <a href="<?= get_permalink($post->ID); ?>" class="card-produc">
                        <div class="body-product">
                            <div class="product-name">
                                <h4 class="default"><?= get_the_title($post->ID); ?></h4>
                                <p class="taxonomy"><?= $cat[0]->name; ?></p>
                            </div>
                            <div class="img-container">
                                <img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="<?= get_the_title($post->ID); ?>" class="product-image">
                                <?php if($icons): ?>
                                    <ul class="icons-content">
                                        <?php foreach($icons as $icon): ?>
                                            <li>
                                                <img src="<?= $icon['icon']['url']; ?>" alt="<?= $icon['icon']['title']; ?>" width="<?= $icon['icon']['width']; ?>" height="<?= $icon['icon']['height']; ?>">
                                                <span><?= $icon['text']; ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="end-card">
                                <span class="cta-card">
                                    <span class="text"><?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?></span>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>