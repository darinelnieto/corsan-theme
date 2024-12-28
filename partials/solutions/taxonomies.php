   
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
$the_term = get_the_title();
if($category->taxonomy): 
    $the_term = $category->name;
endif;
?>
<section class="taxonomies-partial-a0ac83">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-and-filter">
                    <h1><?= $the_term; ?></h1>
                    <p><?php if(get_bloginfo("language") == "en-US"): ?>Filter here<?php else: ?>Filtra aquí<?php endif; ?></p>
                    <div class="filter-contain">
                        <?php wp_nav_menu(['menu'=>'Categories']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(()=>{
        $('.solutions a').addClass('active');
        var cambio = false;
        $('.filter-contain ul li a').each(function(index) {
            if(this.href.trim() == window.location){
                $(this).addClass("active");
                cambio = true;
            }
        });
    });
</script>