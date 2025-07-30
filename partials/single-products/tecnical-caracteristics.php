   
<?php
/**
 * 
 * Partial Name: tecnical-caracteristics
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_field('tecnical_caracteristics_group');
?>
<section class="tecnical-caracteristics-partial-c0e2d0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="caracteristics">
                    <h2 class="title"><?= $content['title']; ?></h2>
                    <p class="description"><?= $content['description']; ?></p>
                    <?php if($content['caracteristics']): ?>
                        <div class="caracteristics-list">
                            <?php foreach($content['caracteristics'] as $item): ?>
                                <div class="item">
                                    <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" alt="<?= get_the_title($item->ID); ?>" width="40" height="40">
                                    <p class="name"><?= get_the_title($item->ID); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    