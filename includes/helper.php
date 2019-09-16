<?php
/**
 * Helper functions
 *
 * @package Advanced_Addons
 */
defined( 'ABSPATH' ) || die();

function advanced_elementor_template() {
    $templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
    $types = array();
    if ( empty( $templates ) ) {
        $template_lists = [ '0' => __( 'Do not Saved Templates.', 'htmega-addons' ) ];
    } else {
        $template_lists = [ '0' => __( 'Select Template', 'htmega-addons' ) ];
        foreach ( $templates as $template ) {
            $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
        }
    }
    return $template_lists;
}

function advanced_html_tag_lists() {
    $html_tag_list = [
        'h1'   => __( 'H1', 'htmega-addons' ),
        'h2'   => __( 'H2', 'htmega-addons' ),
        'h3'   => __( 'H3', 'htmega-addons' ),
        'h4'   => __( 'H4', 'htmega-addons' ),
        'h5'   => __( 'H5', 'htmega-addons' ),
        'h6'   => __( 'H6', 'htmega-addons' ),
        'p'    => __( 'p', 'htmega-addons' ),
        'div'  => __( 'div', 'htmega-addons' ),
        'span' => __( 'span', 'htmega-addons' ),
    ];
    return $html_tag_list;
}

function advanced_addons_gravity_forms_options() {

    $data = get_transient( 'ad_gravity_form_options' );

    if ( false === $data ) {
        if ( class_exists( 'GFCommon' ) ) {
            $contact_forms = RGFormsModel::get_forms( null, 'title' );
            $form_options = ['0' => esc_html__( 'Select Form', ' aw_elementor' )];
            if ( ! empty( $contact_forms ) && ! is_wp_error( $contact_forms ) ) {
                foreach ( $contact_forms as $form ) {   
                    $form_options[ $form->id ] = $form->title;
                }
            }
        } else {
            $form_options = ['0' => esc_html__( 'Form Not Found!', ' aw_elementor' ) ];
        }

        set_transient( 'ad_gravity_form_options', $form_options, MINUTE_IN_SECONDS );
    }

    return $data;
}

if ( ! function_exists( 'Advance_Addons_do_shortcode' ) ) {
    /**
     * Call a shortcode function by tag name.
     *
     * @since  1.0.0
     *
     * @param string $tag     The shortcode whose function to call.
     * @param array  $atts    The attributes to pass to the shortcode function. Optional.
     * @param array  $content The shortcode's content. Default is null (none).
     *
     * @return string|bool False on failure, the result of the shortcode on success.
     */
    function Advance_Addons_do_shortcode( $tag, array $atts = array(), $content = null ) {
        global $shortcode_tags;
        if ( ! isset( $shortcode_tags[ $tag ] ) ) {
            return false;
        }
        return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
    }
}

if ( ! function_exists( 'Advance_Addons_get_cf7_forms' ) ) {
    /**
     * Get a list of all CF7 forms
     *
     * @return array
     */
    function Advance_Addons_get_cf7_forms() {
        $forms = get_posts( [
            'post_type'      => 'wpcf7_contact_form',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $forms ) ) {
            return wp_list_pluck( $forms, 'post_title', 'ID' );
        }
        return [];
    }
}

if ( ! function_exists( 'Advance_Addons_get_wpforms' ) ) {
    /**
     * Get a list of all WPForms
     *
     * @return array
     */
    function Advance_Addons_get_wpforms() {
        $forms = get_posts( [
            'post_type'      => 'wpforms',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $forms ) ) {
            return wp_list_pluck( $forms, 'post_title', 'ID' );
        }
        return [];
    }
}

if ( ! function_exists( 'Advance_Addons_get_ninjaform' ) ) {
    /**
     * Get a list of all Ninja Form
     *
     * @return array
     */
    function Advance_Addons_get_ninjaform() {
        $options = array();

        if ( class_exists( 'Ninja_Forms' ) ) {
            $contact_forms = Ninja_Forms()->form()->get_forms();

            if ( !empty($contact_forms) && !is_wp_error( $contact_forms ) ) {

                $options[0] = esc_html__( 'Select Ninja Form', ' aw_elementor' );

                foreach ( $contact_forms as $form ) {
                    $options[$form->get_id()] = $form->get_setting('title');
                }
            }
        } else {
            $options[0] = esc_html__( 'Create a Form First', ' aw_elementor' );
        }

        return $options;
    }
}

