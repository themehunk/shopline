<?php
/*
The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*/
get_header();
if( shortcode_exists( 'themehunk-customizer-header' ) ){
  do_shortcode('[themehunk-customizer-header header="top" type="home"]');
} else { ?>
<div class="page-head parallax image">
  <div class="page-head-image default">
  </div>
</div>
<?php }
$layout = shopline_get_layout();?>
<div id="page" class="clearfix <?php echo esc_attr($layout); ?>">
  <div class="content-wrapper">
    <!-- Content Start -->
    <div class="content">
      <div class="page-block">
        <ul class="blog-content">
          <?php get_template_part('loop', 'blog'); ?>
        </ul>
      </div>
    </div>
  </div>
  <?php if ($layout != 'no-sidebar'){ ?>
  <?php get_sidebar(); ?>
  <?php   } ?>
</div>
<?php get_footer(); ?>