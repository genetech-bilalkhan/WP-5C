<?php
/**
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 * For more information on hooks, actions, and filters, see https://codex.wordpress.org/ 
 */

 
/*********************************************************************************************************
* Basic
**********************************************************************************************************/

	function seoswhite_add_editor_styles() {
			add_editor_style( get_template_directory_uri() . '/style.css' );
		}

		if ( ! isset( $content_width ) ) $content_width = 600;
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	function seoswhite_setup() {
		load_theme_textdomain( 'seos-white', get_template_directory() . '/languages' );		
		add_action( 'admin_init', 'seoswhite_add_editor_styles' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		
		add_theme_support('post-thumbnails');
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	}

	add_action( 'after_setup_theme', 'seoswhite_setup' );
		
/*********************************************************************************************************
* Register Sidebar
**********************************************************************************************************/

	function seoswhite_widgets_init() {

		register_sidebar( array(
			'id'          => ('left'),
			'name'        => __( 'left', 'seos-white' ),
			 'description' => __( 'This sidebar is left of content.', 'seos-white' ),
		) );

	}

		add_action( 'widgets_init', 'seoswhite_widgets_init' );

/*********************************************************************************************************
* Register Nav Menu
**********************************************************************************************************/

		register_nav_menus(array(
			'menu-top' => __('Menu top', 'seos-white')
		));

/*********************************************************************************************************
* Pagination. 
**********************************************************************************************************/

		add_filter('wp_link_pages_args','seoswhite_add_next_and_number');

		function seoswhite_add_next_and_number($args){
			if($args['next_or_number'] == 'next_and_number'){
				global $page, $numpages, $multipage, $more, $pagenow;
				$args['next_or_number'] = 'number';
				$prev = '';
				$next = '';
				if ( $multipage ) {
					if ( $more ) {
						$i = $page - 1;
						if ( $i && $more ) {
							$prev .= _wp_link_page($i);
							$prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';
						}
						$i = $page + 1;
						if ( $i <= $numpages && $more ) {
							$next .= _wp_link_page($i);
							$next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
						}
					}
				}
				$args['before'] = $args['before'].$prev;
				$args['after'] = $next.$args['after'];    
			}
			return $args;
		}
		
/*********************************************************************************************************
* Load CSS
**********************************************************************************************************/

		function seoswhite_css() {		   
				wp_enqueue_style('seoswhite_style', get_stylesheet_uri());
			}

		add_action('wp_enqueue_scripts', 'seoswhite_css');
		
		function seoswhite_google_fonts() {
				wp_enqueue_style( 'seos-white-google-fonts', '//fonts.googleapis.com/css?family=Roboto:900', false ); 
			}

		add_action( 'wp_enqueue_scripts', 'seoswhite_google_fonts' );

/*********************************************************************************************************
* Custom header
**********************************************************************************************************/

		$seoswhite_custom_header_logo  = array(
			'width'         => 1300,
			'height'        => 100,
			'random-default' => true,
			'flex-height'            => true,
			'flex-width'             => false,
			'header-text'            => false,
		);

		add_theme_support( 'custom-header', $seoswhite_custom_header_logo );

/*********************************************************************************************************
* Custom Colors Customize
**********************************************************************************************************/

		function seoswhite_colors($wp_customize) {

/********************************************
* Hover color
*********************************************/
    
		$wp_customize->add_setting('seoswhite_hover_color', array(        
  	    'default' => '#777',
		'sanitize_callback' => 'sanitize_hex_color'
  	  ));  
	
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seoswhite_hover_color', array(
		'label' => __('Hover Color', 'seos-white'),       
  	    'section' => 'colors',
  	    'settings' => 'seoswhite_hover_color'
  	  )));

/********************************************
* Header Color
*********************************************/ 
 
		$wp_customize->add_setting('seoswhite_header_color', array(         
		'default'     => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seoswhite_header_color', array(
		'label' => __('Header Color', 'seos-white'),        
		'section' => 'colors',
		'settings' => 'seoswhite_header_color'
		)));

/********************************************
* Nav Hover Color
*********************************************/ 
 
		$wp_customize->add_setting('seoswhite_nav_hover_color', array(         
		'default'     => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seoswhite_nav_hover_color', array(
		'label' => __('Nav Hover Color', 'seos-white'),        
		'section' => 'colors',
		'settings' => 'seoswhite_nav_hover_color'
		)));
	
