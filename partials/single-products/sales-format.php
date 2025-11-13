   
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
                <div class="cta-more-information" <?php if(empty($sales_format['table'])): ?>style="margin-top:0;"<?php endif; ?> onclick="open_end_quote()">
                    <span class="text">
                        <?php if(get_bloginfo("language") == "en-US"): ?>More information<?php else: ?>Más información<?php endif; ?>
                    </span>
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>  