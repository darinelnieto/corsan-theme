   
<?php
/**
 * 
 * Partial Name: banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$category = get_queried_object();
if(!$category->taxonomy):
    $banner = get_field('select_banner');
    $title = get_the_title();
else:
    $banner = get_field('select_banner', $category->taxonomy . '_' . $category->term_id);
    $color = get_field('color', $category->taxonomy . '_' . $category->term_id);
    $title = $category->name;
endif;
?>
<section class="banner-partial-e9938f">
    <?php if($banner): ?>
        <img src="<?= $banner['url']; ?>" alt="<?= $banner['title']; ?>">
    <?php else: ?>
        <div class="color" style="background:<?= $color; ?>;"></div>
    <?php endif; ?>
</section>
                    