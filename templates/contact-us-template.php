   
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
$after_form = get_field('after_form_content');
$social_network = get_field('social_networks_footer', 'option');
?>
<main id="contact-us-template-55cc3c">
    <section class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-content">
                        <div class="title-contain">
                            <p class="text-before-title"><?= get_field('text_before_title'); ?></p>
                            <h1><?= get_field('title'); ?></h1>
                        </div>
                        <?php if($social_network): ?>
                            <div class="social-network">
                                <ul>
                                    <?php foreach($social_network as $social): ?>
                                        <li>
                                            <a href="<?= $social['social_network']; ?>" target="_blank"><?= $social['fontawesome_icon']; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form">
                        <?= do_shortcode(get_field('shortcode_form')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="after-form">
        <?= wp_get_attachment_image($after_form['main_image']['ID'] ?? '', 'large', false, array(
            'class' => 'bg-image',
            'loading' => 'lazy',
            'decoding' => 'async',
            'alt' => $after_form['main_image']['title'] ?? $after_form['title']
        )); ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-contain">
                        <div class="left-content">
                            <p class="before-title"><?= $after_form['text_before_title']; ?></p>
                            <h2><?= $after_form['title']; ?></h2>
                        </div>
                        <div class="right-contain">
                            <div class="content">
                                <h3><?= $after_form['contact_us_title']; ?></h3>
                                <div class="description">
                                    <?= $after_form['contact']; ?>
                                </div>
                            </div>
                            <div class="content">
                                <h3><?= $after_form['location_title']; ?></h3>
                                <div class="description">
                                    <?= $after_form['location']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    