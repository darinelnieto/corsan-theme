   
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
?>
<main id="single-blog-post-template-0f368e">
    <section class="content-post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11">
                    <h1 data-aos="fade-right"><?= the_title(); ?></h1>
                    <div class="description" data-aos="fade-right">
                        <?= the_content(); ?>
                    </div>
                    <?php if($video): ?>
                        <div class="video-container" data-aos="zoom-in">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="counters-metric">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="zoom-in">
                    <div class="share-and-likes">
                        <div class="cta-likes">
                            <input type="hidden" class="post-id" value="<?= $id; ?>">
                            <input type="hidden" class="ip-user" value="<?= $ip; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.743" height="23.587" viewBox="0 0 25.743 23.587">
                                <path id="favorite_FILL0_wght400_GRAD0_opsz48" d="M16.871,28.887,15.552,27.7q-3.411-3.121-5.631-5.39a39.819,39.819,0,0,1-3.54-4.054,13.391,13.391,0,0,1-1.85-3.234A8.449,8.449,0,0,1,4,12.09,6.651,6.651,0,0,1,10.757,5.3a6.864,6.864,0,0,1,3.395.869,8.245,8.245,0,0,1,2.719,2.51,9.381,9.381,0,0,1,2.864-2.558,6.71,6.71,0,0,1,3.25-.821,6.651,6.651,0,0,1,6.757,6.79,8.449,8.449,0,0,1-.531,2.928,13.39,13.39,0,0,1-1.85,3.234,39.819,39.819,0,0,1-3.54,4.054q-2.22,2.269-5.631,5.39Z" transform="translate(-4 -5.3)"/>
                            </svg>
                        </div>
                        <div class="share-end">
                            <div class="cta-share-action-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40.508" height="40.507" viewBox="0 0 40.508 40.507">
                                    <g id="Grupo_47" data-name="Grupo 47" transform="translate(-13604.798 -4194.811)">
                                        <path id="Trazado_25" data-name="Trazado 25" d="M13645.306,4196.314c-.314,1-.641,2-.942,3q-4.985,16.6-9.965,33.2a3.729,3.729,0,0,1-7.233-.031q-2.125-7.4-4.23-14.8a.632.632,0,0,0-.506-.5q-7.421-2.108-14.837-4.24a3.729,3.729,0,0,1-.062-7.2q7.787-2.337,15.578-4.671,10.094-3.029,20.188-6.058c.173-.052.338-.13.506-.195h.633a1.775,1.775,0,0,1,.87.87Zm-5.4,2.2c-.218.058-.331.085-.443.118l-18.719,5.615q-6.164,1.849-12.329,3.7a1.578,1.578,0,0,0-1.1.812,1.376,1.376,0,0,0,1.062,1.942q7.327,2.094,14.653,4.194a.625.625,0,0,0,.717-.185q7.906-7.926,15.826-15.836C13639.656,4198.78,13639.744,4198.683,13639.9,4198.516Zm1.688,1.72c-.12.108-.189.165-.255.229q-8,8-16,15.993a.478.478,0,0,0-.13.553c.511,1.756,1.01,3.516,1.512,5.276q1.355,4.746,2.706,9.492a1.465,1.465,0,0,0,.893,1.08c.812.305,1.557-.155,1.854-1.145q4.658-15.523,9.315-31.047C13641.518,4200.546,13641.543,4200.423,13641.59,4200.236Z" fill="#002d74"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="content-cta-share-end d-none">
                                <?= do_shortcode('[sharethis-inline-buttons]'); ?>
                            </div>
                        </div>
                    </div>
                    <h2 data-aos="zoom-in"><?= the_title(); ?></h2>
                    <div class="data-counters" data-aos="zoom-in">
                        <div class="likes-contain">
                            <div class="svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25.743" height="23.587" viewBox="0 0 25.743 23.587">
                                    <path id="favorite_FILL0_wght400_GRAD0_opsz48" d="M16.871,28.887,15.552,27.7q-3.411-3.121-5.631-5.39a39.819,39.819,0,0,1-3.54-4.054,13.391,13.391,0,0,1-1.85-3.234A8.449,8.449,0,0,1,4,12.09,6.651,6.651,0,0,1,10.757,5.3a6.864,6.864,0,0,1,3.395.869,8.245,8.245,0,0,1,2.719,2.51,9.381,9.381,0,0,1,2.864-2.558,6.71,6.71,0,0,1,3.25-.821,6.651,6.651,0,0,1,6.757,6.79,8.449,8.449,0,0,1-.531,2.928,13.39,13.39,0,0,1-1.85,3.234,39.819,39.819,0,0,1-3.54,4.054q-2.22,2.269-5.631,5.39Z" transform="translate(-4 -5.3)"/>
                                </svg>
                            </div>
                            <div class="likes-count"></div>
                        </div>
                        <div class="date-publish">
                            <div class="svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35.414" height="35.41" viewBox="0 0 35.414 35.41">
                                    <g id="Grupo_364" data-name="Grupo 364" transform="translate(-13590.837 -4455.12)">
                                        <path id="Trazado_29" data-name="Trazado 29" d="M13616.425,4455.12h.553a1.54,1.54,0,0,1,1.112,1.757c-.023.306,0,.616,0,.964.412,0,.789,0,1.165,0a6.846,6.846,0,0,1,6.991,6.794q.013,9.558,0,19.115a6.8,6.8,0,0,1-6.763,6.767q-10.941.03-21.881,0a6.811,6.811,0,0,1-6.564-5.239c-.072-.3-.129-.6-.194-.9v-20.4a1.359,1.359,0,0,0,.065-.224,6.824,6.824,0,0,1,6.214-5.866c.614-.039,1.232,0,1.88,0,0-.389.02-.7,0-1a1.536,1.536,0,0,1,1.111-1.752h.554a1.569,1.569,0,0,1,1.107,1.8c-.023.295,0,.593,0,.906h13.561c0-.314.02-.612,0-.906A1.571,1.571,0,0,1,13616.425,4455.12Zm7.054,13.669H13593.6v.406q0,7.156,0,14.313a4.079,4.079,0,0,0,4.24,4.25q10.7.005,21.4,0a4.077,4.077,0,0,0,4.235-4.254q0-7.156,0-14.313Zm-29.851-2.817h29.827c.427-3.955-2.128-5.747-5.369-5.322v.364c0,.772.009,1.545,0,2.317a1.38,1.38,0,0,1-2.759-.028c-.014-.885,0-1.77,0-2.675h-13.561v.4c0,.772.014,1.544,0,2.316a1.379,1.379,0,0,1-2.757-.012c-.011-.473,0-.945,0-1.418v-1.261C13595.7,4460.225,13593.2,4462.073,13593.628,4465.972Z" fill="#002d74"/>
                                        <path id="Trazado_30" data-name="Trazado 30" d="M13600.356,4483.747c-.438,0-.875.007-1.312,0a1.4,1.4,0,0,1-1.413-1.4,1.384,1.384,0,0,1,1.4-1.366q1.345-.013,2.691,0a1.38,1.38,0,1,1,.013,2.76C13601.277,4483.756,13600.816,4483.747,13600.356,4483.747Z" fill="#002d74"/>
                                        <path id="Trazado_31" data-name="Trazado 31" d="M13616.694,4483.747c-.449,0-.9.009-1.347,0a1.38,1.38,0,1,1,0-2.76q1.348-.015,2.693,0a1.381,1.381,0,1,1-.006,2.761C13617.592,4483.755,13617.143,4483.748,13616.694,4483.747Z" fill="#002d74"/>
                                        <path id="Trazado_32" data-name="Trazado 32" d="M13616.717,4472.825c.449,0,.9-.007,1.347,0a1.38,1.38,0,1,1-.006,2.761q-1.345.018-2.692,0a1.381,1.381,0,1,1,0-2.761C13615.819,4472.819,13616.268,4472.824,13616.717,4472.825Z" fill="#002d74"/>
                                        <path id="Trazado_33" data-name="Trazado 33" d="M13600.39,4472.825c.449,0,.9-.008,1.348,0a1.379,1.379,0,0,1,.022,2.759q-1.381.024-2.762,0a1.379,1.379,0,0,1,.011-2.758C13599.47,4472.817,13599.93,4472.825,13600.39,4472.825Z" fill="#002d74"/>
                                        <path id="Trazado_34" data-name="Trazado 34" d="M13608.52,4475.59c-.447,0-.9.008-1.346,0a1.38,1.38,0,1,1,.007-2.76q1.346-.015,2.692,0a1.382,1.382,0,1,1-.006,2.763C13609.418,4475.6,13608.969,4475.59,13608.52,4475.59Z" fill="#002d74"/>
                                        <path id="Trazado_35" data-name="Trazado 35" d="M13608.555,4480.983c.448,0,.9-.008,1.347,0a1.379,1.379,0,0,1,.007,2.758q-1.38.023-2.761,0a1.379,1.379,0,0,1,.026-2.758C13607.634,4480.976,13608.094,4480.983,13608.555,4480.983Z" fill="#002d74"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="date">
                                <p> <?php if(get_bloginfo("language") == "en-US"): ?> Published: <?= get_the_date('F j\,\ Y'); ?><?php else: ?>Publicado: <?= get_the_date('j \d\e\ F \d\e\l\ Y'); ?><?php endif; ?></p>
                            </div>
                        </div>
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
                    <div class="slide-related-post owl-carousel">
                        <?php while($related->have_posts()): $related->the_post(); if($title !== get_the_title($related->ID)): ?>
                            <div class="item" data-aos="zoom-in">
                                <a href="<?= get_permalink($related->ID); ?>">
                                    <div class="card-post">
                                        <div class="image-container">
                                            <img src="<?= get_the_post_thumbnail_url($related->ID); ?>" alt="<?= get_the_title($related->ID); ?>">
                                        </div>
                                        <div class="text-container">
                                            <h3 class="name-post"><?= get_the_title($related->ID); ?></h3>
                                            <p class="description"><?= get_field('short_description', $related->ID); ?></p>
                                            <div class="cta">
                                                <span class="text">
                                                    <?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?>
                                                </span>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
                                                        <g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
                                                            <line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                            <line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                            <line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; endwhile; ?>
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
        dots:false,
        margin:30,
        responsive:{
            0:{
                items:1,
                loop:true,
                autoplay:true
            },
            640:{
                items:2,
                loop:true,
                autoplay:true
            },
            769:{
                items:3
            }
        }
    }).css({'visibility':'visible'});
</script>