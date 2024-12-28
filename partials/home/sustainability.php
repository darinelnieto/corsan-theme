   
<?php
/**
 * 
 * Partial Name: sustainability
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$sustainability = get_field('sustainability_content');
?>
<section class="sustainability-partial-0c071c">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $sustainability['title']; ?></h2>
                <p class="description"><?= $sustainability['description']; ?></p>
            </div>
            <?php if($sustainability['cards']): foreach($sustainability['cards'] as $item): ?>
                <div class="col-6 col-lg-3 mb-4">
                    <div class="card-gray">
                        <div class="image-contain">
                            <img src="<?= $item['image_png']['url']; ?>" alt="<?= $item['image_png']['title']; ?>">
                        </div>
                        <p class="text"><?= $item['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
                    