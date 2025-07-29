   
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
    <!-- Products tabs -->
    <?php get_template_part('partials/home/products-tabs'); ?>
    <!-- videos manuals and distributor -->
    <?php get_template_part('partials/home/videos-manuals-and-distributor'); ?>
    <!-- Products Slide -->
    <?php get_template_part('partials/home/products-slide'); ?>
    <!-- Community -->
    <?php get_template_part('partials/home/community'); ?>
    <!-- Sustainability -->
    <?php get_template_part('partials/home/sustainability'); ?>
</main>
<?php get_footer(); ?>
                    