   
<?php
/**
 * 
 * Template Name: portfolio
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$categories = get_field('products_categories');
$categories_whit_products = get_field('categories_whit_products');
$catalog = get_field('catalog');
?>
<main id="portfolio-template-303eec">
    <section class="categories-whit-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 data-aos="fade-right"><?= the_title(); ?></h1>
                </div>
                <?php if($categories_whit_products): foreach($categories_whit_products as $item): 
                    $cat = $item['category'];
                    $product = new WP_Query(array('post_type' => 'products', 'post_status' => 'publish', 'product_cat' => $cat->slug, 'posts_per_page' => 4, 'orderby' => 'rand')); 
                    if($product->have_posts()):  ?>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="category-card" data-aos="zoom-in">
                                <div class="image-contain">
                                    <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                                </div>
                                <div class="texts-contain">
                                    <a href="<?= home_url(); ?>/product_cat/<?= $cat->slug; ?>"><?= $cat->name; ?></a>
                                    <ul class="products-list">
                                        <?php while($product->have_posts()): $product->the_post() ?>
                                            <li>
                                                <a href="<?= get_permalink($product->ID); ?>">
                                                    <span class="text"><?= get_the_title($product->ID); ?></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32.634" height="26.446" viewBox="0 0 32.634 26.446">
                                                        <defs>
                                                            <clipPath id="clip-path">
                                                            <rect id="Rectángulo_8" data-name="Rectángulo 8" width="32.634" height="26.446" transform="translate(0 0)" fill="none"/>
                                                            </clipPath>
                                                        </defs>
                                                        <g id="Grupo_4" data-name="Grupo 4" transform="translate(0 0)">
                                                            <g id="Grupo_3" data-name="Grupo 3" clip-path="url(#clip-path)">
                                                            <line id="Línea_1" data-name="Línea 1" x2="32.092" transform="translate(0 13.223)" fill="none" stroke="#002361" stroke-miterlimit="10" stroke-width="1.533"/>
                                                            <line id="Línea_2" data-name="Línea 2" x2="12.681" y2="12.681" transform="translate(19.412 0.542)" fill="none" stroke="#002361" stroke-miterlimit="10" stroke-width="1.533"/>
                                                            <line id="Línea_3" data-name="Línea 3" x1="12.681" y2="12.681" transform="translate(19.411 13.223)" fill="none" stroke="#002361" stroke-miterlimit="10" stroke-width="1.533"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </li>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php 
                    endif; 
                    endforeach; endif; 
                ?>
            </div>
        </div>
    </section>
    <?php if($categories): ?>
        <section class="categories">
            <div class="container">
                <div class="row">
                    <?php foreach($categories as $item): $cat = $item['category']; ?>
                        <div class="col-12 col-sm-6 mb-5" data-aos="zoom-in">
                            <a href="<?= home_url(); ?>/product_cat/<?= $cat->slug; ?>" class="the-category">
                                <div class="image-contain">
                                    <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                                </div>
                                <span class="cta-text">
                                    <?php 
                                        if(get_bloginfo("language") == "en-US"){
                                            echo $cat->name . " Solutions";
                                        }else{
                                            echo "Soluciones " . $cat->name;
                                        };
                                    ?>
                                </span>
                            </a>
                        </div>
                    <?php endforeach;
                        if($catalog):
                    ?>
                        <div class="col-12">
                            <a href="<?= $catalog['url']; ?>" download="<?= $catalog['filename']; ?>" class="download-portfolio" data-aos="zoom-in">
                                <span class="text">
                                    <?php if(get_bloginfo("language") == "en-US"): ?>Download PDF catalog<?php else: ?>Descarga catálogo PDF<?php endif; ?>
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
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
                    