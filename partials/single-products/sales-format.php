   
<?php
/**
 * 
 * Partial Name: sales-format
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$sales_format = get_field('sales_format');
$cta = $sales_format['download_cta'];
?>
<section class="sales-format-partial-f7eea0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($sales_format['title'])): ?>
                    <h2><?= $sales_format['title']; ?></h2>
                <?php endif; if(!empty($sales_format['table'])): ?>
                    <div class="the-table-contain">
                        <div class="table-content">
                            <?= $sales_format['table']; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="call-to-actions mt-5">
                    <?php if(!empty($cta['spanish']) || !empty($cta['english'])): 
                        if(get_bloginfo("language") == "en-US" && !empty($cta['english'])){ $link = $cta['english']; }else{ $link = $cta['spanish']; };
                    ?>
                        <a href="<?= $link['url']; ?>" target="_blank" class="downsload-btn" download="<?= $link['filename']; ?>">
                            <?= $cta['text']; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                <path d="M352 96C352 78.3 337.7 64 320 64C302.3 64 288 78.3 288 96L288 306.7L246.6 265.3C234.1 252.8 213.8 252.8 201.3 265.3C188.8 277.8 188.8 298.1 201.3 310.6L297.3 406.6C309.8 419.1 330.1 419.1 342.6 406.6L438.6 310.6C451.1 298.1 451.1 277.8 438.6 265.3C426.1 252.8 405.8 252.8 393.3 265.3L352 306.7L352 96zM160 384C124.7 384 96 412.7 96 448L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 448C544 412.7 515.3 384 480 384L433.1 384L376.5 440.6C345.3 471.8 294.6 471.8 263.4 440.6L206.9 384L160 384zM464 440C477.3 440 488 450.7 488 464C488 477.3 477.3 488 464 488C450.7 488 440 477.3 440 464C440 450.7 450.7 440 464 440z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <button class="cta-more-information form-popup-controller" onclick="open_end_quote()">
                        <span class="text">
                            <?php if(get_bloginfo("language") == "en-US"): ?>More information<?php else: ?>Más información<?php endif; ?>
                        </span>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>  