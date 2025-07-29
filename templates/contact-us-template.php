   
<?php
/**
 * 
 * Template Name: contact-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banner = get_field('background_image');
?>
<main id="contact-us-template-55cc3c">
    <section>
        <img src="<?= $banner['url']; ?>" alt="<?= $banner['title']; ?>" class="background-image">
        <div class="container">
            <div class="row" id="content-contact">
                <div class="col-12 col-md-6">
                    <h1 class="title-page" data-aos="fade-right"><?= get_field('title_page'); ?></h1>
                    <p class="desription-page" data-aos="fade-right"><?= get_field('description_page'); ?></p>
                </div>
                <div class="col-12 col-md-6">
                    <div class="from-card" data-aos="fade-left" >
                        <h2><?= get_field('title_form_contact'); ?></h2>
                        <p><?= get_field('intro_form_contact'); ?></p>
                        <div class="form">
                            <?= do_shortcode(get_field('shortcode_form')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pqr-section">
        <div class="container">
            <div class="pqr-content">
                <div class="pqr-left" data-aos="fade-right">
                    <h3 class="pqr-title"><?= get_field('pqr_left_content')['title']; ?></h3>
                    <h4 class="pqr-subtitle"><?= get_field('pqr_left_content')['subtitle']; ?></h4>
                    <ul class="pqr-list">
                        <?php if (have_rows('pqr_left_content')) : 
                            while (have_rows('pqr_left_content')) : the_row();
                                if (have_rows('contact_list')) :
                                    while (have_rows('contact_list')) : the_row(); ?>
                                        <li>
                                            <span><?= get_sub_field('icon'); ?></span>
                                            <a href="<?= get_sub_field('link')['url']; ?>"><?= get_sub_field('link')['title']; ?></a>
                                        </li>
                                    <?php endwhile;
                                endif;
                            endwhile;
                        endif; ?>
                    </ul>
                </div>

                <div class="pqr-right" data-aos="fade-left">
                    <p><?= get_field('pqr_right_content')['intro']; ?></p>
                    <img src="<?= get_field('pqr_right_content')['image']['url']; ?>" alt="<?= get_field('pqr_right_content')['image']['title']; ?>">
                    <h3 class="pqr-title"><?= get_field('pqr_right_content')['pqrsf_title']; ?></h3>
                    <ul class="pqr-list">
                        <?php if (have_rows('pqr_right_content')) : 
                            while (have_rows('pqr_right_content')) : the_row();
                                if (have_rows('pqrsf_list')) :
                                    while (have_rows('pqrsf_list')) : the_row(); ?>
                                        <li>
                                            <div class="li-img">
                                                <img src="<?= get_sub_field('icon')['url']; ?>" alt="<?= get_sub_field('icon')['title']; ?>">
                                            </div>
                                            <div class="pqr-text">
                                                <strong><?= get_sub_field('name'); ?></strong>
                                                <span><?= get_sub_field('description'); ?></span>
                                            </div>
                                        </li>
                                    <?php endwhile;
                                endif;
                            endwhile;
                        endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
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
<?php get_footer(); ?>
                    