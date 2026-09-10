<?php
/**
 * 
 * Partial Name: banner-about
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$video = get_field('video');
$valida = get_field('enable_video');
$image = get_field('banner_image');
?>
<section class="banner-about-partial-63dee6">
    <?php if($valida === true): ?>
        <video id="customVideo" autoplay muted loop playsinline preload="auto" style="width: 100%; height: auto; object-fit: cover;">
            <source src="<?= $video['url']; ?>" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>
        <div class="vol-controller" id="volumeBtn">
            <i class="fa-solid fa-volume-high"></i>
        </div>
    <?php else: ?>
        <?= wp_get_attachment_image($image['ID'] ?? '', 'large', false, array(
            'class' => 'banner-image',
            'fetchpriority' => 'high',
            'loading' => 'eage',
            'alt' => get_field('video_description')
        )) ?>
    <?php endif; ?>
    <p class="video-description"><?= get_field('video_description'); ?></p>
</section>