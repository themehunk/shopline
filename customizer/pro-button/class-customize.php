<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Shopline_Button_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require get_parent_theme_file_path( 'customizer/pro-button/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Shopline_Button_Customize_Section' );

		$manager->add_section(
			new Shopline_Button_Customize_Section(
				$manager,
				'Docs_button',
				array(
					'title'    => esc_html__( 'Shopline Pro Theme', 'shopline' ),
					'pro_text' => esc_html__( 'Buy Pro','shopline' ),
					'pro_url'  => esc_url('//themehunk.com/product/shopline-free-shopping-theme/'),
					'priority' => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'Shopline-customize-controls', trailingslashit( get_parent_theme_file_uri() ) . 'customizer/pro-button/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'Shopline-customize-controls', trailingslashit( get_parent_theme_file_uri() ) . 'customizer/pro-button/customize-controls.css' );
	}
}

// Doing this customizer thang!
Shopline_Button_Customize::get_instance();
