<?php
function shopline_admin_assets(){
wp_enqueue_script( 'shopline_customizer_admin', get_template_directory_uri() . '/inc/theme-setup/admin.js', array("jquery"), '', true  );
  wp_enqueue_style('shopline_customizer_admin', get_template_directory_uri() . '/inc/theme-setup/customizer-popup-styles.css');

}
add_action('admin_enqueue_scripts', 'shopline_admin_assets');

class Shopline_Popup{
function  __construct(){
             if (shortcode_exists('themehunk-customizer-header')!=true):
                $this->active();
            endif;
    }
function active(){
    if(!get_option( "thunk_customizer_disable_popup")):
    add_action('customize_controls_print_styles', array($this,'popup_styles'));
    add_action( 'customize_controls_enqueue_scripts', array($this,'popup_scripts'));
    endif;
  }
function active_plugin(){
        $plugin_slug = 'themehunk-customizer';
        $active_file_name =  $plugin_slug.'/'.$plugin_slug.'.php';
        $button_class = 'install-now button button-primary button-large';

                $button_txt = esc_html__( 'Install Plugin & Setup Homepage', 'shopline' );
                $status     = is_dir( WP_PLUGIN_DIR . '/'.$plugin_slug );

                if ( ! $status ) {
                    $install_url = wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'install-plugin',
                                'plugin' => $plugin_slug
                            ),
                            network_admin_url( 'update.php' )
                        ),
                        'install-plugin_'.$plugin_slug
                    );

                } else {
                    $install_url = add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode( $active_file_name ),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
                    ), network_admin_url('plugins.php'));
                    $button_class = 'activate-now button-primary button-large';
                    $button_txt = esc_html__( 'Setup Homepage', 'shopline' );
                }

        $url = esc_url($install_url);
    return "<a href='javascript:void' onclick=\"shopline_install('{$url}'); return false;\"  data-slug='".esc_attr($plugin_slug)."' class='".esc_attr( $button_class )."'>{$button_txt}</a>";

}

function popup_styles() {
    wp_enqueue_style('shopline_customizer_popup', get_template_directory_uri() . '/inc/theme-setup/customizer-popup-styles.css');
}

function popup_scripts() {
    wp_enqueue_script( 'shopline_customizer_popup', get_template_directory_uri() . '/inc/theme-setup/customizer-popup.js', array("jquery"), '', true  );
  }
}
// home page setup 

function active_plugin(){
       $plugin_slug = 'themehunk-customizer';
            $active_file_name =  $plugin_slug.'/'.$plugin_slug.'.php';
            $button_class = 'install-now button button-primary button-large';
      $install_url = add_query_arg(array(
                            'action' => 'activate',
                            'plugin' => rawurlencode( $active_file_name ),
                            'plugin_status' => 'all',
                            'paged' => '1',
                            '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
                        ), network_admin_url('plugins.php'));
                        $button_class = 'activate-now button-primary button-large';
                        $button_txt = esc_html__( 'Setup Homepage', 'shopline' );
    if ( is_plugin_active( $active_file_name ) ) {
      echo false;
    }else{
      echo $install_url;

} 
        
} 

add_action( 'wp_ajax_shopline_default_home', 'shopline_default_home' );
function shopline_default_home() {

 $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'home-template.php'
    ));
    $post_id = isset($pages[0]->ID)?$pages[0]->ID:false;



if(empty($pages)){
      $post_id = wp_insert_post(array (
       'post_type'    => 'page',
       'post_title'   => __('Home','shopline'),
       'post_content' => '',
       'post_name'    => 'home',
       'post_status'  => 'publish',
       'comment_status' => 'closed',   // if you prefer
       'ping_status'   => 'closed',      // if you prefer
       'page_template' =>'home-template.php', //Sets the template for the page.
    ));
  }
      if($post_id){
        update_option( 'page_on_front', $post_id );
        update_option( 'show_on_front', 'page' );
    }
 active_plugin();
    wp_die(); // this is required to terminate immediately and return a proper response
}


function shopline_check_home_page(){
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'home-template.php'
    ));
    $post_id = isset($pages[0]->ID)?$pages[0]->ID:false;
    $front = get_option( 'page_on_front');
    $true = false;
    if($post_id==$front && $front>0){
      $true = true;
    }

    return $true;
} 


/**
 * Add admin notice when active theme, just show one time
 *
 * @return bool|null
 */


function customizer_disable_popup(){
      $value = intval(@$_POST['value']);
      update_option( "thunk_customizer_disable_popup", $value );
      die();
  }
add_action('wp_ajax_customizer_disable_popup', 'customizer_disable_popup');
