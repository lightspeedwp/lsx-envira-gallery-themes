<?php
namespace lsx\envira_gallery\themes\classes;

/**
 * LSX Health Plan Frontend Class.
 *
 * @package lsx-envira-gallery-themes
 */
class Frontend {

	/**
	 * Holds class instance
	 *
	 * @since 1.0.0
	 *
	 * @var      object \lsx\envira_gallery\themes\classes\Frontend()
	 */
	protected static $instance = null;

	/**
	 * Contructor
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ), 5 );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return    object \lsx\envira_gallery\themes\classes\Frontend()    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Registers the plugin frontend assets
	 *
	 * @return void
	 */
	public function assets() {
		/*wp_enqueue_style( 'lsx-envira-gallery-themes', LSX_EGT_URL . 'assets/css/lsx-envira-gallery-themes.css', array(), LSX_EGT_VER );
		wp_style_add_data( 'lsx-envira-gallery-themes', 'rtl', 'replace' );
		wp_enqueue_script( 'lsx-envira-gallery-themes-scripts', LSX_EGT_URL . 'assets/js/src/lsx-envira-gallery-themes.js', array( 'jquery' ) );*/
	}
}
