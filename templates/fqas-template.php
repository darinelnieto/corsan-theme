   
<?php
/**
 * 
 * Template Name: fqas
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$fqas = get_field('fqas');
$key = 0;
?>
<main id="fqas-template-d518b0">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 data-aos="fade-right"><?= the_title(); ?></h1>
                    <?php if($fqas): ?>
                        <div class="fqas-list">
                            <?php foreach($fqas as $item): $key++; ?>
                                <div class="fqa-item">
                                    <div class="the-question" data-aos="zoom-in">
                                        <h4><span><?= $key; ?></span> ¿<?= $item['question'] ?>?</h4>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="the-answer">
                                        <p><?= $item['answer']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function(){
        $('.the-question .icon').html(`
            <svg xmlns="http://www.w3.org/2000/svg" width="25.842" height="25.842" viewBox="0 0 25.842 25.842">
                <g id="Grupo_140" data-name="Grupo 140" transform="translate(-8006.633 -528.689)">
                    <line id="Línea_13" data-name="Línea 13" x2="24.433" y2="24.433" transform="translate(8007.216 529.273)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                    <line id="Línea_14" data-name="Línea 14" y2="19.309" transform="translate(8031.649 534.397)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                    <line id="Línea_15" data-name="Línea 15" x1="19.309" transform="translate(8012.341 553.706)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                </g>
            </svg>
        `);
    });
</script>
<?php get_footer(); ?>
                    