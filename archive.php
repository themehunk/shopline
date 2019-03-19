<?php
/**
* The template for displaying archive pages
* If you'd like to further customize these archive views, you may create a
* @package ThemeHunk
* @subpackage shopline
*/
?>
<?php get_header();
if( shortcode_exists( 'themehunk-customizer-header' ) ){
	do_shortcode('[themehunk-customizer-header header="top" type="archive"]');
} else { ?>
<div class="page-head parallax image">
  <div class="page-head-image default">
  </div>
</div>
<?php }
$layout = shopline_get_layout();
?>
<!-- end head -->
<div id="page" class="clearfix <?php echo esc_attr($layout); ?>">
	<div class="content-wrapper">
		<?php if(!shortcode_exists( 'themehunk-customizer-header' ) ): ?>
		<div class="breadcrumb">
	         <?php shopline_breadcrumb(); ?>
       </div>
   <?php endif; ?>
   <?php if(!shortcode_exists( 'themehunk-customizer-header' ) ): ?>
	         <?php the_archive_title('<h1 class="title overtext default">','</h1>'); ?>
<?php endif; ?>
		<!-- Content Start -->
		<div class="content">
			<div class="page-block">
				<ul class="blog-content">
					<?php get_template_part('loop', 'blog'); ?>
				</ul>
			</div>
		</div>
	</div>
	<?php if ( $layout != 'no-sidebar' ) { ?>
	<?php get_sidebar(); ?>
	<?php   } ?>
</div>
<?php get_footer(); ?>