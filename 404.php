<?php
/**
* The template for displaying 404 pages (Not Found)
*
* @package ThemeHunk
*/
get_header();
if( shortcode_exists( 'themehunk-customizer-header' ) ){
	do_shortcode('[themehunk-customizer-header header="top"]');
} else { ?>
<div class="page-head parallax image">
  <div class="page-head-image default">
  </div>
</div>
<?php }
$layout = shopline_get_layout();
?>
<div id="page" class="<?php echo esc_attr($layout); ?>">

	<div class="page-title breadcrumb">
		<h1><?php esc_html_e( 'Not Found', 'shopline' ); ?></h1>
	</div>
	<div class="content-wrapper">
		<div class="content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'shopline' ); ?></p>
		<?php get_search_form(); ?>
			
		</div>
	</div>
	<?php if($layout != 'no-sidebar'){?>
	<?php get_sidebar(); ?>
	<?php   } ?>
</div>
<?php get_footer(); ?>