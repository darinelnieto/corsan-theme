   
<?php
/**
 * 
 * Partial Name: footer-content
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$logo = get_field('logo', 'option');
$contact_dates = get_field('contact_dates', 'option');
$favicon = get_field('favicon', 'option');
$social_network = get_field('social_networks_footer', 'option');
?>
<section class="footer-content-partial-ecbbb5">
    <div class="container">
        <div class="row justify-content-between align-items-start">
            <div class="col-12 col-md-4 mb-5 mb-md-0 contain-left">
                <h3><?= get_field('slogan', 'option'); ?></h3>
                <img src="<?= $logo['url']; ?>" alt="<?= $logo['title']; ?>">
            </div>
            <div class="col-12 col-md-4 menu-nav-container">
                <div class="row justify-content-end">
                    <div class="col-12 col-md-6 col-lg-5 mb-4 mb-md-0 nav-footer">
                        <h4><?php if(get_bloginfo("language") == "en-US"):?>Solutions<?php else: ?>Soluciones<?php endif; ?></h4>
                        <div class="the-nav">
                            <?php wp_nav_menu(['menu' => 'help']); ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0 nav-footer">
                        <h4><?php if(get_bloginfo("language") == "en-US"):?>Help<?php else: ?>Ayuda<?php endif; ?></h4>
                            <div class="the-nav">
                                <?php wp_nav_menu(['menu' => 'Solutions']); ?>
                            </div>
                    </div>
                </div>
            </div>
            <?php if($contact_dates): ?>
                <div class="col-12 col-xs-4 col-md-5 col-lg-4 mb-5 mb-md-0 contact-container">
                    <p><?= get_field('title_right', 'option'); ?></p>
                    <div class="contact-contain">
                        <ul>
                            <span class="rounde"></span>
                            <?php foreach($contact_dates as $contact): ?>
                                <li>
                                    <span class="icon"><?= $contact['fontawesom_icon']; ?></span>
                                    <span class="text"><?= $contact['contact_information']; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row copi-right-container">
            <div class="col-2 d-block d-md-none favicon">
                <img src="<?= $favicon['url']; ?>" alt="<?= $favicon['title']; ?>">
            </div>
            <div class="col-4 d-none d-md-block">
                <p class="copi-right"><?= get_field('text_copyright', 'option'); ?></p>
            </div>
            <div class="col-4 d-none d-md-block favicon text-center">
                <img src="<?= $favicon['url']; ?>" alt="<?= $favicon['title']; ?>">
            </div>
            <?php if($social_network): ?>
                <div class="col-10 col-md-4">
                    <div class="follow-us">
                        <p class="name-section"><?= get_field('text_follow_us', 'option'); ?></p>
                        <ul>
                            <?php foreach($social_network as $social): ?>
                                <li>
                                    <a href="<?= $social['social_network']; ?>" target="_blank"><?= $social['fontawesome_icon']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <p class="copi-right d-block d-md-none"><?= get_field('text_copyright', 'option'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
                    