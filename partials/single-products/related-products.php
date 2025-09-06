   
<?php
/**
 * 
 * Partial Name: related-products
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$the_id = get_the_id();
$the_name = get_the_title();
$the_category = get_object_term_cache($the_id, 'product_cat');
$related_products = new WP_Query(array('post_type' => 'products', 'product_cat' => $the_category[0]->slug, 'post_status' => 'publish', 'post_per_page' => 6, 'orderby' => 'rand'));
if($related_products->have_posts()):
?>
<section class="related-products-partial-573627">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?php if(get_bloginfo("language") == "en-US"): echo "Related products"; else: echo "Productos relacionados"; endif; ?></h2>
                <div class="products-slide owl-carousel">
                    <?php 
                        while($related_products->have_posts()): 
                        $related_products->the_post(); 
                        $cat = get_the_terms($related_products->ID, 'product_cat');
                        if(get_the_title($related_products->ID) !== $the_name):
                        $icons = get_field('icons_for_cards', $related_products->ID);
                    ?>
                        <div class="item">
                            <a href="<?= get_permalink($related_products->ID); ?>" class="card-produc">
                                <div class="body-product">
                                    <div class="product-name">
                                        <h4 class="default"><?= get_the_title($related_products->ID); ?></h4>
                                        <p class="taxonomy"><?= $cat[0]->name; ?></p>
                                    </div>
                                    <div class="img-container">
                                        <img src="<?= get_the_post_thumbnail_url($related_products->ID); ?>" alt="<?= get_the_title($related_products->ID); ?>" class="product-image">
                                        <?php $image = get_field('gallery', $related_products->ID); ?>
                                        <img src="<?= $image[1]['url']; ?>" alt="<?= $image[1]['title']; ?>" width="<?= $image[1]['width']; ?>" height="<?= $image[1]['height']; ?>" class="secondary-image">
                                        <?php if($icons): ?>
                                            <ul class="icons-content">
                                                <?php foreach($icons as $icon): ?>
                                                    <li>
                                                        <img src="<?= $icon['icon']['url']; ?>" alt="<?= $icon['icon']['title']; ?>" width="<?= $icon['icon']['width']; ?>" height="<?= $icon['icon']['height']; ?>">
                                                        <span><?= $icon['text']; ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <div class="end-card">
                                        <span class="cta-card">
                                            <span class="text"><?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?></span>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; endwhile; wp_reset_postdata(); ?>
                </div>
                <ul class="nav">
                    <li>
                        <a href="" class="prev">
                            <!-- flecha izq -->
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1213 18.5001H29V21.5001H16.1213L21.0606 26.4395L18.9393 28.5608L10.3787 20.0001L18.9393 11.4395L21.0606 13.5608L16.1213 18.5001Z" fill="#999999"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <ul id="dots-content"></ul>
                    </li>
                    <li>
                        <a href="" class="next">
                            <!-- flecha der -->
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.478 21.557H10.9243V18.443H23.478L18.6633 13.316L20.7311 11.114L29.0757 20L20.7311 28.886L18.6633 26.6841L23.478 21.557Z" fill="#999999"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>  
<script>
    $(document).ready(function () {
        var owl = $('.products-slide');
        owl.owlCarousel({
            autoplay:false,
            loop:false,
            nav:false,
            margin:40,
            responsive:{
                0:{
                    items:1.5,
                    center:true,
                },
                768:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        }).css({'visibility':'visible'});
        // Función para obtener el número de ítems visibles según ancho
        function getItemsPerPage() {
            var width = $(window).width();
            if (width < 640) return 1;
            if (width < 768) return 2;
            return 4;
        }

        // Función para regenerar los dots personalizados
        function generateCustomDots() {
            $('#dots-content').empty();

            var totalItems = owl.find('.owl-item:not(.cloned)').length;
            var itemsPerPage = getItemsPerPage();
            var totalPages = Math.ceil(totalItems / itemsPerPage);

            for (var i = 0; i < totalPages; i++) {
                $('#dots-content').append(
                    `<li><a href="#" class="dot" data-slide="${i}"></a></li>`
                );
            }

            // Click en cada dot para mover al slide correspondiente
            $('.dot').click(function (e) {
                e.preventDefault();
                var page = $(this).data('slide');
                owl.trigger('to.owl.carousel', [page * itemsPerPage, 300]);
            });

            // Activar el primero al inicio
            $('.dot').removeClass('active').eq(0).addClass('active');
        }

        // Mover con flechas
        $('.nav .prev').click(function (e) {
            e.preventDefault();
            owl.trigger('prev.owl.carousel');
        });

        $('.nav .next').click(function (e) {
            e.preventDefault();
            owl.trigger('next.owl.carousel');
        });

        // Actualizar el dot activo al cambiar de slide
        owl.on('changed.owl.carousel', function (event) {
            var itemsPerPage = getItemsPerPage();
            var pageIndex = Math.floor(event.item.index / itemsPerPage);

            $('.dot').removeClass('active');
            $('.dot').eq(pageIndex).addClass('active');
        });

        // Generar los dots al inicio
        generateCustomDots();

        // Regenerar al cambiar de tamaño
        $(window).on('resize', function () {
            setTimeout(generateCustomDots, 300);
        });
    });
</script>
<?php endif; ?>            