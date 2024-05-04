   
<?php
/**
 * 
 * Partial Name: header-content
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$social_networks = get_field('social_networks', 'option');
?>
<script>
    jQuery(document).ready(function(){
        var cambio = false;
        jQuery('#menu-menu-1 li a').each(function(index) {
            if(this.href.trim() == window.location){
                jQuery(this).addClass("active");
                cambio = true;
            }
        });
    }); 
    let value_initial = '<?php if(get_bloginfo("language") == "en-US"): echo "Select quantity"; else: echo "Selecciona cantidad"; endif; ?>';
</script>
<section class="header-content-partial-777e2f">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-5 col-md-2 logo-container">
                <?= get_custom_logo(); ?>
            </div>
            <div class="col-md-8 d-none d-md-block nav-container">
                <?php wp_nav_menu(['menu' => 'menu main']); ?>
            </div>
            <div class="col-4 col-md-2 cta-languaje">
                <?php wp_nav_menu(['menu' => 'Menu 1']); ?>
                <div class="cart" onclick="open_car()">
                    <span class="count" id="car-count"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28.869" height="28.115" viewBox="0 0 28.869 28.115">
                        <g id="Grupo_259" data-name="Grupo 259" transform="translate(-1838.252 -47.925)">
                            <path id="Trazado_171" data-name="Trazado 171" d="M1838.252,48.444a.82.82,0,0,1,.87-.518c.649.019,1.3,0,1.947.006a3.074,3.074,0,0,1,3.006,2.166c.171.5.341.995.49,1.5a.31.31,0,0,0,.354.257c2.153.024,4.306.058,6.46.089q7.446.1,14.893.218a1.108,1.108,0,0,1,.642.214.648.648,0,0,1,.2.533c-.55,2.358-1.087,4.721-1.711,7.061a3.591,3.591,0,0,1-3.222,2.587c-2.627.263-5.252.55-7.878.824-1.888.2-3.776.4-5.666.578a.654.654,0,0,0-.614.441,1.818,1.818,0,0,0,1.714,2.637c4.165-.031,8.331-.011,12.5-.01a2.343,2.343,0,0,1,.419.031.632.632,0,0,1,.553.67.65.65,0,0,1-.577.628,1.883,1.883,0,0,1-.281.012q-6.335,0-12.667,0a3.139,3.139,0,0,1-2.917-4.446,1.629,1.629,0,0,0,.073-1.278c-1.351-4-2.672-8.013-4-12.022a1.756,1.756,0,0,0-1.871-1.349c-.611,0-1.222-.009-1.833,0a.8.8,0,0,1-.877-.548Zm6.854,4.745c.019.085.024.132.039.176q1.494,4.531,2.986,9.066c.056.172.142.2.307.185,1.075-.118,2.15-.226,3.225-.338l10.376-1.073a2.283,2.283,0,0,0,2.172-1.879q.564-2.3,1.12-4.6c.1-.4.193-.811.294-1.238Z" fill="#002d74"/>
                            <path id="Trazado_172" data-name="Trazado 172" d="M1847.468,76.04a3.015,3.015,0,0,1,0-6.03,3.015,3.015,0,1,1,0,6.03Zm-.041-1.345A1.67,1.67,0,1,0,1845.8,73,1.673,1.673,0,0,0,1847.427,74.695Z" fill="#002d74"/>
                            <path id="Trazado_173" data-name="Trazado 173" d="M1863.213,73.024a3.011,3.011,0,1,1-3.015-3.014A3.01,3.01,0,0,1,1863.213,73.024Zm-3,1.672a1.671,1.671,0,1,0-1.684-1.652A1.681,1.681,0,0,0,1860.211,74.7Z" fill="#002d74"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <?php if($social_networks): ?>
        <div class="social-networks-container">
            <ul>
                <?php foreach($social_networks as $social_network): ?>
                    <li>
                        <a href="<?= $social_network['social_network']; ?>" target="_blank"><?= $social_network['fontawesome_icon']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- Car list -->
    <div class="car-list" id="car-pop-up">
        <span class="car-close" onclick="close_car()"></span>
        <div class="car-header"></div>
        <div class="car-body" id="car-body"></div>
        <div class="car-footer">
            <button class="end-quote d-none" onclick="open_end_quote()">
                <?php if(get_bloginfo("language") == "en-US"): echo "End quote"; else: echo "Finalizar cotización"; endif; ?>
            </button>
        </div>
    </div>
    <!-- End quote form -->
    <div class="end-quote-form-pop-up">
        <div class="form-container">
            <div class="close-quote-form" onclick="close_end_quote()"></div>
            <h3><?php if(get_bloginfo("language") == "en-US"): 
                echo "To continue, you must fill out the following form."; else: 
                echo "Para continuar, debes llenar el siguiente formulario."; 
                endif; ?>
            </h3>
            <div class="the-form">
                <?= do_shortcode(get_field('shortcode_form', 'option')); ?>
            </div>
        </div>
    </div>
</section>