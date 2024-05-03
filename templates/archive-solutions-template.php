   
<?php
/**
 * 
 * Template Name: archive-solutions
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="archive-solutions-template-2b3e28">
    <!-- Taxonomies filter -->
    <?php get_template_part('partials/solutions/taxonomies'); ?>
    <!-- Products list -->
    <?php get_template_part('partials/solutions/products-list'); ?>
</main>
<?php get_footer(); ?>
                    