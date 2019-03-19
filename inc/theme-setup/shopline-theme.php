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
add_action( 'admin_notices', 'shopline_admin_notice' );

function shopline_admin_notice() {
  global $current_user;
  $user_id   = $current_user->ID;
  $theme_data  = wp_get_theme();
  if ( !get_user_meta( $user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ) ) {
    ?>
    <div class="notice thunk-notice">

      <h1>
        <?php
        /* translators: %1$s: theme name, %2$s theme version */
        printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'shopline' ), esc_html( $theme_data->Name ), esc_html( $theme_data->Version ) );
        ?>
      </h1>
      <p>
        <?php
        /* translators: %1$s: theme name, %2$s link */
        printf( __( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'shopline' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=th_shopline' ) ) );
        printf( '<a href="%1$s" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>', '?' . esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore=0' );
        ?>
      </p>
      <p>
        <a href="<?php echo esc_url( admin_url( 'themes.php?page=th_shopline' ) ) ?>" class="button button-primary button-hero" style="text-decoration: none;">
          <?php
          /* translators: %s theme name */
          printf( esc_html__( 'Get started with %s', 'shopline' ), esc_html( $theme_data->Name ) )
          ?>
        </a>
      </p>
    </div>
    <?php
  }
}

add_action( 'admin_init', 'shopline_notice_ignore' );

function shopline_notice_ignore() {
  global $current_user;
  $theme_data  = wp_get_theme();
  $user_id   = $current_user->ID;
  /* If user clicks to ignore the notice, add that to their user meta */
  if ( isset( $_GET[ esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) && '0' == $_GET[ esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) {
    add_user_meta( $user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore', 'true', true );
  }
}


function customizer_disable_popup(){
      $value = intval(@$_POST['value']);
      update_option( "thunk_customizer_disable_popup", $value );
      die();
  }
add_action('wp_ajax_customizer_disable_popup', 'customizer_disable_popup');

/*
 *  online about us feature
 *
 */
function shopline_tab_config($theme_data){
    $config = array(
        'theme_brand' => __('ThemeHunk','shopline'),
        'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
        'welcome'=>sprintf(esc_html__('Welcome to Shopline - Version %1s', 'shopline'), $theme_data->get( 'Version' ) ),
        'welcome_desc' => esc_html__( 'Shopline is a full featured E-commerce WordPress theme build specially for WooCommerce. This theme has a clean, modern and selling oriented design which is suitable for creating any type of online store, fashion website and many more. Theme comes with one click setup, Section hide option, Section ordering (drag & drop functionality), which makes it more user-friendly.', 'shopline' ),
        'tab_one' =>esc_html__('Get Started with Shopline', 'shopline' ),
        'tab_two' =>esc_html__( 'Recommended Actions', 'shopline' ),
        'tab_three' =>esc_html__( 'Free VS Pro', 'shopline' ),
        'tab_four' =>esc_html__( 'Demo Import', 'shopline' ),

        'plugin_title' => esc_html__( 'Step 1 - Do recommended actions', 'shopline' ),
        'plugin_link' => '?page=th_shopline&tab=actions_required',
        'plugin_text' => sprintf(esc_html__('Firstly do all recommended actions it will help you set up your site easily.', 'shopline'), $theme_data->get( 'Name' )),
 'plugin_text1' => sprintf(esc_html__('Activate ThemeHunk Customizer plugin (It will enable lots of customizer option like hero header slider and activate all frontpage sections)
', 'shopline'), $theme_data->get( 'Name' )),

        'plugin_button' => esc_html__('Go To Recommended Action', 'shopline'),
        'docs_title' => esc_html__( 'Step 2 - Configure Homepage Layout', 'shopline' ),
        'video_link' => esc_url('//www.youtube.com/watch?v=pHCoxwYCZGQ'),
        'docs_button' => esc_html__('Configuration Instructions (with video)', 'shopline'),
		
		'customizer_title' => esc_html__( 'Step 2 - Home Page Setup', 'shopline' ),
        'customizer_text' =>  sprintf(esc_html__('%s Theme comes with one click home page setup. If you have installed all required plugins suggested in the "Recommended Actions" then click this button to set up home page.', 'shopline'), $theme_data->Name),
        'customizer_button' => sprintf( esc_html__('Start Customize', 'shopline')),

        'support_title' => esc_html__( 'Step 3 - Theme Support', 'shopline' ),
        'support_link' => esc_url('//www.themehunk.com/support/'),
        'support_forum' => sprintf(esc_html__('Support Forum', 'shopline'), $theme_data->get( 'Name' )),
        'doc_link' => esc_url('//www.themehunk.com/docs/shopline-theme/'),
        'doc_link_text' => sprintf(esc_html__('Theme Documentation', 'shopline'), $theme_data->get( 'Name' )),

        'support_text' => sprintf(esc_html__('If you need any help you can contact to our support team, our team is always ready to help you.', 'shopline'), $theme_data->get( 'Name' )),
        'support_button' => sprintf( esc_html__('Create a support ticket', 'shopline'), $theme_data->get( 'Name' )),
        );
    return $config;
}


if ( ! function_exists( 'shopline_admin_scripts' ) ) :
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
function shopline_admin_scripts( $hook ) {
          wp_enqueue_style( 'shopline-admin-css', get_template_directory_uri() . '/css/admin.css' );

        if ($hook === 'appearance_page_th_shopline'  ) {
            // Add recommend plugin css
            wp_enqueue_style( 'plugin-install' );
            wp_enqueue_script( 'plugin-install' );
            wp_enqueue_script( 'updates' );
            add_thickbox();
        }
    }
endif;
add_action( 'admin_enqueue_scripts', 'shopline_admin_scripts' );

function shopline_count_active_plugins() {
       $i = 5;
       if (shortcode_exists('themehunk-customizer-shopline')):
           $i--;
       endif;
        if(class_exists( 'woocommerce' )) :
           $i--;
       endif;
       if (shortcode_exists( 'lead-form' )):
           $i--;
       endif;
       if(shortcode_exists( 'yith_wcwl_add_to_wishlist' )) :
           $i--;
       endif;
       if(shortcode_exists( 'crellyslider' )) :
           $i--;
       endif;
       return $i;
}

function shopline_tab_count(){
   $count = '';
       $number_count = shopline_count_active_plugins();
           if( $number_count >0):
           $count = "<span class='update-plugins count-".esc_attr( $number_count )."' title='".esc_attr( $number_count )."'><span class='update-count'>" . number_format_i18n($number_count) . "</span></span>";
           endif;
           return $count;
}
/**
* Menu tab
    */
function shopline_tab() {
               $number_count = shopline_count_active_plugins();
               $menu_title = esc_html__('Get Started with Shopline', 'shopline');
           if( $number_count >0):
           $count = "<span class='update-plugins count-".esc_attr( $number_count )."' title='".esc_attr( $number_count )."'><span class='update-count'>" . number_format_i18n($number_count) . "</span></span>";
               $menu_title = sprintf( esc_html__('Get Started with Shopline %s', 'shopline'), $count );
           endif;


   add_theme_page( esc_html__( 'Shopline', 'shopline' ), $menu_title, 'edit_theme_options', 'th_shopline', 'shopline_tab_page');
}
add_action('admin_menu', 'shopline_tab');

// pro theme
function shopline_pro_theme(){ ?>
<div class="freeevspro-img">
<img src="<?php echo get_template_directory_uri(); ?>/inc/theme-setup/images/free-pro.png" alt="free vs pro" />
<p>
<a href="//themehunk.com/product/shopline-pro-multipurpose-shopping-theme/" target="_blank" class="button button-primary"><?php esc_html_e('Check Pro version for more features','shopline'); ?></a>
</p></div>
<?php }

// demo import
function shopline_demo_import(){ ?>

<div class="theme_demo">
  <h3><?php esc_html_e( 'Step 1', 'shopline' ); ?></h3>
  <p class="about"><?php esc_html_e( 'Before importing demo content please make confirm that you have installed (WooCommerce & ThemeHunk Customizer ) plugin. This will help importer to import complete demo data.', 'shopline' ); ?></p>
    <p>
    <a href="?page=th_shopline&amp;tab=actions_required" class="button button-secondary"><?php esc_html_e( 'Install Recommended Plugin', 'shopline' ); ?></a>
  </p>
</div>

<div class="theme_demo">
  <h3><?php esc_html_e( 'Step 2', 'shopline' ); ?></h3>
    <p class="about"><?php esc_html_e( 'Click "One Click Install" button, Install the  plugin and then go to the Appearance > Import Demo Data and click "Import Demo Data" button.', 'shopline' ); ?>
    </p>
    <p>
<?php if ( !class_exists('OCDI_Plugin') ) : ?>
<?php $odi_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=one-click-demo-import'), 'install-plugin_one-click-demo-import'); ?>
            <p>
              <a target="_blank" class="install-now button importer-install" href="<?php echo esc_url( $odi_url ); ?>"><?php esc_html_e( 'One Click Install', 'shopline' ); ?></a>
              <a style="display:none;" class="button button-primary button-large importer-button" href="<?php echo admin_url( 'themes.php?page=pt-one-click-demo-import.php' ); ?>"><?php esc_html_e( 'Go to the importer', 'shopline' ); ?></a>            
            </p>
            <?php else : ?>
              <p><?php esc_html_e( 'Plugin installed and active!', 'shopline' ); ?></p>
              <a class="button button-primary button-large" href="<?php echo admin_url( 'themes.php?page=pt-one-click-demo-import.php' ); ?>"><?php esc_html_e( 'Go to the automatic importer', 'shopline' ); ?></a>
            <?php endif;  ?>
   <img src="<?php echo get_template_directory_uri(); ?>/inc/theme-setup/images/demo-import.png" />
  </p>
</div>
<?php }


function shopline_tab_page() {
    $theme_data = wp_get_theme();
    $theme_config = shopline_tab_config($theme_data);


    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    }

    $actions_r = shopline_get_actions_required();
    $actions = $actions_r['actions'];

    $current_action_link =  admin_url( 'themes.php?page=th_shopline&tab=actions_required' );

    $recommend_plugins = get_theme_support( 'recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $recommend_plugins = $recommend_plugins[0];
    } else {
        $recommend_plugins[] = array();
    }
    ?>
    <div class="wrap about-wrap theme_info_wrapper">
        <h1><?php  echo $theme_config['welcome']; ?></h1>
        <div class="about-text"><?php echo $theme_config['welcome_desc']; ?></div>

        <a target="_blank" href="<?php echo $theme_config['theme_brand_url']; ?>/?wp=shopline" class="themehunkhemes-badge wp-badge"><span><?php echo $theme_config['theme_brand']; ?></span></a>
        <h2 class="nav-tab-wrapper">
            <a href="?page=th_shopline" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php  echo $theme_config['tab_one']; ?></a>
            <a href="?page=th_shopline&tab=actions_required" class="nav-tab<?php echo $tab == 'actions_required' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_two'];  echo shopline_tab_count();?></a>
            <a href="?page=th_shopline&tab=theme-pro" class="nav-tab<?php echo $tab == 'theme-pro' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_three']; ?></span></a>
            <a href="?page=th_shopline&tab=demo-import" class="nav-tab<?php echo $tab == 'demo-import' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_four']; ?></span></a>
        </h2>

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                    <div class="theme_link">
                            <h3><?php echo $theme_config['plugin_title']; ?></h3>
                            <p class="about"><?php echo $theme_config['plugin_text']; ?></p>
							<p class="about"><?php echo $theme_config['plugin_text1']; ?></p>
                            <p>
                                <a href="<?php echo esc_url($theme_config['plugin_link'] ); ?>" class="button button-secondary"><?php echo $theme_config['plugin_button']; ?></a>
                            </p>
                        </div>
						            <div class="theme_link">
                            <h3><?php echo $theme_config['customizer_title']; ?></h3>
                            <p class="about"><?php  echo $theme_config['customizer_text']; ?></p>
                            <p>
                            <?php 
                            $obj = New Shopline_Popup(); 
                              if(shopline_check_home_page()){
                            ?>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php echo $theme_config['customizer_button']; ?></a>
                                <?php 
                                  } else{

                                    ?>
                                    <a class="activate-now button-primary button-large flactvate"><?php _e('Activating homepage...','shopline'); ?></a><div class='loader'></div><strong class="flactvate-activating"> <?php _e('It may take few seconds...','shopline'); ?></strong>

                                    <?php
                                     echo $obj->active_plugin();
                                }
                              ?>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php echo $theme_config['support_title']; ?></h3>

                            <p class="about"><?php  echo $theme_config['support_text']; ?></p>
                            <p>
            <a target="_blank" href="<?php echo $theme_config['support_link']; ?>"><?php echo $theme_config['support_forum']; ?></a>
            </p>
            <p><a target="_blank" href="<?php echo $theme_config['doc_link']; ?>"><?php  echo $theme_config['doc_link_text']; ?></a></p>
                            <p>
                                <a href="<?php echo $theme_config['support_link']; ?>" target="_blank" class="button button-secondary"><?php echo $theme_config['support_button']; ?></a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ( $tab == 'actions_required' ) { ?>
            <div class="action-required-tab info-tab-content">

                <?php if ( is_child_theme() ){
                    $child_theme = wp_get_theme();
                    ?>
                    <form method="post" action="<?php echo esc_attr( $current_action_link ); ?>" class="demo-import-boxed copy-settings-form">
                        <p>
                           <strong> <?php printf( esc_html__(  'You\'re using %1$s theme, It\'s a child theme', 'shopline' ) ,  $child_theme->Name ); ?></strong>
                        </p>
                        <p><?php printf( esc_html__(  'Child theme uses it\'s own theme setting name, would you like to copy setting data from parent theme to this child theme?', 'shopline' ) ); ?></p>
                        <p>

                        <?php

                        $select = '<select name="copy_from">';
                        $select .= '<option value="">'.esc_html__( 'From Theme', 'shopline' ).'</option>';
                        $select .= '<option value="onelinelite">OnelineLite</option>';
                        $select .= '<option value="'.esc_attr( $child_theme->get_stylesheet() ).'">'.( $child_theme->Name ).'</option>';
                        $select .='</select>';

                        $select_2 = '<select name="copy_to">';
                        $select_2 .= '<option value="">'.esc_html__( 'To Theme', 'shopline' ).'</option>';
                        $select_2 .= '<option value="onelinelite">OnelineLite</option>';
                        $select_2 .= '<option value="'.esc_attr( $child_theme->get_stylesheet() ).'">'.( $child_theme->Name ).'</option>';
                        $select_2 .='</select>';

                        echo $select . ' to '. $select_2;

                        ?>
                        <input type="submit" class="button button-secondary" value="<?php esc_attr_e( 'Copy now', 'shopline' ); ?>">
                        </p>
                        <?php if ( isset( $_GET['copied'] ) && $_GET['copied'] == 1 ) { ?>
                            <p><?php esc_html_e( 'Your settings copied.', 'shopline' ); ?></p>
                        <?php } ?>
                    </form>

                <?php } ?>
      
                    <?php if ( isset($actions['recommend_plugins']) && $actions['recommend_plugins'] == 'active' ) {  ?>
                        <div id="plugin-filter" class="recommend-plugins action-required">
                        <h3><?php esc_html_e( 'Please do all recommend action', 'shopline' ); ?></h3>
                          <?php shopline_plugin_api(); ?>
                        </div>
                    <?php } ?>                            
            </div>
        <?php } ?>

        <?php if ( $tab == 'theme-pro' ) {
           shopline_pro_theme();
        } elseif ( $tab == 'demo-import' ) {

         shopline_demo_import();

             } ?>

    </div> <!-- END .theme_info -->
    <?php

}

 function shopline_plugin_api() {
        require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                        network_admin_url( 'plugin-install.php' );

        $recommend_plugins = get_theme_support( 'recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){

        foreach($recommend_plugins[0] as $slug=>$plugin){
            
            $plugin_info = plugins_api( 'plugin_information', array(
                    'slug' => $slug,
                    'fields' => array(
                        'downloaded'        => false,
                        'sections'          => true,
                        'homepage'          => true,
                        'added'             => false,
                        'compatibility'     => false,
                        'requires'          => false,
                        'downloadlink'      => false,
                        'icons'             => true,
                    )
                ) );
                //foreach($plugin_info as $plugin_info){
                    $plugin_name = $plugin_info->name;
                    $plugin_slug = $plugin_info->slug;
                    $version = $plugin_info->version;
                    $author = $plugin_info->author;
                    $download_link = $plugin_info->download_link;
                    $icons = (isset($plugin_info->icons['1x']))?$plugin_info->icons['1x']:$plugin_info->icons['default'];
            

            $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_slug );
            if($plugin_slug=='yith-woocommerce-wishlist'){
                $active_file_name = $plugin_slug . '/init.php';
           }elseif($plugin_slug=='crelly-slider'){
                $active_file_name = $plugin_slug . '/crellyslider.php';
           }else{
            $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
             }
            $button_class = 'install-now button';

            if ( ! is_plugin_active( $active_file_name ) ) {
                $button_txt = esc_html__( 'Install Now', 'shopline' );
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
                    $button_class = 'activate-now button-primary';
                    $button_txt = esc_html__( 'Active Now', 'shopline' );
                }


                    $detail_link = add_query_arg(
                    array(
                        'tab' => 'plugin-information',
                        'plugin' => $plugin_slug,
                        'TB_iframe' => 'true',
                        'width' => '772',
                        'height' => '349',

                    ),
                    network_admin_url( 'plugin-install.php' )
                );
				$detail = '';
                echo '<div class="rcp">';
                echo '<h4 class="rcp-name">';
                echo esc_html( $plugin_name );
                echo '</h4>';
                echo '<img src="'.$icons.'" />';
  if($plugin_slug=='themehunk-customizer'){
		$detail= esc_html__('ThemeHunk customizer - ThemeHunk customizer plugin will allow you to add  unlimited number of columns for services, Testimonial, and Team with widget support. It will add slider section, Ribbon section, latest post, Contact us and Woocommerce section. These will be visible on front page of your site.','shopline');
} elseif($plugin_slug=='woocommerce'){
$detail= esc_html__('WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully. Built to integrate seamlessly with WordPress, WooCommerce is the eCommerce solution that gives both store owners and developers complete control.','shopline');
} elseif($plugin_slug=='yith-woocommerce-wishlist'){
$detail= esc_html__('YITH WooCommerce Wishlist allows you to add Wishlist functionality to your e-commerce.','shopline');
} elseif($plugin_slug=='lead-form-builder'){
    $detail = esc_html__('Lead form builder is a contact form as well as lead generator plugin. This plugin will allow you create unlimited contact forms and to generate unlimited leads on your site.','shopline');
} elseif($plugin_slug=='crelly-slider'){
    $detail = esc_html__('Crelly Slider is a Free / Open Source responsive WordPress slider that supports layers. You can add Texts, Images, YouTube/Vimeo videos using a powerful Drag & Drop Builder and animate each of them.','shopline');
} elseif($plugin_slug=='one-click-demo-import'){
    $detail = esc_html__('The best feature of this plugin is, that theme authors can define import files in their themes and so all you (the user of the theme) have to do is click on the "Import Demo Data" button.','shopline');
} 
echo '<p class="rcp-detail">'.$detail.' </p>';
                echo '<p class="action-btn plugin-card-'.esc_attr( $plugin_slug ).'">
                        <span>Version:'.$version.'</span>
                        '.$author.'
                <a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_slug ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a>
                </p>';
                echo '<a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details', 'shopline' ).'</a>';
                echo '</div>';
            }
        }
    }
}
function shopline_get_actions_required( ){
    $actions = array();
    $recommend_plugins = get_theme_support( 'recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $recommend_plugins = $recommend_plugins[0];
    } else {
        $recommend_plugins[] = array();
    }
    if ( ! empty( $recommend_plugins ) ) {

        foreach ( $recommend_plugins as $plugin_slug => $plugin_info ){
            $plugin_info = wp_parse_args( $plugin_info, array(
                'name' => '',
                'active_filename' => '',
            ) );
            if( $plugin_info['active_filename'] ){
                $active_file_name = $plugin_info['active_filename'] ;
            }else{
                if($plugin_slug=='yith-woocommerce-wishlist'){
                $active_file_name = $plugin_slug . '/init.php';
                }else{
                $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
               }
            }
            if ( ! is_plugin_active( $active_file_name ) ) {
                $actions['recommend_plugins'] = 'active';
            }
        }

    }

    $actions = apply_filters( 'shopline_get_actions_required', $actions );

    $return = array(
        'actions' => $actions,
        'number_actions' => count( $actions ),
    );

    return $return;
}