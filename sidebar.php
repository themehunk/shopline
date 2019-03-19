<?php
/**
* The template for displaying the sidebar
*/
?>
<div class="sidebar-wrapper">
	<aside class="sidebar">
		<div class="widget">
			<?php
			$shop_sidebar = false;
			    if(shopline_is_woocommerce_activated() && (is_woocommerce() || is_cart() || is_shop() || is_checkout() || is_wc_endpoint_url() || is_account_page())){
					if ( is_active_sidebar( 'woocommerce-sidebar' ) ){
				    dynamic_sidebar( 'woocommerce-sidebar' );
				  }
				$shop_sidebar = true;
				}

			    if(!$shop_sidebar){
				    if ( is_active_sidebar( 'primary-sidebar' ) ){
				    dynamic_sidebar( 'primary-sidebar' );
				  }
				}
			?>
		</div>
	</aside>
</div>