   
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
$related_products = new WP_Query(array('post_type' => 'products', 'product_cat' => $the_category[0]->slug, 'post_status' => 'publish', 'post_per_page' => 6, 'orderby' => 'rand'));
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
                        $cat = get_the_terms($related_products->ID, 'product_cat');
                        if(get_the_title($related_products->ID) !== $the_name):
                        $icons = get_field('icons_for_cards', $related_products->ID);
                    ?>
                        <div class="item">
                            <a href="<?= get_permalink($related_products->ID); ?>" class="card-produc">
                                <div class="body-product">
                                    <div class="product-name">
                                        <h4 class="default"><?= get_the_title($related_products->ID); ?></h4>
                                        <p class="taxonomy"><?= $cat[0]->name; ?></p>
                                    </div>
                                    <div class="img-container">
                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id($related_products->ID), 'medium', false, array(
                                            'class' => 'product-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                            'alt' => get_the_title($related_products->ID)
                                        )); 
                                        $image = get_field('gallery', $related_products->ID); 
                                        echo wp_get_attachment_image($image[1]['ID'] ?? '', 'medium', false, array(
                                            'class' => 'secondary-image',
                                            'loading' => 'lazy',
                                            'decoding' => 'async',
                                            'alt' => $image[1]['title']
                                        )); 
                                        if($icons): ?>
                                            <ul class="icons-content">
                                                <?php foreach($icons as $icon): ?>
                                                    <li>
                                                        <?= wp_get_attachment_image($icon['icon']['ID'] ?? '', 'medium', false, array(
                                                            'class' => 'icon-image',
                                                            'loading' => 'lazy',
                                                            'decoding' => 'async',
                                                            'alt' => $icon['text']
                                                        )); ?>
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
                    <?php endif; endwhile; wp_reset_postdata(); ?>
                </div>
                <ul class="nav">
                    <li>
                        <a href="" class="prev">
                            <!-- flecha izq -->
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1213 18.5001H29V21.5001H16.1213L21.0606 26.4395L18.9393 28.5608L10.3787 20.0001L18.9393 11.4395L21.0606 13.5608L16.1213 18.5001Z" fill="#999999"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <ul id="dots-content"></ul>
                    </li>
                    <li>
                        <a href="" class="next">
                            <!-- flecha der -->
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
<?php endif; ?>            