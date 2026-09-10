   
<?php
/**
 * 
 * Partial Name: products-slide
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$solutions = get_field('solutions_content');
$tabs = $solutions['products_tabs'];
?>
<section class="products-slide-partial-5303c9">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $solutions['title']; ?></h2>
                <?php if($tabs): $key_tab = 0; $body_key = 0; ?>
                    <div class="tabs-content">
                        <div class="tabs">
                            <?php foreach($tabs as $tab): $key_tab++; ?>
                                <a class="tab-controller <?php if( $key_tab === 1): ?>active<?php endif; ?>" href="#item-<?= $key_tab; ?>"><?= $tab['taxonomy_name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="body-tabs">
                            <?php foreach($tabs as $tab): $body_key++; if($tab['products_list']): ?>
                                <div class="the-tabs  <?php if($body_key === 1): ?>active<?php endif; ?>" id="item-<?= $body_key; ?>">
                                    <?php foreach($tab['products_list'] as $product): 
                                        $prod = $product['product']; 
                                        $cat = get_the_terms($prod->ID, 'product_cat'); 
                                        $icons = get_field('icons_for_cards', $prod->ID);
                                    ?>
                                        <div class="item">
                                            <a href="<?= get_permalink($prod->ID); ?>">
                                                <div class="card-product">
                                                    <div class="product-name">
                                                        <h4 class="default"><?= get_the_title($prod->ID); ?></h4>
                                                        <p class="taxonomy"><?= $cat[0]->name; ?></p>
                                                    </div>
                                                    <div class="img-container">
                                                        <?= wp_get_attachment_image(get_post_thumbnail_id($prod->ID) ?? '', 'large', false, array(
                                                            'class' => 'product-image',
                                                            'loading' => 'lazy',
                                                            'decoding' => 'async',
                                                            'alt' => get_the_title($prod->ID)
                                                        )); ?>
                                                        <?php $image = get_field('gallery', $prod->ID); ?>
                                                        <?= wp_get_attachment_image($image[1]['ID'] ?? '', 'large', false, array(
                                                            'class' => 'secondary-image',
                                                            'loading' => 'lazy',
                                                            'decoding' => 'async',
                                                            'alt' => get_the_title($prod->ID)
                                                        )); ?>
                                                        <?php if($icons): ?>
                                                            <ul class="icons-content">
                                                                <?php foreach($icons as $icon): ?>
                                                                    <li>
                                                                        <?= wp_get_attachment_image($icon['icon']['ID'] ?? '', 'medium', false, array(
                                                                            'class' => 'icon-image',
                                                                            'loading' => 'lazy',
                                                                            'decoding' => 'async',
                                                                            'alt' => $icon['text']
                                                                        )) ?>
                                                                        <span><?= $icon['text']; ?></span>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="end-card">
                                                        <span class="cta-card">
                                                            <span class="text"><?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?></span>
                                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>