   
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
if($sales_format['table']):
?>
<section class="sales-format-partial-f7eea0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($sales_format['title']): ?>
                    <h2><?= $sales_format['title']; ?></h2>
                <?php endif; ?>
                <div class="table-content">
                    <?= $sales_format['table']; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>        