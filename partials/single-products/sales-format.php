   
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
if($sales_format):
$units = get_field('units');
?>
<section class="sales-format-partial-f7eea0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= get_field('title_sales_format'); ?></h2>
                <div class="sales-format-contain">
                    <div class="header-sales-format-table">
                        <div class="format-name">
                            <p><?php if(get_bloginfo("language") == "en-US"): echo "Reference"; else: echo "Referencia"; endif; ?></p>
                        </div>
                        <div class="presentation">
                            <p><?php if(get_bloginfo("language") == "en-US"): echo "Presentation"; else: echo "Presentación"; endif; ?></p>
                        </div>
                        <div class="units-container">
                            <p><?php if(get_bloginfo("language") == "en-US"): echo "Units"; else: echo "Unidades"; endif; ?></p>
                        </div>
                    </div>
                    <div class="body-sales-format-table">
                        <?php foreach($sales_format as $item): ?>
                            <div class="item">
                                <div class="format-name">
                                    <input type="hidden" class="product-name" value="<?= get_the_title(); ?>">
                                    <input type="hidden" class="the-feature-image" value="<?= get_the_post_thumbnail_url(); ?>">
                                    <p><?= $item['reference']; ?></p>
                                </div>
                                <div class="presentation">
                                    <p><?= $item['presentation']; ?></p>
                                </div>
                                <?php if($units): ?>
                                    <div class="add-to-car-container">
                                        <input type="hidden" class="sku" value="<?= $item['sku']; ?>">
                                        <div class="select-units">
                                            <div class="open-options">
                                                <p class="selected-units"><?php if(get_bloginfo("language") == "en-US"): echo "Select quantity"; else: echo "Selecciona cantidad"; endif; ?></p>
                                                <div class="icon"></div>
                                            </div>
                                            <div class="options-container">
                                                <ul>
                                                    <li class="the-option"><?php if(get_bloginfo("language") == "en-US"): echo "Select quantity"; else: echo "Selecciona cantidad"; endif; ?></li>
                                                    <?php foreach($units as $unit): ?>
                                                        <li class="the-option"><?= $unit['item']; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="add-to-cart-button d-none" onclick="add_to_car(value_initial)">
                    <span class="text"><?php if(get_bloginfo("language") == "en-US"): echo "Quote"; else: echo "Cotizar"; endif; ?></span>
                    <span class="icon <?php if(get_bloginfo("language") == "en-US"): echo "en"; endif; ?>"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('.add-to-cart-button .icon').html(`
            <svg xmlns="http://www.w3.org/2000/svg" width="15.656" height="15.656" viewBox="0 0 15.656 15.656">
                <g id="Grupo_240" data-name="Grupo 240" transform="translate(-1539.091 -986.869)">
                    <line id="Línea_13" data-name="Línea 13" y1="14.802" x2="14.802" transform="translate(1539.444 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                    <line id="Línea_14" data-name="Línea 14" x2="11.698" transform="translate(1542.548 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                    <line id="Línea_15" data-name="Línea 15" y2="11.698" transform="translate(1554.246 987.369)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="1"/>
                </g>
            </svg>
        `);
        $('.open-options .icon').html(`
            <svg xmlns="http://www.w3.org/2000/svg" width="25.842" height="25.842" viewBox="0 0 25.842 25.842">
                <g id="Grupo_66" data-name="Grupo 66" transform="translate(-391.861 -1408.314)">
                    <line id="Línea_22" data-name="Línea 22" x2="24.433" y2="24.433" transform="translate(392.445 1408.898)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                    <line id="Línea_23" data-name="Línea 23" y2="19.309" transform="translate(416.878 1414.022)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                    <line id="Línea_24" data-name="Línea 24" x1="19.309" transform="translate(397.569 1433.331)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                </g>
            </svg>
        `);
    });
    /*========= Select units =========*/
    $('.body-sales-format-table').on('click', '.the-option', function(){
        var the_option = $(this).text();
        var val_initial = '<?php if(get_bloginfo("language") == "en-US"): echo "Select quantity"; else: echo "Selecciona cantidad"; endif; ?>';
        $(this).parent().parent().parent().children('.open-options').children('.selected-units').html(`${the_option}`);
        if(the_option !== val_initial){
            $(this).parent().parent().parent().parent().parent().addClass('selected');
        }else{
            $(this).parent().parent().parent().parent().parent().removeClass('selected');
        }
        $('.select-units').removeClass('active');
        $('.options-container').css({'visibility':'hidden'});
        validate_options();
    });
</script>
<?php endif; ?>        