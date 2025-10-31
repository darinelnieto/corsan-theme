   
<?php
/**
 * 
 * Partial Name: header-content
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
global $es_movil;
?>
<section class="header-content-partial-777e2f">
    <!-- top content Menu -->
    <div class="top-content-menu">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-3">
                    <div class="company-menu">
                        <?php wp_nav_menu(['menu' => 'Menu 1']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bottom content menu -->
    <div class="main-menu">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-5 col-md-2 logo-container">
                    <?= get_custom_logo(); ?>
                </div>
                <div class="d-none d-md-block col-md-7 nav-container">
                    <?php wp_nav_menu(['menu' => 'menu main']); ?>
                </div>
                <div class="d-flex d-md-none col-3 menu-movil-contain">
                    <div class="search-controller">
                        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.625 28.625L22.2812 22.2812M25.7083 14.0417C25.7083 20.485 20.485 25.7083 14.0417 25.7083C7.59834 25.7083 2.375 20.485 2.375 14.0417C2.375 7.59834 7.59834 2.375 14.0417 2.375C20.485 2.375 25.7083 7.59834 25.7083 14.0417Z" stroke="#002D74" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="bar-menu">
                        <span class="top"></span>
                        <span class="center"></span>
                        <span class="bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu movil -->
    <?php
        $submenu = get_field('submenu_desktop', 'option');
        if($submenu['menu_taxonomies']):
    ?>
        <div id="submenu">
            
            <div class="close-submenu d-block d-md-none">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contente-menu">
                            <div class="menu-name">
                                <h2>
                                    <a href="<?= home_url() ?>/soluciones/">
                                        <?= $submenu['menu_name']; ?>
                                    </a>
                                </h2>
                            </div>
                            <div class="menus">
                                <?php foreach($submenu['menu_taxonomies'] as $submenu): 
                                    $cat_id = $submenu['category_name']->term_id; 
                                    $cat = $submenu['category_name']->slug;
                                    $products_query = new WP_Query(array(
                                        'post_type' => 'products',
                                        'posts_per_page' => $submenu['perpage'],
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'term_id',
                                                'terms'    => $cat_id,
                                            ),
                                        ),
                                        'lang' => defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : '',
                                    ));
                                    $products = [];
                                    if($products_query->have_posts()){
                                        while($products_query->have_posts()){
                                            $products_query->the_post();
                                            $products[] = get_the_ID();
                                        }
                                        wp_reset_postdata();
                                        // Ordenar manualmente por título en el idioma actual
                                        usort($products, function($a, $b){
                                            return strcasecmp(get_the_title($a), get_the_title($b));
                                        });
                                    }
                                ?>
                                    <div class="menu-item">
                                        <a href="<?= home_url(); ?>/product_cat/<?= $cat; ?>" class="name-category">
                                            <span class="text"><?= $submenu['category_name']->name; ?></span>
                                            <svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="#4D4D4D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <ul>
                                            <?php if(!empty($products)): foreach($products as $prod_id): ?>
                                                <li>
                                                    <a href="<?= get_permalink($prod_id); ?>" class="the-product">
                                                        <?= ucfirst(mb_strtolower(get_the_title($prod_id), 'UTF-8')); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; endif; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div id="product-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-movil">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-menu">
                            <?php wp_nav_menu(['menu' => 'menu main']); ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="lenguages">
                            <?php wp_nav_menu(['menu' => 'Menu 1']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    const rout = _dittoURL_ + "/wp-json/product/search";
</script>