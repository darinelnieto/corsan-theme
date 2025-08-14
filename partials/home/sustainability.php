   
<?php
/**
 * 
 * Partial Name: sustainability
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$sustainability = get_field('environmental_responsibility_content');
$sustainability_two = get_field('environmental_responsibility_content_two');
?>
<section class="sustainability-partial-0c071c">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-content">
                    <div class="image-contain">
                        <img src="<?= $sustainability['main_image']['url']; ?>" alt="<?= $sustainability['main_image']['title']; ?>" width="<?= $sustainability['main_image']['width']; ?>" height="<?= $sustainability['main_image']['height']; ?>">
                    </div>
                    <div class="text-content">
                        <h2><?= $sustainability['title']; ?></h2>
                        <div class="iso-text">
                            <span><?= $sustainability['iso_text']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="bottom-content">
                    <div class="content mb-5">
                        <p class="description"><?= $sustainability['description']; ?></p>
                        <?php if($sustainability['process']): ?>
                            <div class="sustainability-cards">
                                <?php foreach($sustainability['process'] as $process): ?>
                                    <div class="process-card">
                                        <div class="image-contain">
                                            <img src="<?= $process['image']['url']; ?>" alt="<?= $process['image']['title']; ?>" width="<?= $process['image']['width']; ?>" height="<?= $process['image']['height']; ?>">
                                        </div>
                                        <div class="process-text">
                                            <p><?= $process['process_description']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <p class="description"><?= $sustainability['description_two']; ?></p>
                        <?php if($sustainability['process_two']): ?>
                            <div class="sustainability-cards">
                                <?php foreach($sustainability['process_two'] as $process): ?>
                                    <div class="process-card">
                                        <div class="image-contain">
                                            <img src="<?= $process['image']['url']; ?>" alt="<?= $process['image']['title']; ?>" width="<?= $process['image']['width']; ?>" height="<?= $process['image']['height']; ?>">
                                        </div>
                                        <div class="process-text">
                                            <p><?= $process['process_description']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    