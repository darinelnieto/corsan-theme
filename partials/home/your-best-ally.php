   
<?php
/**
 * 
 * Partial Name: your-best-ally
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_field('your_best_allies');
?>
<section class="your-best-ally-partial-9d74ce">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2><?= $content['title']; ?></h2>
            </div>
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div class="about-us">
                    <div class="about-description">
                        <p><?= $content['about_description']; ?></p>
                    </div>
                    <div class="year-content">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p><?= $content['company_age']; ?></p>
                            </div>
                            <div class="col-4">
                                <img src="<?= $content['age_image']['url']; ?>" alt="<?= $content['age_image']['title']; ?>" class="year-logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 mb-4 mb-md-0">
                <div class="card-gray">
                    <svg id="Grupo_6" data-name="Grupo 6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="516.815" height="516.815" viewBox="0 0 516.815 516.815">
                        <defs>
                            <clipPath id="clip-path">
                            <rect id="Rectángulo_9" data-name="Rectángulo 9" width="516.815" height="516.815" fill="none"/>
                            </clipPath>
                        </defs>
                        <g id="Grupo_5" data-name="Grupo 5" clip-path="url(#clip-path)">
                            <path id="Trazado_3" data-name="Trazado 3" d="M516.5,258.407c0,142.539-115.55,258.089-258.089,258.089S.319,400.946.319,258.407,115.87.319,258.408.319,516.5,115.869,516.5,258.407ZM258.408,41.61c-119.734,0-216.8,97.063-216.8,216.8s97.064,216.8,216.8,216.8,216.8-97.063,216.8-216.8S378.142,41.61,258.408,41.61Zm0,41.62A175.177,175.177,0,1,0,433.585,258.407,175.177,175.177,0,0,0,258.408,83.23Zm0,53A122.176,122.176,0,1,0,380.584,258.407,122.176,122.176,0,0,0,258.408,136.232Zm0,57.688a64.487,64.487,0,1,0,64.487,64.487A64.487,64.487,0,0,0,258.408,193.92Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.638"/>
                        </g>
                    </svg>
                    <p class="description"><?= $content['card_center']; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="map-card">
                    <img src="<?= $content['map_image']['url']; ?>" alt="<?= $content['map_image']['title']; ?>" class="map">
                    <p class="map-description"><?= $content['map_description']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
                    