   
<?php
/**
 * 
 * Partial Name: related-manuals
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$manuals = get_field('related_manuals');
if($manuals['manuals']):
?>
<section class="related-manuals-partial-d5f0ac">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $manuals['title']; ?></h2>
                <div class="related-manuals-contain">
                    <div class="mauals-slide owl-carousel">
                        <?php foreach($manuals['manuals'] as $item): ?>
                            <div class="item">
                                <a href="<?= get_permalink($item->ID); ?>" class="card-manual">
                                    <img src="<?= get_the_post_thumbnail_url($item->ID); ?>" alt="<?= get_the_title($item->ID); ?>" width="350" height="190" class="feature-image">
                                    <div class="text-contain">
                                        <h3><?= get_the_title($item->ID); ?></h3>
                                        <p class="description"><?= get_field('short_description', $item->ID); ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.mauals-slide').owlCarousel({
        loop:false,
        autoplay:false,
        nav:true,
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
                items:1
            },
            640:{
                items:2
            },
            991:{
                items:3
            }
        }
    });
</script>
<?php endif; ?> 