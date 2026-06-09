<?php

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'stotage_loop_shop_columns', 20 ); 
function stotage_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : stotage()->get_theme_opt('products_columns', 4);
	return $columns;
}


// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'stotage_loop_shop_per_page', 20 );
function stotage_loop_shop_per_page( $limit ) {
	$limit = stotage()->get_theme_opt('product_per_page', 9);
	return $limit;
}
if(!function_exists('stotage_woocommerce_catalog_result')){
    // remove
	
    // add back
	add_action('woocommerce_before_shop_loop','stotage_woocommerce_catalog_result', 20);
	add_action('stotage_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
	add_action('stotage_woocommerce_result_count', 'woocommerce_result_count');
	function stotage_woocommerce_catalog_result(){
		$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : stotage()->get_theme_opt('products_columns', '2');
		$display_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : stotage()->get_theme_opt('shop_display_type', 'grid');
		$active_grid = 'active';
		$active_list = '';
		if( $display_type == 'list' ){
			$active_list = $display_type == 'list' ? 'active' : '';
			$active_grid = '';
		}
		?>
		<div class="pxl-shop-topbar-wrap ">
			<div class="pxl-view-layout-wrap ">
				<div class="text-heading number-result">
					<?php do_action('stotage_woocommerce_result_count'); ?>
				</div>
			</div>
				
				<div class="woocommerce-topbar-ordering">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
			</div>
			<?php
		}
	}

	/* Remove result count & product ordering & item product category..... */
	function stotage_cwoocommerce_remove_function() {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
	}
	add_action( 'init', 'stotage_cwoocommerce_remove_function' );

	/* Product Category */
	
	//add_action( 'woocommerce_before_shop_loop', 'stotage_woocommerce_nav_top', 2 );
	function stotage_woocommerce_nav_top() { ?>
		<div class="woocommerce-topbar">
			<div class="woocommerce-result-count">
				<?php woocommerce_result_count(); ?>
			</div>
			<div class="woocommerce-topbar-ordering">
				<?php woocommerce_catalog_ordering(); ?>
			</div>
		</div>
	<?php }

	add_filter( 'woocommerce_after_shop_loop_item', 'stotage_woocommerce_product' );
	function stotage_woocommerce_product() {
		global $product;
		$shop_layout = stotage()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
			$shop_layout = $_GET['shop-layout'];
		}
		?>
		<div class="woocommerce-product-inner item-layout-<?php echo esc_attr($shop_layout); ?>">
			<div class="woocommerce-product-header">
				<?php 
				if ( $product->is_featured() ) {
					$feature_text = get_post_meta($product->get_id(),'product_feature_text', true);
					if (empty($feature_text)){
						$feature_text = "NEW";
					}
					?>
					<span class="pxl-featured"><?php echo esc_html($feature_text); ?></span>
					<?php
				}
				?>
				<div class="pxl-add-to-cart">
					<?php
						echo apply_filters( 'pxl_loop_add_to_cart_link',
						sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							$product->is_purchasable() ? 'add_to_cart_button' : '',
							esc_attr( $product->get_type() ),
							esc_html( $product->add_to_cart_text() )
						),
						$product );
					?>
				</div>
				<a class="woocommerce-product-link" href="<?php the_permalink(); ?>">
				</a>
				<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
					<?php woocommerce_template_loop_product_thumbnail(); ?>
				</a>
			</div>
			<div class="woocommerce-product-content">
				<div class="woocommerce-product-meta">
					<div class="woocommerce-product-rating"><?php woocommerce_template_loop_rating(); ?></div>
					<h6 class="woocommerce-product-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h6>
					<div class="woocommerce-product--price">
						<?php woocommerce_template_loop_price(); ?>
					</div>
					<div class="woocommerce-product--excerpt" style="display: none;">
						<?php woocommerce_template_single_excerpt(); ?>
					</div>
				</div>

			</div>
		</div>
	<?php }

	add_filter('woocommerce_loop_add_to_cart_link', 'stotage_woocommerce_loop_add_to_cart_link', 10, 3);
	function stotage_woocommerce_loop_add_to_cart_link($button, $product, $args){
		return sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s><span class="pxl-cart-text pxl-hidden">%s</span><span class="pxl-cart-label">%s</span>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() ),
			esc_html( $product->add_to_cart_text() ),
			'<span class="pxl-cart-icon"><i class="flaticon-shoping-bag"></i></span>'
		);
	}

	/* Removes the "shop" title on the main shop page */
	function stotage_hide_page_title()
	{
		return false;
	}
	add_filter('woocommerce_show_page_title', 'stotage_hide_page_title');

	/* Replace text Onsale */
	add_filter('woocommerce_sale_flash', 'stotage_custom_sale_text', 10, 3);
	function stotage_custom_sale_text($text, $post, $_product)
	{
		return '<span class="onsale">' . esc_html__( 'Sale', 'stotage' ) . '</span>';
	}

	add_filter( 'woocommerce_checkout_before_order_review_heading', 'stotage_checkout_before_order_review_heading', 10 );
	function stotage_checkout_before_order_review_heading() {
		echo '<div class="pxl-checkout-order-review">';
	}
	add_filter( 'woocommerce_checkout_after_order_review', 'stotage_checkout_after_order_review', 20 );
	function stotage_checkout_after_order_review() {
		echo '</div>';
	}

	/**
	 * Modify image width theme support.
	 */
	add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
		$size['width'] = 400;
		$size['height'] = 700;
		$size['crop'] = 1;
		return $size;
	});

	add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
		$size['width'] = 700;
		$size['height'] = 700;
		$size['crop'] = 1;
		return $size;
	});

	add_filter('woocommerce_get_image_size_single', function ($size) {
		$size['width'] = 500;
		$size['height'] = 583;
		$size['crop'] = 1;
		return $size;
	});

	add_action( 'woocommerce_before_single_product_summary', 'stotage_woocommerce_single_summer_start', 0 );
	function stotage_woocommerce_single_summer_start() { ?>
		<?php echo '<div class="woocommerce-summary-wrap ">'; ?>
	<?php }
	add_action( 'woocommerce_after_single_product_summary', 'stotage_woocommerce_single_summer_end', 5 );
	function stotage_woocommerce_single_summer_end() { ?>
		<?php echo '</div></div>'; ?>
	<?php }


	add_action( 'woocommerce_single_product_summary', 'stotage_woocommerce_sg_product_rating', 5 );
	function stotage_woocommerce_sg_product_rating() {
		global $product;

		$rating_count = $product->get_rating_count();
		?>
		<div class="woocommerce-sg-product-rating">
			<?php 
			if ( $rating_count > 0 ) {
				woocommerce_template_single_rating();
			} else {
				echo '<p class="no-rating">(0 customer reviews)</p>';
			}
			?>
		</div>
		<?php
	}

	add_action( 'woocommerce_single_product_summary', 'stotage_woocommerce_sg_product_title', 10 );
	function stotage_woocommerce_sg_product_title() { 
		global $product; 
		$product_title = stotage()->get_theme_opt( 'product_title', true ); 
		if($product_title ) : ?>
			<div class="woocommerce-sg-product-title">
				<?php woocommerce_template_single_title(); ?>
			</div>
		<?php endif; }


	add_action( 'woocommerce_before_add_to_cart_quantity', 'custom_before_quantity_input_field', 25 );
	function custom_before_quantity_input_field() {
		echo '<div class="wooc-product-quantity">';
		echo '<span class="quantity-label">' . esc_html__( 'Quantity:', 'stotage' ) . '</span>';
	}

	add_action( 'woocommerce_after_add_to_cart_quantity', 'custom_after_quantity_input_field', 26 );
	function custom_after_quantity_input_field() {
		echo "</div>";
		global $product;
		?>
		<div class="wooc-product-meta">
			<?php if (class_exists('WPCleverWoosw')) { ?>
				<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
			<?php if (class_exists('WPCleverWoosc')) { ?>
				<?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
		</div>
		<?php
	}
	add_action( 'woocommerce_single_product_summary', 'stotage_woocommerce_sg_product_price', 11 );
	function stotage_woocommerce_sg_product_price() { ?>
		<div class="woocommerce-sg-product-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'stotage_woocommerce_sg_product_excerpt', 15 );
	function stotage_woocommerce_sg_product_excerpt() { ?>
		<div class="woocommerce-sg-product-excerpt">
			<?php woocommerce_template_single_excerpt(); ?>
		</div>
	<?php }

	add_action('woocommerce_single_product_summary','stotage_single_product_meta_before', 40);
	function stotage_single_product_meta_before() {
		global $product;
		echo '<div class="woocommerce-product-info-meta product_meta">';
		if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<div class="sku_wrapper"><?php esc_html_e( 'SKU:', 'stotage' ); ?> <span class="sku"><?php echo stotage_html($product->get_sku()); ?></span></div>
	<?php endif;
	echo wc_get_product_tag_list( $product->get_id(), '', '<div class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'stotage' ) . ' ', '</div>' );
}

add_action( 'woocommerce_single_product_summary', 'stotage_woocommerce_sg_social_share', 40 );
function stotage_woocommerce_sg_social_share() { 
	$product_social_share = stotage()->get_theme_opt( 'product_social_share', false );
	if($product_social_share) : ?>
		<div class="woocommerce-social-share">
			<label><?php echo esc_html__('Share:', 'stotage'); ?></label>
			<a class="fb-social" title="<?php echo esc_attr__('Facebook', 'stotage'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><i class="caseicon-facebook"></i></a>
			<a class="tw-social" title="<?php echo esc_attr__('Twitter', 'stotage'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"><i class="caseicon-twitter"></i></a>
			<a class="insta-social" title="<?php echo esc_attr__('Instagram', 'stotage'); ?>" target="_blank" href="https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>"><i class="fab fa-instagram"></i></a>
			<a class="yt-social" title="<?php echo esc_attr__('YouTube', 'stotage'); ?>" target="_blank" href="https://www.youtube.com/share?url=<?php echo urlencode(get_permalink()); ?>"><i class="fab fa-youtube"></i></a>
			<a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'stotage'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>&description=<?php echo urlencode(get_the_title()); ?>"><i class="fab fa-pinterest-p"></i></a>

		</div>
	<?php endif; }

	/* Product Single: Gallery */
	add_action( 'woocommerce_before_single_product_summary', 'stotage_woocommerce_single_gallery_start', 0 );
	function stotage_woocommerce_single_gallery_start() { ?>
		<?php echo '<div class="woocommerce-gallery"><div class="woocommerce-gallery-inner flex-slider-active">'; ?>
	<?php }
	add_action( 'woocommerce_before_single_product_summary', 'stotage_woocommerce_single_gallery_end', 30 );
	function stotage_woocommerce_single_gallery_end() { ?>
		<?php echo '</div></div><div class="woocommerce-summary-inner">'; ?>
	<?php }

	/* Ajax update cart item */
	add_filter('woocommerce_add_to_cart_fragments', 'stotage_woo_mini_cart_item_fragment');
		function stotage_woo_mini_cart_item_fragment( $fragments ) {
			global $woocommerce;
			$product_subtitle = stotage()->get_page_opt( 'product_subtitle' );
			ob_start();
			?>
			<div class="widget_shopping_cart">
				<div class="widget_shopping_head">
					<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
					<div class="widget_shopping_title">
						<?php echo esc_html__( 'Cart', 'stotage' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'stotage' ), WC()->cart->cart_contents_count ); ?>)</span>
					</div>
				</div>
				<div class="widget_shopping_cart_content">
					<?php
					$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
					?>
					<ul class="cart_list product_list_widget">

						<?php if ( ! WC()->cart->is_empty() ) : ?>

						<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

								$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
								$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
								$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
								<li>
									<?php if(!empty($thumbnail)) : ?>
										<div class="cart-product-image">
											<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
												<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="cart-product-meta">
										<h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
										<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
										<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_attr__( 'Remove this item', 'stotage' ),
											esc_attr( $product_id ),
											esc_attr( $cart_item_key ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
										?>
									</div>	
								</li>
								<?php
							}
						}
						?>

						<?php else : ?>

							<li class="empty">
								<i class="caseicon-shopping-cart-alt"></i>
								<span><?php esc_html_e( 'Your cart is empty', 'stotage' ); ?></span>
								<a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'stotage'); ?></a>
							</li>

						<?php endif; ?>

					</ul><!-- end product list -->
				</div>
				<?php if ( ! WC()->cart->is_empty() ) : ?>
				<div class="widget_shopping_cart_footer">
					<p class="total"><strong><?php esc_html_e( 'Subtotal', 'stotage' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

					<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

					<p class="buttons">
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'stotage' ); ?></a>
						<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'stotage' ); ?></a>
					</p>
				</div>
			<?php endif; ?>
		</div>
		<?php
		$fragments['div.widget_shopping_cart'] = ob_get_clean();
		return $fragments;
	}
	





