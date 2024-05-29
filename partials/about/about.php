   
<?php
/**
 * 
 * Partial Name: about
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$video = get_field('video_id');
?>
<section class="about-partial-0056e7">
    <div class="container">
        <div class="row align-items-center" style="position:relative;">
            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>" class="logo">
            <div class="col-12">
                <h1 data-aos="fade-right"><?= the_title(); ?></h1>
            </div>
        </div>
    </div>
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/<?= $video; ?>?autoplay=1&loop=1&autopause=0&muted=1&controls=0" title="Vimeo video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</section>            