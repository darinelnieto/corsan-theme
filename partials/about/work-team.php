   
<?php
/**
 * 
 * Partial Name: work-team
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$gallery = get_field('work_team_gallery');
if($gallery):
?>
<section class="work-team-partial-6053d3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500"><?= get_field('work_team_title'); ?></h2>
            </div>
        </div>
    </div>
    <div class="gallery-our-team owl-carousel">
        <?php foreach($gallery as $img): ?>
            <div class="item">
                <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>" data-aos="zoom-in" data-aos-duration="2000">
            </div>
        <?php endforeach; ?>
    </div>
</section>  
<?php endif; ?>          