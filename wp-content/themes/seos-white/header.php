<?php
/**
 * @since Seos_White 1.09
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } else { do_action( 'wp_body_open' ); } ?>
	<?php seoswhite_get_social(); ?>
	
	<nav>
	
		<div class="nav-ico">
		
			<a href="#" id="menu-icon">	
			
				<span class="menu-button"> </span>
				
				<span class="menu-button"> </span>
				
				<span class="menu-button"> </span>
				
			</a>
			
			<?php wp_nav_menu ( array('theme_location' => 'menu-top', 'container' => '' )); ?>
		
		</div>
		
	</nav>
	
	<?php if ( is_home () || is_front_page () ) {?>
	
	<div class="slider" <?php if( get_theme_mod('slider_img') ) {?> style="background-image: url(<?php echo esc_url(get_theme_mod('slider_img')); ?>)"<?php } ?>>
	
		<header id="header-home">
		
			<div  id="header-img" style="background: url(<?php header_image(); ?>) repeat; height:<?php echo get_custom_header()->height; ?>%;" >
			
				<div id="header" >
				
					<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>"><h1 class="animation-h1"><?php bloginfo('name'); ?></h1></a>	
					
					<p class="description animation-descriptio"><?php bloginfo('description'); ?></p>
				
				 </div>
				 
			</div>
	  
		</header>
	
		<div class="animation-img">	
		
			<div class="animation-slide">	
			
				<?php  if( get_theme_mod('slider_text') or get_theme_mod('seos_deactivate') != "Seos White" ) : ?>
				
						<div><?php echo esc_html(get_theme_mod('slider_text')); ?></div>
					
							<?php else : ?>
				
								<div><?php echo "Seos White"; ?></div>

					<?php endif; ?>

			</div>
			
		</div>
		
	</div>
	
	<?php } else { ?>

	<div class="slider-header">
	
		<header id="header-home">
		
			<div id="header-img" style="background: url('<?php header_image(); ?>') repeat; height:<?php echo get_custom_header()->height; ?>%;" >
			
				<div id="header" >
				
					<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>"><h1 class="header-h1"><?php bloginfo('name'); ?></h1></a>
					
					<p class="description"><?php bloginfo('description'); ?></p>
				
				 </div>
				 
			</div>
	  
		</header>
	
	</div>
	
	<?php } ?>