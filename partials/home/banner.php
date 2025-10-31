   
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
$solutions_content = get_field('after_banner');
global $es_movil;
?>
<section class="banner-partial-bfa418">
    <?php if($taxonomies): ?>
        <div class="taxonomies <?php if($es_movil): ?> owl-carousel<?php endif; ?>">
            <?php 
                $count = count($taxonomies); // Contar los elementos
                foreach($taxonomies as $taxonomy): 
                    $tax = $taxonomy['select_taxonomy']; 
            ?>
                <div class="taxonomy-card">
                    <div class="taxonomi-card">
                        <img src="<?= get_field('feature_image', $tax->taxonomy . '_' . $tax->term_id); ?>" alt="<?= $tax->name; ?>">
                        <div class="text-taxonomy">
                            <p class="name-category"><?= $tax->name; ?></p>
                            <a href="<?= home_url(); ?>/product_cat/<?= $tax->slug; ?>">
                                <span class="text"><?php if(get_bloginfo("language") == "en-US"): ?>See products<?php else: ?>Ver porductos<?php endif; ?></span>
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if($es_movil ): ?>
            <script>
                $('.taxonomies').owlCarousel({
                    autoplay:true,
                    loop:true,
                    nav:false,
                    dots:true,
                    items:1,
                    margin:0
                }).css({ 'opacity':1 });
            </script>
        <?php endif; ?>
    <?php endif; ?>
    <div class="after-banner">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="text-contain">
                        <?php if($solutions_content['title']): ?>
                            <h1><?= $solutions_content['title']; ?></h1>
                        <?php endif; if($solutions_content['description']): ?>
                            <p class="description"><?= $solutions_content['description']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <?php if($solutions_content['main_image']): ?>
                        <div class="image-contain">
                            <img src="<?= $solutions_content['main_image']['url']; ?>" alt="<?= $solutions_content['main_image']['title']; ?>" width="<?= $solutions_content['main_image']['width']; ?>" height="<?= $solutions_content['main_image']['height']; ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('partials/solutions/taxonomies'); ?>