/********************************************
* Main Background
*********************************************/ 
	
		$wp_customize->add_setting('seoswhite_main_background_color', array(         
		'default'     => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seoswhite_main_background_color', array(
		'label' => __('Main Background Color', 'seos-white'),        
		'section' => 'colors',
		'settings' => 'seoswhite_main_background_color'
		)));
	
/********************************************
* Footer Background
*********************************************/ 
	
		$wp_customize->add_setting('seoswhite_footer_background_color', array(         
		'default'     => '#333',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'seoswhite_footer_background_color', array(
		'label' => __('Footer Background Color', 'seos-white'),        
		'section' => 'colors',
		'settings' => 'seoswhite_footer_background_color'
		)));
}
		add_action('customize_register', 'seoswhite_colors');	
?><?php
		function seoswhite_customize_css() {
    ?>
		<style type="text/css">
		header, header p, header h1 {color:<?php echo esc_html(get_theme_mod('seoswhite_header_color')); ?>;}   
		a:hover, details a:hover, article h1:hover {color:<?php echo esc_html(get_theme_mod('seoswhite_hover_color')); ?>;}
		 nav ul ul li a:hover {color:<?php echo esc_html(get_theme_mod('seoswhite_nav_hover_color')); ?>;}     
		main {background:<?php echo esc_html(get_theme_mod('seoswhite_main_background_color')); ?>;}     
 		footer {background:<?php echo esc_html(get_theme_mod('seoswhite_footer_background_color')); ?>;}
 		.option-con {border:<?php echo esc_html(get_theme_mod('seoswhite_footer_background_color')); ?>;}    
		</style>
    <?php	
}
		add_action('wp_head', 'seoswhite_customize_css');

/*********************************************************************************************************
* Custom Background Color
**********************************************************************************************************/

		$custom_background = array(
			'default-color'          => 'FFFFFF',
			'wp-head-callback'       => '_custom_background_cb',
		);
		add_theme_support( 'custom-background', $custom_background );
			
/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/

		function seoswhite_new_excerpt_more( $more ) {
			return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'seos-white') . '</a>';
		}
			add_filter( 'excerpt_more', 'seoswhite_new_excerpt_more' );

		function seoswhite_custom_excerpt_length( $length ) {
			return 50;
		}
		add_filter( 'excerpt_length', 'seoswhite_custom_excerpt_length', 999 );
			
/*********************************************************************************************************
* Include
**********************************************************************************************************/

	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/inc/social.php';

	

/***********************************************************************************
 * Seos White Buy
***********************************************************************************/

		function seos_white_support($wp_customize){
			class seos_white_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="seos_white-info"> 
						<a href="<?php echo esc_url( '//seosthemes.info/seos-white-free-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'Seos White Premium', 'seos-white' ); ?>" target="_blank">
						<?php _e( 'Preview Premium', 'seos-white' ); ?>
						</a>
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'seos_white_support');

		function customize_styles_seos_white( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-panel-seos_white_buy_panel .accordion-section-title,
				#customize-theme-controls #accordion-panel-seos_white_buy_panel > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
				}

				.seos_white-info button a {
					color: #FFFFFF;
				}

				#customize-theme-controls   #accordion-section-seos_white_buy_section .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section1 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section2 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section3 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section4 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section5 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section6 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section7 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section8 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section9 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section10 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section11 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section12 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section13 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section14 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section15 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section16 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section17 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section18 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section19 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section20 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section21 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section22 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section23 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section24 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section25 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section26 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section27 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section28 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section29 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section30 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section31 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section32 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section33 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section34 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section35 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section36 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section37 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section38 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section39 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section40 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-seos_white_buy_section22 .accordion-section-title:after {
					font-size: 13px;
					font-weight: bold;
					content: "Premium";
					float: right;
					right: 40px;
					position: relative;
					color: #FF0000;
				}			
				
				#_customize-input-seos_white_setting0 {
					display: none;
				}
				
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'customize_styles_seos_white');

		if ( ! function_exists( 'seos_white_buy' ) ) :
			function seos_white_buy( $wp_customize ) {
			$wp_customize->add_panel( 'seos_white_buy_panel', array(
				'title'			=> __('Seos White Premium', 'seos-white'),
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 1,
			));
			
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_white_buy_section0', array(
				'title'			=> __('Preview The Theme', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	<a href="//seosthemes.info/seos-white-free-wordpress-theme/" target="_blank">Learn more about Seos White.</a> ','seos-white'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting0', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,'seos_white_setting0', array(
						'section'	=> 'seos_white_buy_section0',
						'settings'	=> 'seos_white_setting0',
					)
				)
			);
						
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_white_buy_section', array(
				'title'			=> __('Home Page Slider', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting', array(
						'label'		=> __('Home Page Slider', 'seos-white'),
						'section'	=> 'seos_white_buy_section',
						'settings'	=> 'seos_white_setting',
					)
				)
			);	
			
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_white_buy_section1', array(
				'title'			=> __('Image Slider', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting1', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting1', array(
						'label'		=> __('Image Slider', 'seos-white'),
						'section'	=> 'seos_white_buy_section1',
						'settings'	=> 'seos_white_setting1',
					)
				)
			);

