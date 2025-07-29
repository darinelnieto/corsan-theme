   
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
									<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
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
							<span class="icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
									<g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
										<line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
										<line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
										<line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
									</g>
								</svg>
							</span>
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
<script>
	$('.nav-galery').on('click', '.item-image', function(e){
		var item = $(this).attr('href');
		$('.item-image').removeClass('show');
		$(item).addClass('show');
		e.preventDefault();
	});
</script>