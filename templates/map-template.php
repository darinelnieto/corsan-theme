   
<?php
/**
 * 
 * Template Name: Map
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$map_iframe = get_field('map');
?>
<main id="map-template-3a0fe9">
    <section>
        <?php 
            if($map_iframe){
                echo $map_iframe;
            }
        ?>
    </section>
</main>
<?php get_footer(); ?>