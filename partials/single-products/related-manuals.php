   
<?php
/**
 * 
 * Partial Name: related-manuals
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$manuals = get_field('related_manuals');
if($manuals['manuals']):
?>
<section class="related-manuals-partial-d5f0ac">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $manuals['title']; ?></h2>
                <div class="related-manuals-contain">
                    <div class="mauals-slide owl-carousel">
                        <?php foreach($manuals['manuals'] as $item): ?>
                            <div class="item">
                                <a href="<?= get_permalink($item->ID); ?>" class="card-manual">
                                    <?= wp_get_attachment_image(get_post_thumbnail_id($item->ID), 'medium', false, array(
                                        'class' => 'feature-image',
                                        'loading' => 'lazy',
                                        'decoding' => 'async',
                                        'alt' => get_the_title($item->ID)
                                    )); ?>
                                    <div class="text-contain">
                                        <h3><?= get_the_title($item->ID); ?></h3>
                                        <p class="description"><?= get_field('short_description', $item->ID); ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?> 