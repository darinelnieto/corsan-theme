   
<?php
/**
 * 
 * Partial Name: taxonomies
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$taxonomies = get_field('solutions_nav', 'options');
$category_nav = get_field('category_nav', 'option');
?>
<section class="taxonomies-partial-a0ac83">
    <?php if($taxonomies && is_front_page()): $key = 0; ?>
        <div class="taxonomy-image-slide">
            <div class="banner">
                <?php foreach($taxonomies as $item): $key++; ?>
                    <div class="card-taxonomy <?php if($key === 1): ?>main-card active<?php endif; ?>">
                        <div class="secondary-image">
                            <?= wp_get_attachment_image($item['image_active']['ID'] ?? '', 'medium', false, array(
                                'class' => 'image',
                                'fetchpriority' => 'high',
                                'alt' => $item['image_active']['title']
                            )); ?>
                        </div>
                        <div class="card-content <?php if(!$item['main_image']): ?>blue<?php endif; ?>">
                            <?php if(!empty($item['main_image'])): ?>
                                <?= wp_get_attachment_image($item['main_image']['ID'], 'medium', false, array(
                                    'class' => 'main-image',
                                    'fetchpriority' => 'high',
                                    'alt' => $item['main_image']['title']
                                )); ?>
                            <?php endif; ?>
                            <div class="text-contain">
                                <?php if($item['name']): ?>
                                    <h3><?= $item['name'] ?></h3>
                                <?php endif; if($item['decription']): ?>
                                    <p><?= $item['decription']; ?></p>
                                <?php endif; ?>
                            </div>
                            <a href="<?= $item['solutions_link']['url']; ?>" class="taxonomi-link">
                                <span>
                                    <?php if(get_bloginfo("language") == "en-US"): ?>See products<?php else: ?>Ver porductos<?php endif; ?>
                                </span>
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; if($category_nav && !is_front_page()): ?>
        <div class="category-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="category-list">
                            <?php foreach($category_nav as $item): ?>
                                <li>
                                    <a href="<?= $item['link']['url']; ?>">
                                        <?= wp_get_attachment_image($item['icon']['ID'] ?? '', 'medium', false, array(
                                            'class' => 'icon-image',
                                            'fetchpriority' => 'high',
                                            'alt' => $item['link']['title']
                                        )); ?>
                                        <span class="text"><?= $item['link']['title'] ?? ''; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>