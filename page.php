<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that
* other 'pages' on your WordPress site will use a different template.
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
	<div class="content-wrapper">
		<div class="content">
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<?php if(!shortcode_exists( 'themehunk-customizer-header' ) ):
	          the_title('<h1 class="title overtext">','</h1>'); 
   			 endif; ?>
			<div class="page-description">
				<?php the_content(); ?>
			</div>
			<div class="multipage-links">
				<?php
					wp_link_pages( array(
								'before'      => '<span class="meta-nav">' . __( 'Pages:', 'shopline' ) . '</span>',
								'after'       => '',
								'link_before' => '<span class="active">',
								'link_after'  => '</span>',
					) );
				?>
			</div>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
			comments_template();
			}
			endwhile;
			endif;
			?>
		</div>
	</div>
	<?php if($layout != 'no-sidebar'){?>
	<?php get_sidebar(); ?>
	<?php   } ?>
</div>
<?php get_footer(); ?>