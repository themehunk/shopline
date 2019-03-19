<?php 
$hide_section = get_theme_mod( 'three_column_hide');
if($hide_section == ''|| $hide_section == '0' ){?>
<div class="hot-wrapper">
<?php 
$svg_class = '';
$svgbg = shopline_svg_enable('ad_options','ad_svg_style','three_column_ads_bg_color'); 
 if($svgbg!=''){
          echo $svgbg;
          $svg_class = 'svg_enable';
    }
 ?> 
<div id="hot_sell_section" class="hot-sell <?php echo esc_attr($svg_class);?>">
	<div class="container">
		<div class="hot-sell-block" data-aos="fade-up">
			<?php if( shortcode_exists( 'themehunk-customizer' ) ): ?>
			<?php do_shortcode('[themehunk-customizer section="adsecond"]'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>
<div class="clearfix"></div>
<?php } ?>