/******************************************************************************/
		
			$wp_customize->add_section( 'seos_white_buy_section2', array(
				'title'			=> __('Theme Boxes', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting2', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting2', array(
						'label'		=> __('Theme Boxes', 'seos-white'),
						'section'	=> 'seos_white_buy_section2',
						'settings'	=> 'seos_white_setting2',
					)
				)
			);			
			
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_white_buy_section3', array(
				'title'			=> __('Survey Feedback', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting3', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting3', array(
						'label'		=> __('Survey Feedback', 'seos-white'),
						'section'	=> 'seos_white_buy_section3',
						'settings'	=> 'seos_white_setting3',
					)
				)
			);			
						
/******************************************************************************/
		
			$wp_customize->add_section( 'seos_white_buy_section4', array(
				'title'			=> __('Home Page Custom Images', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 4,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting4', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting4', array(
						'label'		=> __('Home Page Custom Images', 'seos-white'),
						'section'	=> 'seos_white_buy_section4',
						'settings'	=> 'seos_white_setting4',
					)
				)
			);			

			$wp_customize->add_section( 'seos_white_buy_section5', array(
				'title'			=> __('SEO Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 5,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting5', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting5', array(
						'label'		=> __('SEO Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section5',
						'settings'	=> 'seos_white_setting5',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section6', array(
				'title'			=> __('Copy Protection', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 6,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting6', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting6', array(
						'label'		=> __('Copy Protection', 'seos-white'),
						'section'	=> 'seos_white_buy_section6',
						'settings'	=> 'seos_white_setting6',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section7', array(
				'title'			=> __('Antispam Login Form', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 7,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting7', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting7', array(
						'label'		=> __('Antispam Login Form', 'seos-white'),
						'section'	=> 'seos_white_buy_section7',
						'settings'	=> 'seos_white_setting7',
					)
				)
			);	
			$wp_customize->add_section( 'seos_white_buy_section8', array(
				'title'			=> __('Contacts', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 8,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting8', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting8', array(
						'label'		=> __('Contacts', 'seos-white'),
						'section'	=> 'seos_white_buy_section8',
						'settings'	=> 'seos_white_setting8',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section9', array(
				'title'			=> __('Sidebar Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 9,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting9', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting9', array(
						'label'		=> __('Sidebar Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section9',
						'settings'	=> 'seos_white_setting9',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section10', array(
				'title'			=> __('Activate Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 10,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting10', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting10', array(
						'label'		=> __('Activate Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section10',
						'settings'	=> 'seos_white_setting10',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section11', array(
				'title'			=> __('Header Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 11,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting11', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting11', array(
						'label'		=> __('Header Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section11',
						'settings'	=> 'seos_white_setting11',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section12', array(
				'title'			=> __('Menu Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 12,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting12', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting12', array(
						'label'		=> __('Menu Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section12',
						'settings'	=> 'seos_white_setting12',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section13', array(
				'title'			=> __('Pagination  Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 13,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting13', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting13', array(
						'label'		=> __('Pagination  Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section13',
						'settings'	=> 'seos_white_setting13',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section14', array(
				'title'			=> __('Featured Home Page', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 14,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting14', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting14', array(
						'label'		=> __('Featured Home Page', 'seos-white'),
						'section'	=> 'seos_white_buy_section14',
						'settings'	=> 'seos_white_setting14',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section15', array(
				'title'			=> __('Custom JS', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 15,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting15', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting15', array(
						'label'		=> __('Custom JS', 'seos-white'),
						'section'	=> 'seos_white_buy_section15',
						'settings'	=> 'seos_white_setting15',
					)
				)
			);	
			$wp_customize->add_section( 'seos_white_buy_section16', array(
				'title'			=> __('Animation', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 16,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting16', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting16', array(
						'label'		=> __('Animation', 'seos-white'),
						'section'	=> 'seos_white_buy_section16',
						'settings'	=> 'seos_white_setting16',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section17', array(
				'title'			=> __('All Google Fonts', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 17,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting17', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting17', array(
						'label'		=> __('All Google Fonts', 'seos-white'),
						'section'	=> 'seos_white_buy_section17',
						'settings'	=> 'seos_white_setting17',
					)
				)
			);	
			$wp_customize->add_section( 'seos_white_buy_section18', array(
				'title'			=> __('Banners', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 18,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting18', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting18', array(
						'label'		=> __('Banners', 'seos-white'),
						'section'	=> 'seos_white_buy_section18',
						'settings'	=> 'seos_white_setting18',
					)
				)
			);
			
			$wp_customize->add_section( 'seos_white_buy_section19', array(
				'title'			=> __('About US Section', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 19,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting19', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting19', array(
						'label'		=> __('About US Section', 'seos-white'),
						'section'	=> 'seos_white_buy_section19',
						'settings'	=> 'seos_white_setting19',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section20', array(
				'title'			=> __('Site Logo', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 20,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting20', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting20', array(
						'label'		=> __('Site Logo', 'seos-white'),
						'section'	=> 'seos_white_buy_section20',
						'settings'	=> 'seos_white_setting20',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section21', array(
				'title'			=> __('Font Sizes', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 21,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting21', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting21', array(
						'label'		=> __('Font Sizes', 'seos-white'),
						'section'	=> 'seos_white_buy_section21',
						'settings'	=> 'seos_white_setting21',
					)
				)
			);	
			$wp_customize->add_section( 'seos_white_buy_section22', array(
				'title'			=> __('Social Media', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 22,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting22', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting22', array(
						'label'		=> __('Social Media', 'seos-white'),
						'section'	=> 'seos_white_buy_section22',
						'settings'	=> 'seos_white_setting22',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section23', array(
				'title'			=> __('Shortcode Scroll Animation', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 23,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting23', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting23', array(
						'label'		=> __('Shortcode Scroll Animation', 'seos-white'),
						'section'	=> 'seos_white_buy_section23',
						'settings'	=> 'seos_white_setting23',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section24', array(
				'title'			=> __('Read More Button Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 24,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting24', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting24', array(
						'label'		=> __('Read More Button Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section24',
						'settings'	=> 'seos_white_setting24',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section25', array(
				'title'			=> __('Disabel all Comments', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 25,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting25', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting25', array(
						'label'		=> __('Disabel all Comments', 'seos-white'),
						'section'	=> 'seos_white_buy_section25',
						'settings'	=> 'seos_white_setting25',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section26', array(
				'title'			=> __('Entry Meta', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 26,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting26', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting26', array(
						'label'		=> __('Entry Meta', 'seos-white'),
						'section'	=> 'seos_white_buy_section26',
						'settings'	=> 'seos_white_setting26',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section27', array(
				'title'			=> __('Hide All Titles', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 27,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting27', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting27', array(
						'label'		=> __('Hide All Titles', 'seos-white'),
						'section'	=> 'seos_white_buy_section27',
						'settings'	=> 'seos_white_setting27',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section28', array(
				'title'			=> __('Mobile Call Now', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 28,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting28', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting28', array(
						'label'		=> __('Mobile Call Now', 'seos-white'),
						'section'	=> 'seos_white_buy_section28',
						'settings'	=> 'seos_white_setting28',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section29', array(
				'title'			=> __('Testimonials Post Type', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 29,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting29', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting29', array(
						'label'		=> __('Testimonials Post Type', 'seos-white'),
						'section'	=> 'seos_white_buy_section29',
						'settings'	=> 'seos_white_setting29',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section30', array(
				'title'			=> __('WooCommerce Colors', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 30,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting30', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting30', array(
						'label'		=> __('WooCommerce Colors', 'seos-white'),
						'section'	=> 'seos_white_buy_section30',
						'settings'	=> 'seos_white_setting30',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section31', array(
				'title'			=> __('WooCommerce Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 31,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting31', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting31', array(
						'label'		=> __('WooCommerce Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section31',
						'settings'	=> 'seos_white_setting31',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section32', array(
				'title'			=> __('Footer  Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 32,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting32', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting32', array(
						'label'		=> __('Footer  Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section32',
						'settings'	=> 'seos_white_setting32',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section33', array(
				'title'			=> __('Back To Top Button Options', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 33,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting33', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting33', array(
						'label'		=> __('Back To Top Button Options', 'seos-white'),
						'section'	=> 'seos_white_buy_section33',
						'settings'	=> 'seos_white_setting33',
					)
				)
			);	
			$wp_customize->add_section( 'seos_white_buy_section34', array(
				'title'			=> __('Under Construction', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 34,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting34', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting34', array(
						'label'		=> __('Under Construction', 'seos-white'),
						'section'	=> 'seos_white_buy_section34',
						'settings'	=> 'seos_white_setting34',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section35', array(
				'title'			=> __('Google Verify ID', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 35,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting35', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting35', array(
						'label'		=> __('Google Verify ID', 'seos-white'),
						'section'	=> 'seos_white_buy_section35',
						'settings'	=> 'seos_white_setting35',
					)
				)
			);	
			$wp_customize->add_section( 'seos_white_buy_section36', array(
				'title'			=> __('Bing  Verify ID', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 36,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting36', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting36', array(
						'label'		=> __('Bing  Verify ID', 'seos-white'),
						'section'	=> 'seos_white_buy_section36',
						'settings'	=> 'seos_white_setting36',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section37', array(
				'title'			=> __('Alexa   Verify ID', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 37,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting37', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting37', array(
						'label'		=> __('Alexa   Verify ID', 'seos-white'),
						'section'	=> 'seos_white_buy_section37',
						'settings'	=> 'seos_white_setting37',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section38', array(
				'title'			=> __('Pinterest Verify ID', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 38,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting38', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting38', array(
						'label'		=> __('Pinterest Verify ID', 'seos-white'),
						'section'	=> 'seos_white_buy_section38',
						'settings'	=> 'seos_white_setting38',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section39', array(
				'title'			=> __('Yandex  Verify ID', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 39,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting39', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting39', array(
						'label'		=> __('Yandex  Verify ID', 'seos-white'),
						'section'	=> 'seos_white_buy_section39',
						'settings'	=> 'seos_white_setting39',
					)
				)
			);	

			$wp_customize->add_section( 'seos_white_buy_section40', array(
				'title'			=> __('G+ Publisher', 'seos-white'),
				'panel'			=> 'seos_white_buy_panel',
				'description'	=> __('	Learn more about Seos White. ','seos-white'),
				'priority'		=> 40,
			));			
			
			$wp_customize->add_setting( 'seos_white_setting40', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_white_Customize(
					$wp_customize,'seos_white_setting40', array(
						'label'		=> __('G+ Publisher', 'seos-white'),
						'section'	=> 'seos_white_buy_section40',
						'settings'	=> 'seos_white_setting40',
					)
				)
			);	
			
		}
		endif;
		 
		add_action('customize_register', 'seos_white_buy');
		
		
/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/

	function seos_white_excerpt_more( $more ) {

			return '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
		
	}
	add_filter( 'excerpt_more', 'seos_white_excerpt_more' );	
	
		
	function seos_white_custom_excerpt_length( $length ) {
			return 42;
	}
	
	
	add_filter( 'excerpt_length', 'seos_white_custom_excerpt_length', 999 );
	
	
	function seos_white_return_read_more_text () {
		return "Read More";
	}		
