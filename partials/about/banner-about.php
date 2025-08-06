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
if($video):
?>
<section class="banner-about-partial-63dee6">
   <video id="customVideo" autoplay muted loop playsinline preload="auto" style="width: 100%; height: auto; object-fit: cover;">
        <source src="<?= $video['url']; ?>" type="video/mp4">
        Tu navegador no soporta video HTML5.
    </video>
    <p class="video-description"><?= get_field('video_description'); ?></p>
    <div class="vol-controller" id="volumeBtn">
        <i class="fa-solid fa-volume-high"></i>
    </div>
</section>            
<script>
    const video = document.getElementById('customVideo');
    const volumeBtn = document.getElementById('volumeBtn');

    volumeBtn.addEventListener('click', function () {
        video.muted = !video.muted;
        volumeBtn.innerHTML = video.muted ? `<i class="fa-solid fa-volume-high"></i>` : `<i class="fa-solid fa-volume-xmark"></i>`;
    });
</script>
<?php endif; ?>