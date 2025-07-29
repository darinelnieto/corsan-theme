   
<?php
/**
 * 
 * Partial Name: taxonomies
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$taxonomies = get_field('solutions_nav', 'options');
$category_nav = get_field('category_nav', 'option');
?>
<section class="taxonomies-partial-a0ac83">
    <?php if($taxonomies): $key = 0; ?>
        <div class="banner">
            <?php foreach($taxonomies as $item): $key++; ?>
                <div class="card-taxonomy <?php if($key === 1): ?>main-card active<?php endif; ?>">
                    <div class="secondary-image">
                        <img src="<?= $item['image_active']['url']; ?>" alt="<?= $item['image_active']['title']; ?>" width="<?= $item['image_active']['width']; ?>" height="<?= $item['image_active']['height']; ?>">
                    </div>
                    <div class="card-content <?php if(!$item['main_image']): ?>blue<?php endif; ?>">
                        <?php if($item['main_image']): ?>
                            <img src="<?= $item['main_image']['url']; ?>" alt="<?= $item['main_image']['title']; ?>" width="<?= $item['main_image']['width']; ?>" height="<?= $item['main_image']['height']; ?>" class="main-image">
                        <?php endif; ?>
                        <div class="text-contain">
                            <?php if($item['name']): ?>
                                <h3><?= $item['name'] ?></h3>
                            <?php endif; if($item['decription']): ?>
                                <p><?= $item['decription']; ?></p>
                            <?php endif; ?>
                        </div>
                        <a href="<?= $item['solutions_link']['url']; ?>" class="taxonomi-link">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 16H30M30 16L16 2M30 16L16 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; if($category_nav): ?>
        <div class="category-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="category-list">
                            <?php foreach($category_nav as $item): ?>
                                <li>
                                    <a href="<?= $item['link']['url']; ?>">
                                        <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>" width="<?= $item['icon']['width']; ?>">
                                        <span class="text"><?= $item['link']['title']; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>
<script>
    $(()=>{
        $('.taxonomies-partial-a0ac83 .taxonomi-link').each(function(index) {
            if(this.href.trim() == window.location.href){
                $('.main-card').removeClass('active');
                $(this).parent().parent().addClass("active");
            }
        });
    });
</script>