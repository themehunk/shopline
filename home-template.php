<?php
/* Template Name: Home Page Template */
get_header();

if( shortcode_exists( 'themehunk-customizer' ) ):

	$section = array('section_slider','section_woocate','section_services','section_ribbon','section_wooproduct','section_wooproduct1','section_testimonial', 'section_aboutus','section_blog','section_adsecond');
	foreach(get_theme_mod('section_sorting',$section) as $value):
		$new_str = str_replace('section_','',$value);
		if(!shopline_checkbox_filter($new_str,'')):
				get_template_part( 'template/'.$value);
		endif;
	endforeach;
endif;
get_footer();