
<?php
$shopline_front_page_set = get_theme_mod('shopline_front_page_set','slide');
if($shopline_front_page_set=='slide'){
$_content_front_align_set  = get_theme_mod('sldr_content_front_align_set','txt-center');
}else{
$_content_front_align_set  = get_theme_mod('_content_front_align_set','txt-center');
}
?> 
<!-- normal slider -->
<div class="hero-wrap <?php echo esc_attr($shopline_front_page_set); ?>  <?php echo esc_attr( $_content_front_align_set); ?>">
    <?php if( shortcode_exists( 'themehunk-customizer' ) ): ?>
    <?php do_shortcode('[themehunk-customizer section="slider"]'); ?>
    <?php endif; ?>
  </div>
</div>
</div>