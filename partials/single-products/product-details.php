   
<?php
/**
 * 
 * Partial Name: product-details
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$gallery = get_field('gallery');

?>
<section class="product-details-partial-d60d33">
	<!-- Gallery pop up -->
	<div class="gallery-pop-up-container">
		<div class="close-pop-up-gallery"></div>
		<div class="body-pop-up">
			<div class="gallery-product-pop-up owl-carousel">
				<?php $e = -1; foreach($gallery as $image): $e++; ?>
					<div class="item-image">
						<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 image-container">
                <div class="gallery-product owl-carousel">
					<?php $nav = -1; foreach($gallery as $image): $nav++; ?>
						<div class="item-image">
							<input type="hidden" class="position" value="<?= $nav; ?>">
							<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<div class="row justify-content-center">
					<div class="col-7">
						<div class="nav-gallery owl-carousel">
							<?php $i = -1; foreach($gallery as $image): $i++; ?>
								<div class="nav-image  item-<?= $i; ?>">
									<input type="hidden" class="position" value="<?= $i; ?>">
									<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 offset-lg-1 description">
                <h1><?= the_title(); ?></h1>
                <div class="the-content">
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
                    