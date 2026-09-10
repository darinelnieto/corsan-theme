   
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
                        <?= wp_get_attachment_image($sustainability['main_image']['ID'] ?? '', 'large', false, array(
                            'class' => 'sustainability-image',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                            'alt' => $sustainability['main_image']['title']
                        )); ?>
                    </div>
                    <div class="text-content">
                        <h2 class="sustainability-title"><?= $sustainability['title']; ?></h2>
                    </div>
                </div>
                <div class="bottom-content">
                    <div class="content mb-5">
                        <?php if($sustainability['iso_text']): ?>
                            <h3 class="title"><?= $sustainability['iso_text']; ?></h3>
                        <?php endif; ?>
                        <p class="description"><?= $sustainability['description']; ?></p>
                        <?php if($sustainability['process']): ?>
                            <div class="sustainability-cards">
                                <?php foreach($sustainability['process'] as $process): ?>
                                    <div class="process-card">
                                        <div class="image-contain">
                                            <?= wp_get_attachment_image($process['image']['ID'] ?? '', 'medium', false, array(
                                                'class' => 'process-image',
                                                'loading' => 'lazy',
                                                'decoding' => 'async',
                                                'alt' => $process['title']
                                            )); ?>
                                        </div>
                                        <div class="process-text">
                                            <?php if($process['title']): ?>
                                                <h4 class="process-sub"><?= $process['title']; ?></h4>
                                            <?php endif; if($process['process_description']): ?>
                                                <p><?= $process['process_description']; ?></p>
                                            <?php endif; ?>
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
                                            <?= wp_get_attachment_image($process['image']['ID'] ?? '', 'medium', false, array(
                                                'class' => 'process-image',
                                                'loading' => 'lazy',
                                                'decoding' => 'async',
                                                'alt' => $process['title']
                                            )); ?>
                                        </div>
                                        <div class="process-text">
                                            <?php if($process['title']): ?>
                                                <h4 class="process-sub"><?= $process['title']; ?></h4>
                                            <?php endif; if($process['process_description']): ?>
                                                <p><?= $process['process_description']; ?></p>
                                            <?php endif; ?>
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
                    