if ( ! function_exists( 'Advance_Addons_get_caldera_form' ) ) {
	/**
	 * Get a list of all Caldera Form
	 *
	 * @return array
	 */
	function Advance_Addons_get_caldera_form() {
		$options = array();

		if ( class_exists( 'Caldera_Forms' ) ) {
			$contact_forms = \Caldera_Forms_Forms::get_forms(true, true);

			if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {
				$options[0] = esc_html__( 'Select a Caldera Form', ' aw_elementor' );
				foreach ( $contact_forms as $form ) {
					$options[$form['ID']] = $form['name'];
				}
			}
		} else {
			$options[0] = esc_html__( 'Create a Form First', ' aw_elementor' );
		}

		return $options;
	}
}

if ( ! function_exists( 'Advance_Addons_get_we_form' ) ) {
	/**
	 * Get a list of all WeForm
	 *
	 * @return array
	 */
	function Advance_Addons_get_we_forms() {
        $forms = get_posts( [
            'post_type'      => 'wpuf_contact_form',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $forms ) ) {
            return wp_list_pluck( $forms, 'post_title', 'ID' );
        }
        return [];
    }
}

if ( ! function_exists( 'Advance_Addons_get_modula_gallery' ) ) {
	/**
	 * Get a list of all Modula Gallery
	 *
	 * @return array
	 */
	function Advance_Addons_get_modula_gallery() {
		$gallery = get_posts( [
            'post_type'      => 'modula-gallery',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $gallery ) ) {
            return wp_list_pluck( $gallery, 'post_title', 'ID' );
        } else {
			__( 'Create a Gallery', ' aw_elementor' );
		}
        return [];
	}
}

if ( ! function_exists( 'Advance_Addons_sanitize_html_class_param' ) ) {
    /**
     * Sanitize html class string
     *
     * @param $class
     * @return string
     */
    function Advance_Addons_sanitize_html_class_param( $class ) {
        $classes = ! empty( $class ) ? explode( ' ', $class ) : [];
        $sanitized = [];
        if ( ! empty( $classes ) ) {
            $sanitized = array_map( function( $cls ) {
                return sanitize_html_class( $cls );
            }, $classes );
        }
        return implode( ' ', $sanitized );
    }
}

if ( ! function_exists( 'Advance_Addons_is_cf7_activated' ) ) {
    /**
     * Check if contact form 7 is activated
     *
     * @return bool
     */
    function Advance_Addons_is_cf7_activated() {
        return class_exists( 'WPCF7' );
    }
}

if ( ! function_exists( 'Advance_Addons_is_wpf_activated' ) ) {
    /**
     * Check if WPForms is activated
     *
     * @return bool
     */
    function Advance_Addons_is_wpf_activated() {
        return class_exists( 'WPForms_Lite' );
    }
}

if ( ! function_exists( 'Advance_Addons_is_ninjaf_activated' ) ) {
    /**
     * Check if Ninja Form is activated
     *
     * @return bool
     */
    function Advance_Addons_is_ninjaf_activated() {
        return class_exists( 'Ninja_Forms' );
    }
}

if ( ! function_exists( 'Advance_Addons_is_calderaf_activated' ) ) {
    /**
     * Check if Caldera Form is activated
     *
     * @return bool
     */
    function Advance_Addons_is_calderaf_activated() {
        return class_exists( 'Caldera_Forms' );
    }
}

if ( ! function_exists( 'Advance_Addons_is_weform_activated' ) ) {
    /**
     * Check if We Form is activated
     *
     * @return bool
     */
    function Advance_Addons_is_weform_activated() {
        return class_exists( 'WeForms' );
    }
}

if ( ! function_exists( 'Advance_Addons_is_script_debug_enabled' ) ) {
    function Advance_Addons_is_script_debug_enabled() {
        return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
    }
}

function Advance_Addons_prepare_data_prop_settings( &$settings, $field_map = [] ) {
    $data = [];
    foreach ( $field_map as $key => $data_key ) {
        $setting_value = Advance_Addons_get_setting_value( $settings, $key );
        list( $data_field_key, $data_field_type ) = explode( '.', $data_key );
        $validator = $data_field_type . 'val';

        if ( is_callable( $validator ) ) {
            $val = call_user_func( $validator, $setting_value );
        } else {
            $val = $setting_value;
        }
        $data[ $data_field_key ] = $val;
    }
    return wp_json_encode( $data );
}

function Advance_Addons_get_setting_value( &$settings, $keys ) {
    if ( ! is_array( $keys ) ) {
        $keys = explode( '.', $keys );
    }
    if ( is_array( $settings[ $keys[0] ] ) ) {
        return Advance_Addons_get_setting_value( $settings[ $keys[0] ], array_slice( $keys, 1 ) );
    }
    return $settings[ $keys[0] ];
}
