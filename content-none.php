<?php
/**
 * The template for displaying a "No posts found" message
 */
?>
 <div class="page-block">
  <div class="page-title"><h1><?php esc_html_e( 'Nothing Found', 'shopline' ); ?></h1>
  <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
  <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'shopline' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shopline' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>
	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'shopline' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
  </div>
</div>