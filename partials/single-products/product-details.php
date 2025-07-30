   
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
										<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="slide-contain" id="slideGallery">
							<?php $nav = 0; foreach($gallery as $image): $nav++; ?>
								<div class="item-image <?php if($nav === 1): ?>show<?php endif; ?>" id="item-<?= $nav; ?>">
									<a href="<?= $image['url']; ?>" class="zoom-trigger">
										<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" width="<?= $image['width']; ?>" height="<?= $image['height']; ?>" class="zoom-image">
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
						<div class="cta-more-information" onclick="open_end_quote()">
							<span class="text">
								<?php if(get_bloginfo("language") == "en-US"): ?>More information<?php else: ?>Más información<?php endif; ?>
							</span>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z" stroke="#FCF4F4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script>
	$('.nav-galery').on('click', '.item-image', function(e){
		var item = $(this).attr('href');
		$('.item-image').removeClass('show');
		$(item).addClass('show');
		e.preventDefault();
	});
	$('.zoom-trigger').each(function() {
		$(this).zoom({
			url: $(this).attr('href'),
			magnify: 2
		});
	});
</script>