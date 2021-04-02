<?php
/**
 * Seos White Theme Customizer
 *
 * @package seos-white
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function seoswhite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'seoswhite_customize_register' );

/***********************************************************************************
 * Social media option
***********************************************************************************/

if ( ! function_exists( 'seoswhite_social' ) ) :
	function seoswhite_social( $wp_customize ) {
 
		$wp_customize->add_section( 'seoswhite_social_section' , array(
			'title'       => __( 'Social Media', 'seos-white' ),
			'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
		$wp_customize->add_setting( 'seoswhite_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seoswhite_facebook', array(
			'label'    => __( 'Enter your Facebook url', 'seos-white' ),
			'section'  => 'seoswhite_social_section',
			'settings' => 'seoswhite_facebook',
		) ) );
	
		$wp_customize->add_setting( 'seoswhite_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seoswhite_twitter', array(
			'label'    => __( 'Enter your Twitter url', 'seos-white' ),
			'section'  => 'seoswhite_social_section',
			'settings' => 'seoswhite_twitter',
		) ) );

		$wp_customize->add_setting( 'seoswhite_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seoswhite_google', array(
			'label'    => __( 'Enter your Google+ url', 'seos-white' ),
			'section'  => 'seoswhite_social_section',
			'settings' => 'seoswhite_google',
		) ) );
		
		$wp_customize->add_setting( 'seoswhite_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seoswhite_linkedin', array(
			'label'    => __( 'Enter your Linkedin url', 'seos-white' ),
			'section'  => 'seoswhite_social_section',
			'settings' => 'seoswhite_linkedin',
		) ) );
							
	}
endif;
		add_action('customize_register', 'seoswhite_social');

		
/***********************************************************************************
 * Slide option
***********************************************************************************/

if ( ! function_exists( 'seoswhite_slider' ) ) :
	function seoswhite_slider( $wp_customize ) {
 
		$wp_customize->add_section( 'seoswhite_slider_section' , array(
			'title'       => __( 'Home Page Slide', 'seos-white' ),
			'description' => __( 'Post your featured Text and IMG. Slide will appear only on your home page. Your theme recommends size of 1300 X 500 pixels.', 'seos-white' ),
			'priority'   => 2,
		) );
		
		$wp_customize->add_setting( 'slider_text', array (
			'default' => __('Seos White' , 'seos-white'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
				$wp_customize->add_setting( 'seos_deactivate', array (
			'default' => __('Seos White' , 'seos-white'),
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_deactivate', array(
				'label'		=> __( 'Activate Title.', 'seos-white' ),
				'section'	=> 'seoswhite_slider_section',
				'settings'	=> 'seos_deactivate',
				'type'		=> 'select',
				'choices'	=> array
				(
					'Seos White' => 'Activate',
					'' => 'Deactivate'
				)
			 ) 
		   ) 
	    );
		
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_text', array(
			'label'    => __( 'Your Slide Title Text:', 'seos-white' ),
			'section'  => 'seoswhite_slider_section',
			'settings' => 'slider_text',
			'type' => 'text',
		) ) );

		$wp_customize->add_setting( 'slider_img', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'slider_img', 
			array(
				'label'      => __( 'Your IMG Upload:', 'seos-white' ),
				'section'    => 'seoswhite_slider_section',
				'settings'   => 'slider_img',
			) ) );

	}
endif;
		add_action('customize_register', 'seoswhite_slider');
		
/*********************************************************************************
 * Seos White - How to use
**********************************************************************************/

if ( ! function_exists( 'seoswhite_how_to_use' ) ) :
	function seoswhite_how_to_use( $wp_customize ) {
 
		$wp_customize->add_section( 'seoswhite_how_to_use_section' , array(
			'title'       => __( 'How to use Seos White Theme', 'seos-white' ),
			'description' => __( '<a class="button button-primary" href="http://seosthemes.com/seos-white/">How to use Seos White Theme</a>', 'seos-white' ),
			'priority'   => 1,
		) );
		
		$wp_customize->add_setting( 'seoswhite_how_to_use', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seoswhite_how_to_use', array(
			'label'    => __( 'How to use Seos White Theme', 'seos-white' ),
			'section'  => 'seoswhite_how_to_use_section',
			'settings' => 'seoswhite_how_to_use',
			'type'     => 'radio',

		) ) );
		
}

endif;
		add_action('customize_register', 'seoswhite_how_to_use');		