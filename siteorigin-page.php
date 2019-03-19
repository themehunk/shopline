<?php
/**
* Template Name:Page Builder Template
*/
get_header();
?>
<div id="page-builder" class="clearfix">
	<div class="content">
		<?php if (have_posts()) : while (have_posts()) : the_post();
		the_content();
		endwhile;
		endif;
		?>
	</div>
</div>
<?php get_footer();