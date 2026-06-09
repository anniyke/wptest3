<?php
/**
 * @package Case-Themes
 */
?>
</div><!-- #main -->
<?php
 if (!is_404()) {
    stotage()->footer->getFooter();
}
?>
<?php do_action( 'pxl_anchor_target') ?>
<?php if ( class_exists( 'Woocommerce' ) ) { stotage_hook_anchor_cart(); } ?>
</div><!-- #wapper -->
<?php wp_footer(); ?>
</body>
</html>
