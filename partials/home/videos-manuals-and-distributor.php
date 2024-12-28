   
<?php
/**
 * 
 * Partial Name: videos-manuals-and-distributor
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_field('videos_manuals_and_distributor');
?>
<section class="videos-manuals-and-distributor-partial-80d462">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-item map">
                    <div class="image-contain">
                        <img src="<?= $content['map_image']['url']; ?>" alt="<?= $content['map_image']['title']; ?>">
                    </div>
                    <a href="<?= $content['map_page']; ?>" class="cta-page"><?= $content['map_cta_text']; ?></a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-item blog">
                    <div class="image-contain">
                        <img src="<?= $content['blog_image']['url']; ?>" alt="<?= $content['blog_image']['title']; ?>">
                    </div>
                    <a href="<?= $content['blog_page']; ?>" class="cta-page"><?= $content['blog_cta_text']; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>