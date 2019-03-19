<?php
/**
* The Template for displaying all single posts
* @since shopline 1.0
*/
get_header();
if( shortcode_exists( 'themehunk-customizer-header' ) ){
do_shortcode('[themehunk-customizer-header header="top"]');
}else { ?>
<div class="page-head parallax image">
  <div class="page-head-image default">
  </div>
</div>
<?php }
$layout = shopline_get_layout();?>
<div id="page" class="clearfix <?php echo esc_attr($layout); ?>">
	<div class="content-wrapper">
		<?php if(!shortcode_exists( 'themehunk-customizer-header' ) ): ?>
		<div class="breadcrumb">
	         <?php shopline_breadcrumb(); ?>
       </div>
   <?php endif; ?>
		<!-- Content Start -->
		<div class="content">
			<!-- blog-single -->
			<div class="page-block">
				<?php if (have_posts()) : while (have_posts()) : the_post();
				get_template_part('content');
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				endwhile; endif; ?>
			</div>
			<!-- /blog-single -->
		</div>
		<!-- / Content End -->
	</div>
	<?php if ( $layout != 'no-sidebar' ) { ?>
	<?php get_sidebar(); ?>
	<?php   } ?>
</div>
<?php get_footer(); ?>