<?php
/**
* Template Name:Blank Template
*/
get_header();
if( shortcode_exists( 'themehunk-customizer-header' ) ):
	do_shortcode('[themehunk-customizer-header header="hide"]');
endif;
?>
<div id="page-blank" class="no-sidebar">
		<div class="content">
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="page-description">
				<?php the_content(); ?>
			</div>
			<?php
			endwhile;
			endif;
			?>
		</div>
</div>
<?php get_footer();