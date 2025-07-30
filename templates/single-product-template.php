   
<?php
/**
 * 
 * Template Name: single-product
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="single-product-template-15a47a">
    <!-- Products details -->
    <?php get_template_part('partials/single-products/product-details'); ?>
    <!-- Tecnical caracteristics -->
    <?php get_template_part('partials/single-products/tecnical-caracteristics'); ?>
    <!-- Sales format -->
    <?php get_template_part('partials/single-products/sales-format'); ?>
    <!-- Related products -->
    <?php get_template_part('partials/single-products/related-products'); ?>
</main>
<?php get_footer(); ?>
                    