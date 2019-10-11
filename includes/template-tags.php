<?php
/**
 * Tempalte_tags.
 *
 * @package lsx-envira-gallery-themes
 */

/**
 * Returns an array of the supported gallery themes
 *
 * @return array
 */
/**
 * Envirabox Legecy Template function.
 *
 * @since 1.8.0
 *
 * @access public
 * @param mixed $data Gallery data.
 * @return string
 */
function lsx_egt_envirabox_large_template( $data ) {

	// Build out the lightbox template.
	$envirabox_wrap_css_classes = apply_filters( 'envirabox_wrap_css_classes', 'envirabox-wrap', $data );

	$envirabox_theme = apply_filters( 'envirabox_theme', 'envirabox-theme-' . envira_get_config( 'lightbox_theme', $data ), $data );

	$template = '<div id="envirabox-' . $data['id'] . '" data-envirabox-id="' . $data['id'] . '" class="envirabox-container ' . $envirabox_theme . ' ' . $envirabox_wrap_css_classes . '" role="dialog" tabindex="-1">';

		$template .= '<div class="envirabox-bg"></div>';
		$template .= '<div class="envirabox-outer"><div class="envirabox-inner">';

			$template = apply_filters( 'envirabox_inner_above', $template, $data );

	if ( envira_get_config( 'toolbar', $data ) && envira_get_config( 'toolbar_position', $data ) === 'top' ) {
		$template .= envira_get_toolbar_template( $data );
	}

	if ( envira_get_config( 'arrows', $data ) && envira_get_config( 'arrows_position', $data ) !== 'inside' ) {

		$template     .= '<div class="envirabox-navigation">';
			$template .= '<a data-envirabox-prev title="' . __( 'Prev', 'envira-gallery' ) . '" class="envirabox-arrow envirabox-arrow--left envirabox-nav envirabox-prev" href="#"><span></span></a>';
			$template .= '<a data-envirabox-next title="' . __( 'Next', 'envira-gallery' ) . '" class="envirabox-arrow envirabox-arrow--right envirabox-nav envirabox-next" href="#"><span></span></a>';
		$template     .= '</div>';

	}

			// Top Left box.
			$template .= '<div class="envirabox-position-overlay envira-gallery-top-left">';
			$template  = apply_filters( 'envirabox_output_dynamic_position', $template, $data, 'top-left' );
			$template .= '</div>';

			// Top Right box.
			$template .= '<div class="envirabox-position-overlay envira-gallery-top-right">';
			$template  = apply_filters( 'envirabox_output_dynamic_position', $template, $data, 'top-right' );
			$template .= '</div>';

			// Bottom Left box.
			$template .= '<div class="envirabox-position-overlay envira-gallery-bottom-left">';
			$template  = apply_filters( 'envirabox_output_dynamic_position', $template, $data, 'bottom-left' );
			$template .= '</div>';

			// Bottom Right box.
			$template .= '<div class="envirabox-position-overlay envira-gallery-bottom-right">';
			$template  = apply_filters( 'envirabox_output_dynamic_position', $template, $data, 'bottom-right' );
			$template .= '</div>';

			$template .= '<div class="envirabox-stage"></div>';

	if ( envira_get_config( 'toolbar', $data ) && envira_get_config( 'toolbar_position', $data ) === 'bottom' ) {
		$template .= envira_get_toolbar_template( $data );
	}

			$template = apply_filters( 'envirabox_inner_below', $template, $data );

			$template .= '</div></div></div>';

	return str_replace( "\n", '', $template );

}
