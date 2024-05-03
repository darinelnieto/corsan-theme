   
<?php
/**
 * 
 * Partial Name: photos-of-categories
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$galleries = get_field('categories');
if($galleries):
?>
<section class="photos-of-categories-partial-277c9d">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 contain">
                <div class="row images-container">
                    <?php foreach($galleries as $gallery): ?>
                        <div class="col-6 col-md-3 mb-4 mb-lg-0">
                            <div class="card-image">
                                <img src="<?= $gallery['image']['url']; ?>" alt="<?= $gallery['image']['title']; ?>" title="<?= $gallery['image']['title']; ?>">
                                <div class="name-category-container" style="background:<?= $gallery['color'] ?>;">
                                    <span><?= $gallery['category_name']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>