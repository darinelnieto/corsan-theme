   
<?php
/**
 * 
 * Partial Name: taxonomies
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$category = get_queried_object();
$taxonomies = get_terms(['taxonomy' => 'product_cat']);
$solutions = get_terms(['taxonomy' => 'solutions_cat']);
$the_term = '';
if($category->taxonomy): 
    $the_term = $category->slug;
endif;
if($taxonomies):
?>
<section class="taxonomies-partial-a0ac83">
    <div class="container">
        <div class="row mb-3 card-product-cat-container">
            <?php foreach($taxonomies as $taxonomy):  ?>
                <div class="col-6 col-md-3 mb-4 item-taxonomy">
                    <a href="<?= home_url(); ?>/product_cat/<?= $taxonomy->slug; ?>/">
                        <div class="taxonomi-card">
                            <img src="<?= get_field('feature_image', $taxonomy->taxonomy . '_' . $taxonomy->term_id); ?>" alt="<?= $taxonomy->name; ?>">
                            <div class="name-category" style="background:<?= get_field('color', $taxonomy->taxonomy . '_' . $taxonomy->term_id) ?>;"></div>
                            <span style="width:<?= get_field('size_title', $taxonomy->taxonomy . '_' . $taxonomy->term_id); ?>px;"><?= $taxonomy->name; ?></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row filter-before-products">
            <div class="col-12">
                <h1>
                    <?php if(!$category->taxonomy): ?>
                        <?php if(get_bloginfo("language") == "en-US"): echo "products"; else: echo "Productos"; endif; ?>
                    <?php else: ?>
                        <?php if(get_bloginfo("language") == "en-US"): echo $category->name . " products"; else: echo "Productos de " . $category->name; endif; ?>
                    <?php endif; ?>
                </h1>
                <?php if($solutions): ?>
                    <div class="filter-solution">
                        <div class="open-filter">
                            <span class="text"><?php if(get_bloginfo("language") == "en-US"): echo "Filter here"; else: echo "Filtra aquí"; endif; ?></span>
                            <span class="icon"></span>
                        </div>
                        <div class="solution-list">
                            <ul>
                                <?php foreach($solutions as $solution): ?>
                                    <li>
                                        <a href="<?= $solution->slug; ?>"><?= $solution->name; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif;  ?>
            </div>
        </div>
    </div>
</section>           
<?php endif; ?>
<script>
    /*============ Filter product ============*/
    var filter = false;
    $('.open-filter').on('click', function(){
    if(filter === false){
        $(this).addClass('active');
        $('.solution-list').addClass('show');
        filter = true;
    }else{
        $(this).removeClass('active');
        $('.solution-list').removeClass('show');
        filter = false;
    }
    });
    /*========== Api route and parameters ==========*/
    <?php if(get_bloginfo("language") == "en-US"): ?>
        var rout = _dittoURL_ + "/wp-json/product/list";
    <?php else: ?>
        var rout = _dittoURL_ + "/es/wp-json/product/list";
    <?php endif; ?>
    var href = '';
    <?php if($category->taxonomy): ?>
        var product_category = '<?php echo $the_term; ?>';
    <?php else: ?>
        var product_category = '';
    <?php endif; ?>
    /*=========== Filter item click events ===========*/
    $('.solution-list').on('click', 'a', function(e){
        /*======== Close filter ========*/
        var name = $(this).text();
        $('.open-filter').removeClass('active');
        $('.solution-list').removeClass('show');
        $('.open-filter .text').html(`${name}`);
        filter = false;
        /*======= Get products list by ajax consult ========*/
        href = $(this).attr('href');
        get_products();
        e.preventDefault();
    });
    /*=========== Ajax query ===========*/
    function get_products(){
        $('#loading').removeClass('d-none');
        $('#product-list').html('');
        $.ajax({
            type:'GET',
            url: rout,
            data:{
                taxonomy:product_category,
                solutions_category: href
            }
        }).done(function(resp){
            
            $('#loading').addClass('d-none');
            if(resp.length > 0){
                for(item of resp){
                    $('#product-list').append(`
                        <div class="col-6 col-md-4 col-lg-3 mb-4">
                            <a href="${item.permalink}" class="card-produc">
                                <div class="body-product">
                                    <div class="img-container">
                                        <span class="color-hover" style="background:${item.color}"></span>
                                        <img src="${item.thumbnail}" alt="Imagen destacada del restaurante ${item.title}">
                                        </div>
                                    <div class="product-name">
                                        <h4 class="default">${item.title}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `);
                }
            }else{
                $('#product-list').html(`
                    <div class="col-12 text-center message-zero">
                        <h2>¡Ups!</h2>
                        <p><?php if(get_bloginfo("language") == "en-US"): echo "No products found related to your filter"; else: echo "No se encontraron productos relacionados a tu filtro"; endif; ?></p>
                    </div>
                `);
            }
        });
    };
    /*========== Ready ==========*/
    $(document).ready(function(){
        $('.open-filter .icon').html(`
            <svg xmlns="http://www.w3.org/2000/svg" width="25.842" height="25.842" viewBox="0 0 25.842 25.842">
                <g id="Grupo_66" data-name="Grupo 66" transform="translate(-391.861 -1408.314)">
                    <line id="Línea_22" data-name="Línea 22" x2="24.433" y2="24.433" transform="translate(392.445 1408.898)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                    <line id="Línea_23" data-name="Línea 23" y2="19.309" transform="translate(416.878 1414.022)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                    <line id="Línea_24" data-name="Línea 24" x1="19.309" transform="translate(397.569 1433.331)" fill="none" stroke="#002d74" stroke-miterlimit="10" stroke-width="1.651"/>
                </g>
            </svg>
        `);
        $('#loading').removeClass('d-none');
        get_products();
        // Validate active category
        var valida_url = $('.card-product-cat-container a');
        for(i = 0; valida_url.length > i; i++){
            if(valida_url[i].href == window.location.href){
                valida_url[i].classList.add("active");
            }
        }
    });
</script>