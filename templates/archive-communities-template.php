   
<?php
/**
 * 
 * Template Name: archive-communities
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="archive-communities-template-1dc4c9">
    <!-- Banner -->
    <?php get_template_part('partials/communities/banner'); ?>
    <!-- Posts list -->
    <div class="body-archive">
        <?php get_template_part('partials/communities/body-communities'); ?>
    </div>
</main>
<?php get_footer(); ?>
                    