   
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
$cat = get_the_terms(get_the_id(), 'product_cat');
?>
<section class="product-details-partial-d60d33">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
				<div class="top-contain">
					<div class="gallery-contain">
						<div class="nav-galery">
							<?php $i = 0; foreach($gallery as $image): $i++; ?>
								<div class="nav-image">
									<a class="item-image" href="#item-<?= $i; ?>">
										<?= wp_get_attachment_image($image['ID'], 'medium', false, array(
											'class' => 'image',
											'fetchpriority' => 'high',
											'alt' => $image['title']
										)); ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="slide-contain" id="slideGallery">
							<?php $nav = 0; foreach($gallery as $image): $nav++; ?>
								<div class="item-image <?php if($nav === 1): ?>show<?php endif; ?>" id="item-<?= $nav; ?>">
									<a href="<?= $image['url']; ?>" class="zoom-trigger">
										<?= wp_get_attachment_image($image['ID'], 'large', false, array(
											'class' => 'zoom-image',
											'fetchpriority' => 'high',
											'alt' => $image['title']
										)) ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="right-content">
						<div class="title">
							<h1><?= the_title(); ?></h1>
							<span><?= $cat[0]->name; ?></span>
						</div>
						<div class="description">
							<?= the_content(); ?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
	<div class="end-quote-form-pop-up">
        <div class="form-container">
            <div class="close-quote-form" onclick="close_end_quote()"></div>
            <h3><?php if(get_bloginfo("language") == "en-US"): 
                echo "To continue, you must fill out the following form."; else: 
                echo "Para continuar, debes llenar el siguiente formulario."; 
                endif; ?>
            </h3>
            <div class="the-form">
                <?= do_shortcode(get_field('shortcode_form', 'option')); ?>
            </div>
        </div>
    </div>
</section>