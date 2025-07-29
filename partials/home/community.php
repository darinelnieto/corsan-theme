   
<?php
/**
 * 
 * Partial Name: community
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$community = get_field('videos_and_manuals_content');
$items;
if($community['list']){
    $items = array_chunk($community['list'], 2);
}
if(count($items) > 0): 
    $key = 0;
?>
<section class="community-partial-2f2a01">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $community['title']; ?></h2>
                <div class="comunity-content">
                    <?php foreach($items as $item): $key++; ?>
                        <div class="column <?php if($key == 1): ?>column-left<?php endif; if($key > 1 && $key < 3): ?>column-center d-none d-md-flex<?php endif; if($key == 3): ?>column-right d-none d-md-flex<?php endif; ?>">
                            <?php foreach($item as $card): ?>
                                <a href="<?= get_permalink($card['item']->ID); ?>" class="card-item">
                                    <?= get_the_post_thumbnail($card['item']->ID); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= $community['page_link']; ?>" class="see-more">
                    <?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>