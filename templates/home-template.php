   
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
    <!-- Community -->
    <?php get_template_part('partials/home/community'); ?>
    <!-- Instagram -->
    <?php get_template_part('partials/home/instagram'); ?>
</main>
<?php get_footer(); ?>
                    