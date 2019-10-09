<?php
/**
 * Functions.
 *
 * @package lsx-envira-gallery-themes
 */

namespace lsx\envira_gallery\themes\functions;

/**
 * Returns an array of the supported gallery themes
 *
 * @return array
 */
function get_themes() {
	$themes = array(
		'lsx-staggered-columns' => __( 'Staggered Columns', 'lsx-envira-gallery-themes' ),
	);
	return $themes;
}
