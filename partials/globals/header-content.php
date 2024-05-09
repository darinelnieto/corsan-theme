   
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
            <div class="col-md-7 nav-container">
                <?php wp_nav_menu(['menu' => 'menu main']); ?>
            </div>
            <div class="col-7 col-md-3 cta-languaje">
                <?php wp_nav_menu(['menu' => 'Menu 1']); ?>
                <div class="search-open" onclick="open_search()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.085" height="24.96" viewBox="0 0 24.085 24.96">
                        <g id="Grupo_341" data-name="Grupo 341" transform="translate(-1295.488 -49.503)">
                            <g id="Grupo_340" data-name="Grupo 340">
                            <path id="Trazado_219" data-name="Trazado 219" d="M1318.018,74.463a2.252,2.252,0,0,1-.958-.675q-2.772-2.9-5.555-5.782a1.969,1.969,0,0,1-.136-.178,9.963,9.963,0,0,1-8.415,1.475,9.7,9.7,0,0,1-5.8-4.2,10.072,10.072,0,1,1,16.14.965l2.04,2.123c1.262,1.312,2.505,2.642,3.791,3.928a1.34,1.34,0,0,1-.574,2.317c-.015,0-.027.018-.04.027Zm-12.462-7.435a7.448,7.448,0,1,0-7.435-7.47A7.452,7.452,0,0,0,1305.556,67.028Z" fill="#002d74"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="cart" onclick="open_car()">
                    <span class="count" id="car-count"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.517" height="29.371" viewBox="0 0 26.517 29.371">
                        <g id="Grupo_365" data-name="Grupo 365" transform="translate(-1842.654 -48.012)">
                            <path id="Trazado_220" data-name="Trazado 220" d="M1852.124,76h-5.573a3.164,3.164,0,0,1-3.164-3.164V51.909a3.163,3.163,0,0,1,3.164-3.164h13.494a3.163,3.163,0,0,1,3.164,3.164v5.806" fill="none" stroke="#002d74" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.465"/>
                            <g id="Grupo_342" data-name="Grupo 342">
                            <line id="Línea_107" data-name="Línea 107" x2="8.113" transform="translate(1849.241 64.893)" fill="none" stroke="#002d74" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.26"/>
                            <line id="Línea_108" data-name="Línea 108" x2="8.113" transform="translate(1849.241 67.766)" fill="none" stroke="#002d74" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.26"/>
                            <line id="Línea_109" data-name="Línea 109" x2="4.703" transform="translate(1849.241 70.64)" fill="none" stroke="#002d74" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.26"/>
                            </g>
                            <path id="Trazado_221" data-name="Trazado 221" d="M1853.989,52.744c.382.2.75.356,1.083.568a.684.684,0,1,1-.781,1.113,1.571,1.571,0,0,0-1.365-.245.9.9,0,0,0-.681.769.689.689,0,0,0,.448.794c.487.221.973.447,1.472.639a2.459,2.459,0,0,1,1.783,2.266,2.72,2.72,0,0,1-1.712,2.571c-.163.067-.261.123-.264.33-.007.6-.235.875-.675.875s-.669-.3-.691-.877c0-.034-.006-.068,0-.041-.536-.23-1.054-.424-1.542-.677a.919.919,0,0,1-.38-.488.586.586,0,0,1,.26-.688.635.635,0,0,1,.77-.011,2.433,2.433,0,0,0,1.6.388,1.33,1.33,0,0,0,1.267-1.212,1.02,1.02,0,0,0-.716-1.08c-.628-.269-1.272-.51-1.875-.826a2.185,2.185,0,0,1-.142-3.731.355.355,0,0,1,.057-.038c.439-.173.8-.375.779-.961-.008-.286.371-.478.673-.455a.665.665,0,0,1,.617.586C1853.986,52.471,1853.984,52.631,1853.989,52.744Z" fill="#002d74"/>
                            <path id="Trazado_222" data-name="Trazado 222" d="M1865.9,60.583l2.542,1.61-7.972,12.588-2.965,1.871.423-3.481Z" fill="none" stroke="#002d74" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.462"/>
                        </g>
                    </svg>
                </div>
                <div class="bar-menu-movil" onclick="menu_controller()">
                    <span class="top"></span>
                    <span class="center"></span>
                    <span class="bottom"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Search pop up -->
    <div class="search-form-container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <?= get_search_form(); ?>
            </div>
        </div>
    </div>
    <!-- Menu movil -->
    <div class="menu-movil">
        <div class="row align-items-center">
            <div class="col-12 col-md-7 main-menu">
                <?php wp_nav_menu(['menu' => 'menu main']); ?>
            </div>
            <div class="col-12 col-md-5 lenguages">
                <?php wp_nav_menu(['menu' => 'Menu 1']); ?>
            </div>
        </div>
    </div>
    <!-- Social network -->
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