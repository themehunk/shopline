<?php
/**
 * Wordpress function Page
 */
if ( ! isset( $content_width ) ) {
  $content_width = 1170;
}
function shopline_theme_setup() {
load_theme_textdomain('shopline', get_parent_theme_file_path('/languages'));
// Add RSS feed links to <head> for posts and comments.
add_theme_support( 'automatic-feed-links' );

add_theme_support('post-thumbnails');
/* Set the image size by cropping the image */
add_image_size( 'shopline-blog', 452, 243, true );
add_image_size( 'shopline-recent-post', 90, 90, true );
add_image_size( 'shopline-custom-blog', 374, 280, true );
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
        //remove widegt block
        remove_theme_support( 'widgets-block-editor' );
    /*
    /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
    add_theme_support( 'title-tag' );
// custom-header image
$defaults = array(
    'default-image'          => get_template_directory_uri() . '/images/main.jpeg',
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
$args = array(
  'default-color' => 'ffffff',
);
add_theme_support( 'custom-background', $args );  
add_theme_support( 'custom-logo', array(
    'height'      => 95,
    'width'       => 450,
    'flex-height' => true,
  ) );
/* woocommerce support */
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );


// Recommend plugins
        add_theme_support( 'recommend-plugins', array(

            'themehunk-customizer' => array(
                'name' => esc_html__( 'Themehunk Customizer (Highly Recommended)', 'shopline' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),

            'th-advance-product-search' => array(
            'name' => esc_html__( 'TH Advance Product Search', 'shopline' ),
            'img' => 'icon-128x128.gif',
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ),
            'th-variation-swatches' => array(
                'name' => esc_html__( 'TH Variation Swatches', 'shopline' ),
                 'img' => 'icon-128x128.gif',
                'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
            ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'shopline' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'shopline' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
            ), 
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'shopline' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),

            'yith-woocommerce-wishlist' => array(
                 'name' => esc_html__( 'YITH WooCommerce Wishlist', 'shopline' ),
                  'img' => 'icon-128x128.jpg',
                 'active_filename' => 'yith-woocommerce-wishlist/init.php',
             ),

            'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'ThemeHunk Megamenu – Menu builder', 'shopline' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            ), 

            'crelly-slider' => array(
                 'name' => esc_html__( 'Crelly Slider', 'shopline' ),
                 'img' => 'icon-128x128.jpg',
                 'active_filename' => 'crelly-slider/crellyslider.php',
             ),
            

        ) );

        // Import Data Content plugins
        add_theme_support( 'import-demo-content', array(

             'themehunk-customizer' => array(
                'name' => esc_html__( 'Themehunk Customizer (Highly Recommended)', 'shopline' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
            ),

            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'shopline' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ), 
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'shopline' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),

        ));

        // Useful plugins
        add_theme_support( 'useful-plugins', array(
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'shopline' ),
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            ),
        ) );

}
add_action( 'after_setup_theme', 'shopline_theme_setup' );

/**
 * Query WooCommerce activation
 */
function shopline_is_woocommerce_activated() {
  return class_exists( 'woocommerce' ) ? true : false;
}

require_once get_parent_theme_file_path('/inc/include.php');


// google-font-call
function shopline_fonts_url() {
  $fonts_url = '';
  /*
  Translators: If there are characters in your language that are not
  * supported by Roboto or Roboto Slab, translate this to 'off'. Do not translate
  * into your own language.
   */
  $Catamaran = _x( 'on', 'Catamaran font: on or off', 'shopline' );
  $Catamaran_slab = _x( 'on', 'Catamaran Slab font: on or off', 'shopline' );

  if ( 'off' !== $Catamaran || 'off' !== $Catamaran_slab ) {
    $font_families = array();

    if ( 'off' !== $Catamaran ) {
      $font_families[] = 'Catamaran:300,400,500,700';
    }

    if ( 'off' !== $Catamaran_slab ) {
      $font_families[] = 'Catamaran Slab:400,700';
    }

    $query_args = array(
      'family' => urlencode( implode( '|', $font_families ) ),
      'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
  }
  return $fonts_url;
}
/**
 * Enqueue scripts and styles for the front end.
 *
 */
function shopline_scripts(){
$shopline_animation_disable = get_theme_mod('shopline_animation_disable');
// custom style enqueue
if($shopline_animation_disable =='' || $shopline_animation_disable =='0'):
wp_enqueue_style( 'animate', get_parent_theme_file_uri( '/css/animate.css'), array(), '1.0.0' );
endif;
wp_enqueue_style( 'shopline_fonts', shopline_fonts_url(), array(), '1.0.0' );
wp_enqueue_style( 'font-new-awesome', get_parent_theme_file_uri( '/font-awesome/css/fontawesome-all.css'), array(), '1.0.0' );
wp_enqueue_style( 'font-old-awesome', get_parent_theme_file_uri( '/font-awesome/css/font-awesome.css'), array(), '1.0.0' );
wp_enqueue_style( 'menu-css', get_parent_theme_file_uri( '/css/menu-css.css'), array(), '1.0.0' );
wp_enqueue_style( 'flexslider', get_parent_theme_file_uri( '/css/flexslider.css'), array(), '1.0.0' ); 
wp_enqueue_style( 'woo-popup', get_parent_theme_file_uri( '/css/woo-popup.css'), array(), '1.0.0' );
wp_enqueue_style( 'owl-carousel', get_parent_theme_file_uri( '/css/owl.carousel.css'), array(), '1.0.0' );
wp_enqueue_style( 'jquery-ui' );  
wp_enqueue_style('shopline-style', get_stylesheet_uri());
wp_add_inline_style( 'shopline-style', shopline_header());


// custom jquery enqueue
wp_enqueue_script( 'flexslider', get_parent_theme_file_uri( '/js/flexslider.js'), array( 'jquery' ), '', true );
 wp_enqueue_script( 'jquery-event-drag', get_parent_theme_file_uri( '/js/jquery.event.drag.js'), array( 'jquery' ), '', true );
    
    wp_enqueue_script( 'isotope-pkgd', get_parent_theme_file_uri( '/js/isotope.pkgd.js'), array( 'jquery' ), '', true );

    wp_enqueue_script( 'imagesloaded');

   wp_enqueue_script( 'jquery-easing', get_parent_theme_file_uri( '/js/jquery.easing.js'), array( 'jquery' ), '', true );

  wp_enqueue_script( 'owl-carousel', get_parent_theme_file_uri( '/js/owl.carousel.js'), array( 'jquery' ), '', true );

  wp_enqueue_script( 'modernizr-custom', get_parent_theme_file_uri( '/js/modernizr.custom.js'), array( 'jquery' ), '', true );

  wp_enqueue_script( 'classie', get_parent_theme_file_uri( '/js/classie.js'), array( 'jquery' ), '', true );
  
  wp_enqueue_script( 'masonry-pkgd', get_parent_theme_file_uri( '/js/masonry.pkgd.js'), array( 'jquery' ), '', true );

    wp_enqueue_script( 'parallax-js', get_parent_theme_file_uri( '/js/parallax.js'), array( 'jquery' ), '', true );

    wp_enqueue_script( 'aos', get_parent_theme_file_uri( '/js/aos.js'), array( 'jquery' ), '', true );
    wp_enqueue_script( 'shopline-custom', get_parent_theme_file_uri( '/js/custom.js'), array( 'jquery' ), '', true );

// Comment reply
   if (is_singular() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
   }
}
add_action( 'wp_enqueue_scripts', 'shopline_scripts' );

if ( ! function_exists( 'wp_body_open' ) ) {

  /**
   * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
   */
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}