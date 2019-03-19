<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div><i class="icon-search"></i>
		<input type="text" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'shopline' ); ?>" name="s" id="s" />
		<input type="submit" value="<?php echo esc_attr_x( 'Search', 'text', 'shopline' ); ?>" />
	</div>
</form>