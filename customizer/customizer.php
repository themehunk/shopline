<?php
//  = Default Theme Customizer Settings  =
function shopline_customize_register( $wp_customize ) {
	 $obj = New Shopline_Popup();

class shopline_Control extends WP_Customize_Control{
    public function render_content() {
        switch ( $this->type ) {
            default:

            case 'heading':
                echo '<span class="customize-control-title">' . $this->title . '</span>';
                break;

            case 'custom_message' :
                echo '<p class="description">' . $this->description . '</p>';
                break;

            case 'hr' :
                echo '<hr />';
                break;
        }
    }
}

// Home Page Settings
 $wp_customize->add_section('section_default_home', array(
        'title'    => __('One click Homepage Setup', 'shopline'),
        'priority' => 1,
    ));
   $wp_customize->add_setting('default_home', array(
        'sanitize_callback' => 'shopline_sanitize_text',
    ));
   $wp_customize->add_control( new shopline_Control( $wp_customize, 'default_home',
            array(
        'section'  => 'section_default_home',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Click button to set theme default home page. You can modify this page from customize panel. Check this doc : <a target="_blank" href="//themehunk.com/docs/shopline-theme/"> View Documentation</a>. <a class="activate-now button-primary button-large flactvate">Activating homepage...</a><div class="loader"></div><strong class="flactvate-activating">It may take few seconds...</strong>','shopline' ).$obj->active_plugin()
    )));

//  Genral Settings 
$wp_customize->get_section('title_tagline')->title = esc_html__('General Settings', 'shopline');
$wp_customize->get_section('title_tagline')->priority = 3;

}
add_action('customize_register','shopline_customize_register');
?>