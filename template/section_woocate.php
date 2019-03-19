
<?php 
$hide_section = get_theme_mod( 'woo_cate_section_hide');
if($hide_section == ''|| $hide_section == '0' ){
if( shortcode_exists( 'themehunk-customizer' ) ):
 do_shortcode('[themehunk-customizer section="woocate"]');
endif; 
}
?>