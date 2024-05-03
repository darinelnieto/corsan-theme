   
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
                    <div class="col-12 col-md-10">
                        <div class="feature-posts-slide owl-carousel">
                            <?php foreach($feature_posts as $the_blog): ?>
                                <div class="post-item">
                                    <a href="<?= get_permalink($the_blog['post']->ID); ?>">
                                        <div class="card-item">
                                            <h3><?= get_the_title($the_blog['post']->ID); ?></h3>
                                            <p><?= get_field('short_description', $the_blog['post']->ID); ?></p>
                                            <div class="cta">
                                                <span class="text">
                                                    <?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?>
                                                </span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
                                                        <g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
                                                            <line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                            <line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                            <line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Category filter -->
    <div class="category-filter-nav-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php 
                        wp_nav_menu(['menu' => 'blog']);
                        if(!$category->taxonomy): 
                    ?>
                        <h1><?php if(get_bloginfo("language") == "en-US"): ?>All items<?php else: ?>Todos los artículos<?php endif; ?></h1>
                    <?php else: ?>
                        <h1><?php if(get_bloginfo("language") == "en-US"): echo $category->name; ?> articles<?php else: ?>Artículos de <?php echo $category->name; endif; ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Read post -->
    <div class="comunities-list">
        <div class="container">
            <div class="row justify-content-center">
                <?php while($community->have_posts()): $community->the_post(); ?>
                    <div class="col-12 mb-5">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-5 mb-4 mb-md-0">
                                <a href="<?= get_permalink($community->ID); ?>" class="cta-image">
                                    <div class="feature-image-container">
                                        <img src="<?= get_the_post_thumbnail_url($community->ID); ?>" alt="<?= the_title($community->ID); ?>">
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="text-container">
                                    <h4><?= the_title($community->ID); ?></h4>
                                    <p><?= get_field('short_description', $community->ID); ?></p>
                                    <a href="<?= get_permalink($community->ID); ?>" class="cta-button">
                                        <span class="text"><?php if(get_bloginfo("language") == "en-US"): echo "See more"; else: echo "Ver más"; endif; ?></span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
                                                <g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
                                                    <line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                    <line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                    <line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(()=>{
        var cambio = false;
        $('.category-filter-nav-container ul li a').each(function(index) {
            if(this.href.trim() == window.location){
                $(this).addClass("active");
                cambio = true;
            }
        });
    })
</script>    