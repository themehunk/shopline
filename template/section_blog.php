<?php 
$hide_section = get_theme_mod( 'blog_hide');
if($hide_section == ''|| $hide_section == '0' ){
	if( shortcode_exists( 'themehunk-customizer' ) ):
 do_shortcode('[themehunk-customizer section="blog"]');
endif; } ?>
  <!-- End latest post -->
  <div class="clearfix"></div>