   
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
                                    <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>" width="<?= $item['icon']['width']; ?>" height="<?= $item['icon']['height']; ?>">
                                    <p class="name"><?= $item['description']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    