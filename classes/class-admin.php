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
		//add_filter( 'envira_gallery_lightbox_themes', array( $this, 'register_envirabox_themes' ) );
		add_action( 'envira_gallery_config_box', array( $this, 'enable_see_more_metabox' ), 10, 1 );
		add_filter( 'envira_gallery_save_settings', array( $this, 'save_meta_boxes' ), 10, 3 );
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
			'value' => 'lsx-staggered-columns',
			'name'  => __( 'Staggered Columns', 'lsx-envira-gallery-themes' ),
			'file'  => LSX_EGT_PATH,
		);
		return $themes;
	}

	/**
	 * Register Our New Envira Box Themes.
	 *
	 * @since 1.3.0
	 *
	 * @param array $themes All registered Themes.
	 * @return array
	 */
	public function register_envirabox_themes( $themes ) {
		$themes[] = array(
			'value'  => 'large',
			'name'   => __( 'Large', 'lsx-envira-gallery-themes' ),
			'file'   => __FILE__,
			'config' => array(
				'arrows'        => 'true',
				'margins'       => array( 220, 0 ),  // top/bottom, left/right.
				'gutter'        => '50',
				'base_template' => 'lsx_egt_envirabox_large_template',
			),
		);
		return $themes;
	}

	public function enable_see_more_metabox( $post ) {
		$gallery_data = get_post_meta( $post->ID, '_eg_gallery_data', true );
		?>
		<!-- see more -->
		<tr id="envira-config-see-more-box">
			<th scope="row">
				<label for="envira-config-see-more"><?php esc_html_e( 'Enable See More?', 'lsx-envira-gallery-themes' ); ?></label>
			</th>
			<td>
				<input id="envira-config-see-more" type="checkbox" name="_envira_gallery[see-more]" value="1" <?php checked( envira_get_config( 'see-more', $gallery_data, envira_get_config_default( 'see-more' ) ), 1 ); ?> />
				<span class="description"><?php esc_html_e( 'Hides all images after item 5, and adds a see more hover effect on the last item.', 'envira-gallery' ); ?></span>
			</td>
		</tr>
		<?php
	}

	public function save_meta_boxes( $settings, $post_id, $post ) {

		// Bail out if we fail a security check.
		if ( ! isset( $_POST['envira-gallery'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['envira-gallery'] ) ), 'envira-gallery' ) || ! isset( $_POST['_envira_gallery'] ) ) {
			$settings;
		}

		if ( isset( $_POST['_envira_gallery']['see-more'] ) && ''!== $_POST['_envira_gallery']['see-more'] ) {
			$settings['config']['see-more'] = $_POST['_envira_gallery']['see-more'];
		} else {
			$settings['config']['see-more'] = '';
		}

		return $settings;
	}
}
