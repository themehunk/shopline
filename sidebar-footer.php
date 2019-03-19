<?php
/**
* The template for displaying the sidebar footer
*
* @package ThemeHunk
* @subpackage Featured
* @since Featured 1.0
*/
?>
<?php
if ( ! is_active_sidebar( 'first-footer-widget-area'  )
&& ! is_active_sidebar( 'second-footer-widget-area' )
&& ! is_active_sidebar( 'third-footer-widget-area'  )
&& ! is_active_sidebar( 'fourth-footer-widget-area' )
){  ?>
<?php  return; } ?>
<ul class="footer-widget-column" <?php echo esc_attr(get_theme_mod('footer_layout','footer-widget-4column-active')); ?> >
  <li class="widget">
    <?php
    if ( is_active_sidebar( 'first-footer-widget-area' ) ){
    dynamic_sidebar( 'first-footer-widget-area' );
    }
    ?>
  </li>
  <li class="widget">
    <?php
    if ( is_active_sidebar( 'second-footer-widget-area' ) ){
    dynamic_sidebar( 'second-footer-widget-area' );
    }
    ?>
  </li>
  <li class="widget">
    <?php
    if ( is_active_sidebar( 'third-footer-widget-area' ) ){
    dynamic_sidebar( 'third-footer-widget-area' );
    }
    ?>
  </li>
  <li class="widget">
    <?php
    if ( is_active_sidebar( 'fourth-footer-widget-area' ) ){
    dynamic_sidebar( 'fourth-footer-widget-area' );
    }
    ?>
  </li>
  <?php if(get_theme_mod('footer_layout','footer-widget-4column-active')=='footer-widget-4column-active'): ?>
  
  <?php endif; ?>
</ul>