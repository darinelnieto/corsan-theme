<?php
/**
 * 
 * Partial Name: banner-about
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('banner');
$banner_movil = get_field('banner_movil');
?>
<section class="banner-about-partial-63dee6">
    <img src="<?= $banner['url']; ?>" alt="<?= $banner['title']; ?>" class="desktop">
    <img src="<?= $banner_movil['url']; ?>" alt="<?= $banner_movil['title']; ?>" class="movil">
</section>            