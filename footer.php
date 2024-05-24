<?php
/**
 * 
 * Footer template.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<footer id="footer-wrapper">
    <?php get_template_part('/partials/globals/footer-content'); ?>
</footer>

</div> <!-- -Page container -->

<?php wp_footer(); ?>
</body>
<script>
  AOS.init();
</script>
</html>