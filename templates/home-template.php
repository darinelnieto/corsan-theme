   
<?php
/**
 * 
 * Template Name: home
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="home-template-7bdd82">
    <!-- Banner -->
    <?php get_template_part('partials/home/banner'); ?>
    <!-- Products slide -->
    <?php get_template_part('partials/home/products-slide'); ?>
    <!-- Corsan as your best ally -->
    <?php get_template_part('partials/home/your-best-ally'); ?>
    <!-- videos manuals and distributor -->
    <?php get_template_part('partials/home/videos-manuals-and-distributor'); ?>
    <!-- Sustainability -->
    <?php get_template_part('partials/home/sustainability'); ?>
</main>
<?php get_footer(); ?>
                    