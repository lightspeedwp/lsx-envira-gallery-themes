<?php
namespace lsx\envira_gallery\themes\classes;

/**
 * Frontend Class.
 *
 * @package lsx-envira-gallery-themes
 */
class Frontend {

	/**
	 * Holds class instance
	 *
	 * @var object \lsx\envira_gallery\themes\classes\Frontend()
	 */
	protected static $instance = null;

	/**
	 * Holds them array of available themes
	 *
	 * @var array
	 */
	public $themes = array();

	/**
	 * Holds the slug of the currently selectec theme.
	 *
	 * @var array
	 */
	public $theme = '';

	/**
	 * Contructor
	 */
	public function __construct() {
		// add_action( 'wp_enqueue_scripts', array( $this, 'assets' ), 5 );
		add_action( 'init', array( $this, 'init' ), 10 );
		add_filter( 'envira_images_pre_data', array( $this, 'check_gallery_theme' ), 10, 2 );
		// add_filter( 'envira_gallery_output_item_data', array( $this, 'gallery_output_item_data' ), 10, 5 );
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
	 * Runs after the WP query, but before wp_head
	 *
	 * @return void
	 */
	public function init() {
		$this->themes = \lsx\envira_gallery\themes\functions\get_themes();
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

	/**
	 * Checks the theme to see if one of ours has been selected.
	 *
	 * @param array $data
	 * @param string $gallery_id
	 * @return void
	 */
	public function check_gallery_theme ( $data, $gallery_id ) {
		if ( isset( $data['config'] ) && isset( $data['config']['gallery_theme'] ) && '' !== $data['config']['gallery_theme'] && array_key_exists( $data['config']['gallery_theme'], $this->themes ) ) {
			$this->current_theme = $data['config']['gallery_theme'];
		}

		return $data;
	}
	public function gallery_output_item_data ( $item, $id, $data, $i ) {
		print_r( '<pre>' );
		print_r( $item );
		print_r( $id );
		print_r( $data );
		print_r( $i );
		print_r( '</pre>' );
		return $item;
	}
}
