   
<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('select_banner');
$description = get_field('banner_description');
?>
<section class="banner-partial-e9938f">
    <?php if($banner): ?>
        <img src="<?= $banner['url']; ?>" alt="<?= $banner['title']; ?>" width="<?= $banner['width']; ?>" height="<?= $banner['height']; ?>">
    <?php endif; if($description): ?>
        <h1 class="description"><?= $description; ?></h1>
    <?php endif; ?>
</section>
                    