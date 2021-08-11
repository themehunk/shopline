<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
  </head>
  <body id="shopmain" <?php body_class('index woocommerce'); ?> >
    <?php wp_body_open();?> 
    <div class="overlayloader">
      <div class="pre-loader">&nbsp;</div>
    </div>
    
    <?php
    if(get_theme_mod('shopline_sticky_header_disable')=='1'){
      $headr_static_cls = 'header-static';
      }else{
      $headr_static_cls = ''; 
      }
    if(get_theme_mod('hdr_bg_trnsparent_active')=='1'){
      $hdr_trnsprnt ='hdr-transparent';
    }else{
      $hdr_trnsprnt ='';
    }
    if(get_theme_mod('hdr_intrnl_trnsparent_active')=='1'){
      if ( is_page_template( 'home-template.php' ) ){
       $hdr_intrl_trnsprnt ='';
      }else{
       $hdr_intrl_trnsprnt ='hdr-intrnl-transparent';
      }

    }else{
      $hdr_intrl_trnsprnt ='';
    }
    if (get_theme_mod('hdr_toggle_active')==''){
      $header_hide ='';
    }else{
      $header_hide ='header-hide';
    }
    if(get_theme_mod('last_menu_btn')=='1'){
      $last_btn ='last-btn';
    }else{
      $last_btn ='';
    }
    ?>
    <header class="<?php echo esc_attr($headr_static_cls);?> <?php echo esc_attr($hdr_trnsprnt); ?> <?php echo $hdr_intrl_trnsprnt;?> <?php echo esc_attr($header_hide); ?> <?php echo esc_attr($last_btn); ?>">
      <div class="header-wrapper">
        <div class="container">
          <div class="title-desc">
            <!-- logog and title -->
            <div class="logo"> <?php shopline_custom_logo(); ?></div>
            <?php
            if(get_theme_mod('header_textcolor')!='blank'){
            if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php endif;
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; } ?>
          </div>
          <!-- Start Mega-Menu       -->
          <div id="main-menu-wrapper" class="menu-wrapper">
            <a href="#" id="pull" class="toggle-mobile-menu"></a>
            <nav class="navigation  mobile-menu-wrapper">
              <?php if ( is_page_template( 'home-template.php' ) ) :
                shopline_frontpage_nav_menu();
              else:
                shopline_main_nav_menu();
              endif; ?>
            </nav>
          </div>
          <!-- End-Menu -->
          <div class="header-extra">
            <ul class="hdr-icon-list">
              <?php if( shortcode_exists( 'themehunk-customizer' ) ): ?>
              <?php do_shortcode('[themehunk-customizer section="cart_menu"]'); ?>
              <?php endif; ?>
            </div>
            
          </div>
        </div>
      </header>
      
      <div class="clearfix"></div>