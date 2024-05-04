   
<?php
/**
 * 
 * Template Name: about-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="about-us-template-2c7979">
    <!-- Banner -->
    <?php get_template_part('partials/about/banner-about'); ?>
    <div class="body-about">
        <!-- About section -->
        <?php get_template_part('partials/about/about'); ?>
        <!-- Time line -->
        <?php get_template_part('partials/about/time-line'); ?>
        <!-- Our team -->
        <?php get_template_part('partials/about/work-team'); ?>
        <!-- Our clients -->
        <?php get_template_part('partials/about/our-clients'); ?>
    </div>
</main>
<?php get_footer(); ?>
                    