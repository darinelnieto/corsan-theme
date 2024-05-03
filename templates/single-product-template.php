   
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
    <!-- Sales format -->
    <?php get_template_part('partials/single-products/sales-format'); ?>
</main>
<?php get_footer(); ?>
                    