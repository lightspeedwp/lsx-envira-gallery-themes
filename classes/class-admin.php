<?php
namespace lsx\envira_gallery\themes\classes;

/**
 * Admin Class.
 *
 * @package lsx-envira-gallery-themes
 */
class Admin {

	/**
	 * Holds class instance
	 *
	 * @since 1.0.0
	 *
	 * @var      object \lsx\envira_gallery\themes\classes\Admin()
	 */
	protected static $instance = null;

	/**
	 * Contructor
	 */
	public function __construct() {
		add_filter( 'envira_gallery_gallery_themes', array( $this, 'register_gallery_themes' ) );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return    object \lsx\envira_gallery\themes\classes\Admin()    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register Our New Themes.
	 *
	 * @param array $themes All registered Themes.
	 * @return array Return out array of themes.
	 */
	public function register_gallery_themes( $themes ) {
		// Add custom themes here.
		$themes[] = array(
			'value' => 'lsx-taggered-columns',
			'name'  => __( 'Staggered Columns', 'lsx-envira-gallery-themes' ),
			'file'  => __FILE__,
		);
		return $themes;
	}
}
