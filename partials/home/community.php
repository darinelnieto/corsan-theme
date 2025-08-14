   
<?php
/**
 * 
 * Partial Name: community
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
// Obtener el grupo de campos
$community_content = get_field('videos_and_manuals_content');
$items = [];
// Validar modo manual y existencia de lista
$is_manual = isset($community_content['enable_manual_sorting_of_videos_and_manuals']) && $community_content['enable_manual_sorting_of_videos_and_manuals'] === true;
if($is_manual && !empty($community_content['list']) && is_array($community_content['list'])){
    $items = array_chunk($community_content['list'], 2);
} else {
    $blog = new WP_Query(array(
        'post_type' => 'communities',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    $posts = [];
    if($blog->have_posts()){
        while($blog->have_posts()){
            $blog->the_post();
            $posts[] = [
                'item' => get_post(),
            ];
        }
        wp_reset_postdata();
    }
    $items = array_chunk($posts, 2);
}
// Ya se asigna $items correctamente en cada modo
if(count($items) > 0): 
    $key = 0;
    $section_title = !empty($community_content['title']) ? $community_content['title'] : get_field('title_communities');
    $section_link = !empty($community_content['page_link']) ? $community_content['page_link'] : get_field('page_link_communities');
?>
<section class="community-partial-2f2a01">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    <a href="<?= esc_url($section_link); ?>">
                        <?= esc_html($section_title); ?>
                    </a>
                </h2>
                <div class="comunity-content">
                    <?php foreach($items as $item): $key++; ?>
                        <div class="column <?php if($key == 1): ?>column-left<?php endif; if($key > 1 && $key < 3): ?>column-center d-none d-md-flex<?php endif; if($key == 3): ?>column-right d-none d-md-flex<?php endif; ?>">
                            <?php foreach($item as $card): ?>
                                <?php if($is_manual): ?>
                                    <?php 
                                    // Si el campo es un Post Object, puede ser ID o array
                                    $post_id = is_array($card) ? (isset($card['item']) ? (is_array($card['item']) ? $card['item']['ID'] : $card['item']) : $card) : $card;
                                    ?>
                                    <a href="<?= esc_url(get_permalink($post_id)); ?>" class="card-item">
                                        <?= get_the_post_thumbnail($post_id); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= get_permalink($card['item']->ID); ?>" class="card-item">
                                        <?= get_the_post_thumbnail($card['item']->ID); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if($section_link): ?>
                    <a href="<?= esc_url($section_link); ?>" class="see-more">
                        <?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>