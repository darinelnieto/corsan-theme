   
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
    <div class="top-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content">
                        <div class="logo-contain">
                            <img src="<?= $logo['url']; ?>" alt="<?= $logo['title']; ?>" width="<?= $logo['width']; ?>" height="<?= $logo['height']; ?>" class="logo">
                            <p class="slogan"><?= get_field('slogan', 'option'); ?></p>
                        </div>
                        <div class="right-content">
                            <!-- Nav -->
                            <div class="nav-content">
                                <div class="nav-item">
                                    <h4><?php if(get_bloginfo("language") == "en-US"):?>Solutions<?php else: ?>Soluciones<?php endif; ?></h4>
                                    <div class="the-nav">
                                        <?php wp_nav_menu(['menu' => 'Solutions']); ?>
                                    </div>
                                </div>
                                <div class="nav-item">
                                    <h4><?php if(get_bloginfo("language") == "en-US"):?>Help<?php else: ?>Ayuda<?php endif; ?></h4>
                                    <div class="the-nav">
                                        <?php wp_nav_menu(['menu' => 'help']); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact us -->
                            <div class="contact-us">
                                <div class="contact">
                                    <h4><?= get_field('title_right', 'option'); ?></h4>
                                    <ul>
                                        <?php foreach($contact_dates as $contact): ?>
                                            <li>
                                                <span class="icon"><?= $contact['fontawesom_icon']; ?></span>
                                                <span class="text"><?= $contact['contact_information']; ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                 <ul class="social-networks d-flex d-md-none">
                                    <?php foreach($social_network as $social): ?>
                                        <li>
                                            <a href="<?= $social['social_network']; ?>" target="_blank"><?= $social['fontawesome_icon']; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="bottom-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content">
                        <div class="users-content">
                            <?php wp_nav_menu([ 'menu' => 'Footer' ]); ?>
                        </div>
                        <hr>
                        <div class="end">
                            <p class="copi-right"><?= get_field('text_copyright', 'option'); ?></p>
                             <ul>
                                <?php foreach($social_network as $social): ?>
                                    <li>
                                        <a href="<?= $social['social_network']; ?>" target="_blank"><?= $social['fontawesome_icon']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    