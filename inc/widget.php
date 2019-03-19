<?php
function shopline_widgets_init() {
// Area , located below the Primary Widget Area in the sidebar. Empty by default.
register_sidebar(array(
'name' => __('Primary Sidebar', 'shopline'),
'id' => 'primary-sidebar',
'description' => __('Main sidebar that appears on the left.', 'shopline'),
'before_widget' => '<div class="sidebar-inner-widget">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));

// Area 1, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('First Footer Widget Area', 'shopline'),
'id' => 'first-footer-widget-area',
'description' => __('Appears in the first footer section of the site.', 'shopline'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle" >',
'after_title' => '</h4>',
));
// Area 2, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('Second Footer Widget Area', 'shopline'),
'id' => 'second-footer-widget-area',
'description' => __('Appears in the Second footer section of the site.', 'shopline'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle" >',
'after_title' => '</h4>',
));

// Area 3, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('Third Footer Widget Area', 'shopline'),
'id' => 'third-footer-widget-area',
'description' => __('Appears in the Third footer section of the site.', 'shopline'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));

// Area 4, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('Fourth Footer Widget Area', 'shopline'),
'id' => 'fourth-footer-widget-area',
'description' => __('Appears in the Fourth footer section of the site.', 'shopline'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));

// Area 4, located in the footer. Empty by default.
register_sidebar(array(
'name' => __('WooCommerce Sidebar', 'shopline'),
'id' => 'woocommerce-sidebar',
'description' => __('Add widgets to display at WooCommerce pages.', 'shopline'),
'before_widget' => '<div class="sidebar-inner-widget">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
));
}
/** Register sidebars by running shopline_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'shopline_widgets_init');
