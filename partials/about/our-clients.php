   
<?php
/**
 * 
 * Partial Name: our-clients
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$clients = get_field('clients');
if($clients):
?>
<section class="our-clients-partial-75cf3f">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2><?= get_field('our_client_title'); ?></h2>
            </div>
            <div class="col-12 col-md-11">
                <div class="our-clients owl-carousel">
                    <?php foreach($clients as $client): ?>
                        <div class="item">
                            <img src="<?= $client['logo']['url']; ?>" alt="<?= $client['logo']['title']; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>         