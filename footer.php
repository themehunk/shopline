<?php
/**
* The template for displaying the footer
*
* @package ThemeHunk
* @subpackage Shopline
*/
?>
<div class="clearfix"></div>
<div class="footer-wrapper">
  <?php
  if( shortcode_exists( 'themehunk-customizer-header' ) ):
  do_shortcode('[themehunk-customizer-header header="footer"]');
  else: ?>
    <footer id="footer-wrp" class="footer-wrp">
    <?php
    endif;
    ?>
      <div class="container">
        <div class="footer-menu-wrp">
          <?php if (function_exists( 'shopline_footer_nav_menu' ) ) {
                shopline_footer_nav_menu();
          }?>
        </div>
        <div class="footer-menu-wrp-right">
          <?php if(get_theme_mod('copyright_upload')!==''){?>
          <ul>
            <li><a href="#">
              <img src="<?php echo esc_url( get_theme_mod('copyright_upload')); ?>">
            </a></li>
          </ul>
          <?php } ?>
        </div>
        <div class="footer-widget woocommerce">
          <?php
          /* A sidebar in the footer? Yep. You can can customize
          * your footer with four columns of widgets.
          */
          get_sidebar('footer');
          ?>
        </div>
        <div class="footer-bottom">
          <div class="footer-bottom-left" >
            <div class="copy-right">   
        <span class="text-footer">
        <?php bloginfo('name'); ?> | 
                 <?php
                 /* translators: %s: WordPress. */
                  printf( __( 'Powered by %s.', 'shopline' ), 'WordPress' );
                 ?>
                 </span>
            <a href="<?php echo esc_url( __( 'https://themehunk.com/product/shopline-free-shopping-theme/', 'shopline' ) ); ?>" target="_blank">
               <?php printf( __( 'Designed by %s', 'shopline' ), 'Themehunk' ); ?>
                    </a> 
      
         
        </div>
          </div>
          <div class="footer-bottom-right">
            <?php
            $fb = get_theme_mod('social_link_facebook','');
            $tw = get_theme_mod('social_link_twitter','');
            $go = get_theme_mod('social_link_youtube','');
            $ln = get_theme_mod('social_link_linkedin','');
            $pntr = get_theme_mod('social_link_pintrest','');
            if($fb !='' || $go !='' || $ln !='' || $pntr !=''|| $tw !=''):
            ?>
            <ul class="footer-social-icon">
              
              <li><p><?php esc_html_e('FOLLOW US','shopline'); ?></p></li>
              <?php if($fb!='') {?>
              <li class="ft-fb"><a href="<?php echo esc_url($fb); ?>"><i class="fab fa-facebook-f"></i></a></li>
              <?php } ?>
              <?php if($tw!='') {?>
              <li class="ft-tw"><a href="<?php echo esc_url($tw); ?>"><i class="fab fa-twitter"></i></a></li>
              <?php } ?>
              <?php if($go!='') {?>
              <li class="ft-gm"><a href="<?php echo esc_url($go); ?>"><i class="fab fa-youtube"></i></a></li>
              <?php } ?>
              <?php if($ln!='') {?>
              <li class="ft-ln"><a href="<?php echo esc_url($ln); ?>"><i class="fab fa-linkedin-in"></i></a></li>
              <?php } ?>
              <?php if($pntr!='') {?>
              <li class="ft-ptx"><a href="<?php echo esc_url($pntr); ?>"><i class="fab fa-pinterest-p"></i></a></li>
              <?php } ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>