   
<?php
/**
 * 
 * Partial Name: body-communities
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$feature_posts = get_field('feature_posts', 'option');
$category = get_queried_object();
if(!$category->taxonomy):
    $community = new WP_Query(array('post_type' => 'communities', 'post_status' => 'publish', 'post_per_page' => -1, 'order' => 'DESC'));
else:
    $community = new WP_Query(array('post_type' => 'communities', 'community_cat' => $category->slug, 'post_status' => 'publish', 'post_per_page' => -1, 'order' => 'DESC'));
endif;
?>
<section class="body-communities-partial-9516f0">
    <?php if($feature_posts): ?>
        <div class="slide-container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="feature-posts-slide owl-carousel">
                            <?php foreach($feature_posts as $the_blog): ?>
                                <div class="item">
                                    <div class="card-item">
                                        <h2 class="post-title"><?= get_the_title($the_blog['post']->ID); ?></h2>
                                        <p><?= get_field('short_description', $the_blog['post']->ID); ?></p>
                                        <a href="<?= get_permalink($the_blog['post']->ID); ?>">
                                            <span class="text">
                                                <?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?>
                                            </span>
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.67383 8H15.6738M15.6738 8L8.67383 1M15.6738 8L8.67383 15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Read post -->
    <div class="comunities-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <?php while($community->have_posts()): $community->the_post(); $cat = get_the_terms($community->ID, 'community_cat'); ?>
                        <div class="item-post">
                            <div class="image-contain">
                                <?= wp_get_attachment_image(get_post_thumbnail_id($community->ID), 'medium', false, array(
                                    'class' => 'post_image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                    'alt' => get_the_title($community->ID)
                                )); ?>
                            </div>
                            <div class="text-contain">
                                <?php if($cat): ?>
                                    <span class="taxonomy"><?= $cat[0]->name; ?></span>
                                <?php endif;  ?>
                                <h2><?= the_title($community->ID); ?></h2>
                                <p><?= get_field('short_description', $community->ID); ?></p>
                                <a href="<?= get_permalink($community->ID); ?>" class="cta-button">
                                    <span class="text"><?php if(get_bloginfo("language") == "en-US"): echo "See more"; else: echo "Ver más"; endif; ?></span>
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.67383 8H15.6738M15.6738 8L8.67383 1M15.6738 8L8.67383 15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>