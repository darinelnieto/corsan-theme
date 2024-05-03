   
<?php
/**
 * 
 * Partial Name: time-line
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$add_time_line = get_field('add_time_line');
if($add_time_line):
?>
<section class="time-line-partial-76a83f">
    <div class="container">
        <div class="row">
            <div class="col-12 title-container">
                <h2><?= get_field('title'); ?></h2>
                <h4><?= get_field('subtitle'); ?></h4>
            </div>
        </div>
        <?php foreach($add_time_line as $item): ?>
            <div class="row align-items-center justify-content-between time-line-container">
                <span class="year"><?= $item['year'] ?></span>
                <div class="col-12 col-md-5 star-item">
                    <div class="content">
                        <?= $item['description']; ?>
                    </div>
                </div>
                <div class="col-12 col-md-5 end-item">
                    <?php if($item['show_image'] === true): ?>
                        <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                    <?php else: ?>
                        <div class="text-content">
                            <?= $item['image_no']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>