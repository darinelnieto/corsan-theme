   
<?php
/**
 * 
 * Partial Name: videos-manuals-and-distributor
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$video = get_field('video');
if($video):
?>
<section class="videos-manuals-and-distributor-partial-80d462">
    <video id="customVideo" autoplay muted loop playsinline preload="auto" style="width: 100%; height: auto; object-fit: cover;">
        <source src="<?= $video['url']; ?>" type="video/mp4">
        Tu navegador no soporta video HTML5.
    </video>
    <p class="video-description"><?= get_field('video_description'); ?></p>
    <div class="vol-controller" id="volumeBtn">
        <i class="fa-solid fa-volume-high"></i>
    </div>
</section>
<?php endif; ?>