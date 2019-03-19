<?php
if ( ! function_exists( 'shopline_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function shopline_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;
/*
 * Custom header menu
*/
add_action( 'after_setup_theme', 'shopline_register_theme_menu' );
function shopline_register_theme_menu() {
  register_nav_menus( 
    array(
        'front-menu'    => __( 'FrontPage Menu', 'shopline' ),
        'main-menu'     => __( 'Main Menu', 'shopline' ),
        'footer-menu'     => __( 'Footer Menu', 'shopline' ),
    ) );
}
    function shopline_frontpage_nav_menu(){
        wp_nav_menu( array('theme_location' => 'front-menu', 
            'container'     => false, 
            'menu_class'    => 'menu', 
            'menu_id'       => 'menu',
            'fallback_cb'   => 'shopline_wp_page_menu'));
    }

    function shopline_main_nav_menu(){
        wp_nav_menu( array('theme_location' => 'main-menu', 
            'container'     => false, 
            'menu_class'    => 'menu', 
            'menu_id'       => 'menu',
            'fallback_cb'   => 'shopline_wp_page_menu'));
    }

    function shopline_footer_nav_menu(){
        wp_nav_menu( array('theme_location' => 'footer-menu', 
            'container'     => false, 
            'menu_class'    => 'footer-menu', 
            'menu_id'       => 'footer-menu',
            'fallback_cb'   => ''));
    }

 function shopline_wp_page_menu(){
    echo '<ul class="menu" id="menu">';
    wp_list_pages(array('title_li' => ''));
    echo '</ul>';
}


/**
 * Display navigation to next/previous post when applicable.
 *
 * @since ThemeHunk 1.0
 */

if ( ! function_exists( 'shopline_post_nav' ) ) :
function shopline_post_nav() {
    // Don't print empty markup if there's nowhere to navigate.
    ?>

    <nav class="navigation post-navigation" role="navigation">
        <div class="nav-links">
           <?php
              the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '%title', 'shopline' ) . '</span> ' ,
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '%title', 'shopline' )));
                //%title
            ?>
        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}
endif;

/**
 * custom post excerpt
 */
function shopline_get_custom_excerpt(){
$rdmore = get_theme_mod('read_more_txt','Read More');
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 80);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$return =  '<p>'.$excerpt.'</p><span class="read-more"><a href="'.esc_url(get_permalink()).'" >'.$rdmore.'</a></span>';
return $return;
}


//pagination
function shopline_pagination() {
     the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => '&larr;',
    'next_text' =>'&rarr;',
) ); 
}

function shopline_separator(){
    $return = '&nbsp;'.__('|','shopline').'&nbsp';
    return $return;
}
function shopline_page_thumb(){
return wp_get_attachment_url(get_post_thumbnail_id());
}
/*Number of comment*/
function shopline_comment_number(){
comments_popup_link(esc_html('0','shopline'), esc_html('1','shopline'), esc_html('%','shopline')); 
 }
 /*post-limit-blog-page*/
function shopline_custom_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'shopline_custom_excerpt_length', 999 );

function shopline_header(){
    $bg ="color:#".get_header_textcolor().";";
    $hb ="background:url(".get_header_image().");";
    $custom_css = ".page-head-image.default{{$hb}} h1.site-title a,p.site-description{ {$bg} }";
    return $custom_css;
}

// ----------------------------//
// Pages layout choose function
//-----------------------------//
if (!function_exists( 'shopline_layout' ) ) {
    function shopline_get_layout( $default = 'right' ) {
    $layout = get_theme_mod( 'shopline_layout', $default );
    return apply_filters( 'shopline_get_layout', $layout, $default );
    }
}

/*
 *   Mobile device detection
 */
if( !function_exists('shopline_mobile_user_agent_switch') ){
    function shopline_mobile_user_agent_switch(){
        $device = '';
        
        if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
            $device = "ipad";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
            $device = "iphone";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
            $device = "blackberry";
        } else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
            $device = "android";
        }

        if( $device ) {
            return $device; 
        }else{
            return false;
        }
    }
}
