   
<?php
/**
 * 
 * Template Name: single-blog-post
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$video = get_field('video_id');
$id = get_the_ID();
$title = get_the_title();
if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
  $ip=$_SERVER['REMOTE_ADDR'];
}
$author_id = get_post_field('post_author', get_the_id());
$author_name = get_the_author_meta('display_name', $author_id);
$author_avatar = get_avatar($author_id, 96);
$cat = get_the_terms(get_the_id(), 'community_cat');
?>
<main id="single-blog-post-template-0f368e">
    <section class="content-post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-11">
                    <div class="title-contain">
                        <?php if($cat): ?>
                            <span class="category"><?= $cat[0]->name; ?></span>
                        <?php endif; ?>
                        <h1 data-aos="fade-right"><?= the_title(); ?></h1>
                        <div class="publish">
                            <div class="author">
                                <div class="author-avatar">
                                    <?php echo $author_avatar; ?>
                                </div>
                                <p class="author-info"><strong><?php echo esc_html($author_name); ?></strong></p>
                            </div>
                            <p class="date">
                                <?php if(get_bloginfo("language") == "en-US"): echo get_the_date('F j\,\ Y');  else: echo get_the_date('j \d\e\ F \d\e\l\ Y'); endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="the-content">
                        <?= the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related post -->
    <?php 
        $related = new WP_Query(array('post_type' => 'communities', 'post_status' => 'publish', 'orderby' => 'rand', 'post_per_page' => 3));
        if($related->have_posts()):
    ?>
    <section class="related-post"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h2 data-aos="fade-right"><?php if(get_bloginfo("language") == "en-US"): ?>Related Posts<?php else: ?>Artículos relacionados<?php endif; ?></h2>
                    <div class="related-manuals-contain">
                        <div class="slide-related-post owl-carousel">
                            <?php while($related->have_posts()): $related->the_post(); if($title !== get_the_title($related->ID)): ?>
                                <div class="item">
                                    <a href="<?= get_permalink($related->ID); ?>" class="card-manual">
                                        <img src="<?= get_the_post_thumbnail_url($related->ID); ?>" alt="<?= get_the_title($related->ID); ?>" width="350" height="190" class="feature-image">
                                        <div class="text-contain">
                                            <h3><?= get_the_title($related->ID); ?></h3>
                                            <p class="description"><?= get_field('short_description', $related->ID); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); endif; ?>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function(){
        get_likes();
    });
    $('.slide-related-post').owlCarousel({
        autoplay:false,
        loop:false,
        nav:false,
        navText:[
            `<svg width="68" height="69" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_142_196)">
                    <circle cx="34" cy="30.5" r="30" transform="rotate(180 34 30.5)" fill="white" fill-opacity="0.7"/>
                    <path d="M38 22.5L30 30.5L38 38.5" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_d_142_196" x="0" y="0.5" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0.05 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_142_196"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_142_196" result="shape"/>
                    </filter>
                </defs>
            </svg>`,
            `<svg width="68" height="69" viewBox="0 0 68 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_142_264)">
                    <circle cx="34" cy="30.5" r="30" fill="white" fill-opacity="0.7"/>
                    <path d="M29 38.5L37 30.5L29 22.5" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_d_142_264" x="0" y="0.5" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0 0.470588 0 0 0 0.05 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_142_264"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_142_264" result="shape"/>
                    </filter>
                </defs>
            </svg>`
        ],
        dots:true,
        margin:20,
        responsive:{
            0:{
                items:1.5,
                center:true,
                loop:true,
                nav:false
            },
            640:{
                items:2,
                nav:false,
            },
            991:{
                items:3
            }
        }
    }).css({'visibility':'visible'});
</script>