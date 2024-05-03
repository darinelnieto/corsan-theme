   
<?php
/**
 * 
 * Partial Name: community
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$community = new WP_Query(array('post_type' => 'communities', 'post_status' => 'publish', 'post_per_page' => 4, 'order' => 'DESC'));
if($community->have_posts()):
?>
<section class="community-partial-2f2a01">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-container">
                    <h2 class="community-title"><?php if(get_bloginfo("language") == "en-US"): echo "Community"; else: echo "Comunidad"; endif; ?></h2>
                    <a href="<?= get_field('select_page_to_see_all_posts'); ?>">
                        <span class="button-container">
                            <span class="text-button"><?= get_field('button_text'); ?></span>
                            <span class="icon"></span>
                        </span>
                    </a>
                </div>
                <div class="community-posts-container">
                    <?php while($community->have_posts()): $community->the_post(); ?>
                        <div class="community-card">
                            <a href="<?= get_permalink($community->ID); ?>">
                                <div class="conten-post">
                                    <img src="<?= get_the_post_thumbnail_url($community->ID); ?>" alt="">
                                    <div class="text-container" style="background:<?= get_field('post_color', $community->ID); ?>">
                                        <div class="texts">
                                            <h4 class="title"><?= get_the_title($community->ID); ?></h4>
                                            <p class="short-description"><?= get_field('short_description', $community->ID); ?></p>
                                            <span class="cta-button">
                                                <span><?php if(get_bloginfo("language") == "en-US"): echo "See more"; else: echo "Ver más"; endif; ?></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29.479" height="23.892" viewBox="0 0 29.479 23.892">
                                                    <g id="Grupo_236" data-name="Grupo 236" transform="translate(-496.719 -4036.974)">
                                                        <line id="Línea_51" data-name="Línea 51" x2="28.986" transform="translate(496.719 4048.919)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.393"/>
                                                        <line id="Línea_52" data-name="Línea 52" x2="11.454" y2="11.454" transform="translate(514.252 4037.466)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.393"/>
                                                        <line id="Línea_53" data-name="Línea 53" x1="11.454" y2="11.454" transform="translate(514.252 4048.919)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.393"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('.button-container .icon').html(`
            <svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
                <g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
                    <line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                    <line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                    <line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                </g>
            </svg>
        `);
    });
</script>
<?php endif; ?>