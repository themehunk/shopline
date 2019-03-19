<?php
get_header();
if( shortcode_exists( 'themehunk-customizer-header' ) ){
  do_shortcode('[themehunk-customizer-header header="top"]');
} else { ?>
<div class="page-head parallax image">
  <div class="page-head-image default">
  </div>
</div>
<?php }
$layout = shopline_get_layout(); ?>
<div id="page" class="clearfix <?php  echo esc_attr($layout); ?>">
  <div class="content-wrapper">
    <div class="breadcrumb">
  <?php shopline_breadcrumb(); ?>
    </div>
    <div class="content">
      <?php if (have_posts()) : ?>
        <?php if(!shortcode_exists( 'themehunk-customizer-header' ) ):
                 the_title('<h1 class="title overtext">','</h1>'); 
            endif; ?>
      <ul class="blog-content">
        <?php get_template_part('loop', 'blog'); ?>
      </ul>
      <?php
      else :
      get_template_part( 'content', 'none' );
      endif;
      ?>
    </div>
  </div>
  <?php if ( $layout != 'no-sidebar' ) { ?>
  <?php get_sidebar(); ?>
  <?php   } ?>
</div>
<?php get_footer(); ?>