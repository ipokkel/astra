<?php
/**
 * Bottom Footer Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2018, Astra
 * @link        http://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Footer_Layout_Configs' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Astra_Footer_Layout_Configs extends Astra_Customizer_Config_Base {

		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Footer Bar Layout
				 */

				array(
					'name'        => ASTRA_THEME_SETTINGS . '[footer-sml-layout]',
					'type'        => 'control',
					'control'     => 'ast-radio-image',
					'default'     => astra_get_option( 'footer-sml-layout' ),
					'section'     => 'section-footer-small',
					'priority'    => 5,
					'title'       => __( 'Footer Bar Layout', 'astra' ),
					'choices'  => array(
						'disabled'            => array(
							'label' => __( 'Disabled', 'astra' ),
							'path'  => ASTRA_THEME_URI . 'assets/images/disabled-footer-76x48.png',
						),
						'footer-sml-layout-1' => array(
							'label' => __( 'Footer Bar Layout 1', 'astra' ),
							'path'  => ASTRA_THEME_URI . 'assets/images/footer-layout-1-76x48.png',
						),
						'footer-sml-layout-2' => array(
							'label' => __( 'Footer Bar Layout 2', 'astra' ),
							'path'  => ASTRA_THEME_URI . 'assets/images/footer-layout-2-76x48.png',
						),
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[section-ast-small-footer-layout-info]',
					'control'  => 'ast-divider',
 					'type'     => 'control',
					'section'  => 'section-footer-small',
					'priority' => 10,
					'settings' => array(),
				),

				/**
				 *  Section: Section 1
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[footer-sml-section-1]',
					'control'  => 'select',
					'default'  => astra_get_option( 'footer-sml-section-1' ),
 					'type'     => 'control',
					'section'  => 'section-footer-small',
					'priority' => 15,
					'title'    => __( 'Section 1', 'astra' ),
					'choices'  => array(
						''       => __( 'None', 'astra' ),
						'menu'   => __( 'Footer Menu', 'astra' ),
						'custom' => __( 'Custom Text', 'astra' ),
						'widget' => __( 'Widget', 'astra' ),
					),
				),	

				/**
				 * Option: Section 1 Custom Text
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[footer-sml-section-1-credit]',
					'default'   => astra_get_option( 'footer-sml-section-1-credit' ),
					'type'      => 'control',
					'control'   => 'textarea',
					'transport' => 'postMessage',
					'section'   => 'section-footer-small',
					'priority'  => 20,
					'title'     => __( 'Section 1 Custom Text', 'astra' ),
					'choices'   => array(
						''       => __( 'None', 'astra' ),
						'menu'   => __( 'Footer Menu', 'astra' ),
						'custom' => __( 'Custom Text', 'astra' ),
						'widget' => __( 'Widget', 'astra' ),
					),
					'partial' => array(
						'selector'            => '.ast-small-footer-section-1',
						'container_inclusive' => false,
						'render_callback'     => array( 'Astra_Customizer_Partials', '_render_footer_sml_section_1_credit' ),
					)
				),

				/**
				 * Option: Section 2
				 */
				array(
				    'name'     => ASTRA_THEME_SETTINGS . '[footer-sml-section-2]',
					'type'     => 'control',
					'control'  => 'option',
					'default'  => astra_get_option( 'footer-sml-section-2' ),
					'section'  => 'section-footer-small',
					'priority' => 25,
					'title'    => __( 'Section 2', 'astra' ),
					'choices'  => array(
						''       => __( 'None', 'astra' ),
						'menu'   => __( 'Footer Menu', 'astra' ),
						'custom' => __( 'Custom Text', 'astra' ),
						'widget' => __( 'Widget', 'astra' ),
					),
				),

				/**
				 * Option: Section 2 Custom Text
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[footer-sml-section-2-credit]',
					'type'     => 'control',
					'control'  => 'textarea',
					'default'  => astra_get_option( 'footer-sml-section-2-credit' ),
					'section'  => 'section-footer-small',
					'priority' => 30,
					'title'    => __( 'Section 2 Custom Text', 'astra' ),
					'partials' => array(
						'selector'            => '.ast-small-footer-section-2',
						'container_inclusive' => false,
						'render_callback'     => array( 'Astra_Customizer_Partials', '_render_footer_sml_section_2_credit' ),
					)
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[section-ast-small-footer-typography]',
					'control'  => 'ast-divider',
					'type'     => 'control',
					'section'  => 'section-footer-small',
					'priority' => 35,
					'settings' => array(),
				),

				/**
				 * Option: Footer Top Border
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[footer-sml-divider]',
					'type'        => 'control',
					'control'     => 'number',
					'default'     => astra_get_option( 'footer-sml-divider' ),
					'section'     => 'section-footer-small',
					'priority'    => 40,
					'title'       => __( 'Footer Bar Top Border', 'astra' ),
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 600,
					),
				),

				/**
				 * Option: Footer Top Border Color
				 */

				array(
					'name'     => ASTRA_THEME_SETTINGS . '[footer-sml-divider-color]',
					'section'  => 'section-footer-small',
					'default'  => '#7a7a7a',
					'type'     => 'control',
					'control'  => 'color',
					'priority' => 45,
					'title'    => __( 'Footer Bar Top Border Color', 'astra' ),
				),

				/**
				 * Option: Header Width
				 */

				array(
				    'name'     => ASTRA_THEME_SETTINGS . '[footer-layout-width]',
					'type'     => 'control',
					'control'  => 'select',
					'default'  => astra_get_option( 'footer-layout-width' ),
					'section'  => 'section-footer-small',
					'priority' => 35,
					'title'    => __( 'Footer Bar Width', 'astra' ),
					'choices'  => array(
						'full'    => __( 'Full Width', 'astra' ),
						'content' => __( 'Content Width', 'astra' ),
					),
				)
			);

			return array_merge( $configurations, $_configs );

		}
	}
}

	
new Astra_Footer_Layout_Configs;
	

	

	
