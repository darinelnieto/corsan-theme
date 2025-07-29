   
<?php
/**
 * 
 * Partial Name: time-line
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$add_time_line = get_field('add_time_line');
$purpose_and_mission = get_field('purpose_and_mission');
?>
<section class="time-line-partial-76a83f">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="about-us">
                    <h1 data-aos="fade-right"><?= get_field('title'); ?></h1>
                    <h2 data-aos="fade-right"><?= get_field('subtitle'); ?></h2>
                    <p class="description" data-aos="fade-right"><?= get_field('history_description'); ?></p>
                </div>
                <?php if($add_time_line): ?>
                    <div class="time-line">
                        <div class="time-line-slide owl-carousel">
                            <?php foreach($add_time_line as $item): ?>
                                <div class="item">
                                    <div class="card-item">
                                        <span class="year"><?= $item['year'] ?></span>
                                        <div class="image-and-text">
                                            <div class="image-container">
                                                <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>" width="<?= $item['image']['width']; ?>" height="<?= $item['image']['height']; ?>">
                                            </div>
                                            <div class="description"><?= $item['description']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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
                    <script>
                        $(document).ready(function () {
                            var $owl = $('.time-line-slide');
                            var owl = $owl.owlCarousel({
                                autoplay: false,
                                loop: false,
                                nav: false,
                                dots: false,
                                margin: 0,
                                responsive: {
                                    0: { items: 1 },
                                    640: { items: 2 },
                                    768: { items: 3 }
                                }
                            });

                            // Función para obtener el número de ítems visibles según ancho
                            function getItemsPerPage() {
                                var width = $(window).width();
                                if (width < 640) return 1;
                                if (width < 768) return 2;
                                return 3;
                            }

                            // Función para regenerar los dots personalizados
                            function generateCustomDots() {
                                $('#dots-content').empty();

                                var totalItems = $owl.find('.owl-item:not(.cloned)').length;
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
                            $owl.on('changed.owl.carousel', function (event) {
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
            </div>
        </div>
    </div>
</section>