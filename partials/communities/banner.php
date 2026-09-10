   
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
    <?php if(!empty($banner)): ?>
        <?= wp_get_attachment_image($banner['ID'], 'large', false, array(
            'class' => 'hero-image',
            'fetchpriority' => 'high',
            'loading' => 'eage',
            'alt' => get_the_title()
        )); ?>
    <?php endif; if(!empty($description)): ?>
        <h1 class="description"><?= $description; ?></h1>
    <?php endif; ?>
</section>
                    