/* Ajax update cart total number */




add_filter( 'woocommerce_add_to_cart_fragments', 'stotage_woocommerce_sidebar_cart_count_number' );
function stotage_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'stotage' ), WC()->cart->cart_contents_count ); ?>)</span>
	<?php
	
	$fragments['span.widget_cart_counter'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'stotage_woocommerce_sidebar_cart_count_number_header' );
function stotage_woocommerce_sidebar_cart_count_number_header( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'stotage' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.widget_cart_counter_header'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'stotage_woocommerce_sidebar_cart_count_number_sidebar' );
function stotage_woocommerce_sidebar_cart_count_number_sidebar( $fragments ) {
	ob_start();
	?>
	<span class="ct-cart-count-sidebar"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'stotage' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.ct-cart-count-sidebar'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_output_related_products_args', 'stotage_related_products_args', 20 );
function stotage_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_after_single_product', 'custom_output_related_products_outside_summary', 5);
function custom_output_related_products_outside_summary() {
    woocommerce_output_related_products();
}


/* Pagination Args */
function stotage_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
	return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'stotage_filter_woocommerce_pagination_args', 10, 1 ); 

/* Flex Slider Arrow */
add_filter( 'woocommerce_single_product_carousel_options', 'stotage_update_woo_flexslider_options' );
function stotage_update_woo_flexslider_options( $options ) {
	$options['directionNav'] = true;
	return $options;
}


add_filter( 'woocommerce_product_additional_information_heading', function( $heading ) {
    return 'Information';
});


function custom_woocommerce_review_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="custom-review">
            <div class="review-text"><?php comment_text(); ?></div>
			<div class="pxl-holder">
				<div class="review-author"><?php echo get_avatar( $comment, 60 ); ?> <?php printf( '<strong>%s</strong>', get_comment_author() ); ?></div>
				<?php if ( $rating ) : ?>
					<div class="review-rating"><?php echo wc_get_rating_html( $rating ); ?></div>
				<?php endif; ?>
			</div>
        </div>
    </li>
    <?php
}
add_filter( 'woocommerce_product_review_list_args', 'custom_override_review_list_callback' );
function custom_override_review_list_callback( $args ) {
    $args['callback'] = 'custom_woocommerce_review_callback';
    return $args;
}


