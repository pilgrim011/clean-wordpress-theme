<?php
/**
 * clean Theme Customizer
 *
 * @package clean
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function clean_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Text color
    $wp_customize->add_setting( 'text_color', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );
  
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Text color', 'clean' ),
	  ) ) );
  
	  // Link color
	  $wp_customize->add_setting( 'link_color', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );
  
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Link color', 'clean' ),
	  ) ) );
  
	  // Accent color
	  $wp_customize->add_setting( 'accent_color', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );
  
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Accent color', 'clean' ),
	  ) ) );
  
	  // Border color
	  $wp_customize->add_setting( 'border_color', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );
  
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Border color', 'clean' ),
	  ) ) );
  
	  // Sidebar background
	  $wp_customize->add_setting( 'sidebar_background', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );
  
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_background', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Sidebar Background', 'clean' ),
		) ) );
		// Header background color
		$wp_customize->add_setting(
			// $id
			'header_background_color_setting',
			// $args
			array(
				'default'   => '',
				'transport'			=> 'refresh',
				'sanitize_callback'	=> 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				// $wp_customize object
				$wp_customize,
				// $id
				'header_background_color',
				// $args
				array(
					'settings'		=> 'header_background_color_setting',
					'section'		=> 'colors',
					'label'			=> __( 'Header Background Color', 'clean' ),
					'description'	=> __( 'Select the background color for header.', 'clean' ),
				)
			)
		);
  
}
add_action( 'customize_register', 'clean_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function clean_customize_preview_js() {
	wp_enqueue_script( 'clean_customizer', get_template_directory_uri() . '/includes/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'clean_customize_preview_js' );
