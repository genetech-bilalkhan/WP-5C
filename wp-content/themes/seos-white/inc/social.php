<?php
function seoswhite_get_social() { ?>

	<div class="social-ico">

		<?php  if( get_theme_mod('seoswhite_facebook') ) {?>
		
		<a target="_blank" href="<?php echo  esc_url(get_theme_mod('seoswhite_facebook')); ?>" class="fb"> </a>
		
		<?php } ?>
		
		<?php  if( get_theme_mod('seoswhite_twitter') ) {?>
		
		<a target="_blank" href="<?php echo  esc_url(get_theme_mod('seoswhite_twitter')); ?>" class="twitter"> </a>
		
		<?php } ?>
		
		<?php  if( get_theme_mod('seoswhite_google') ) {?>
		
		<a target="_blank" href="<?php echo  esc_url(get_theme_mod('seoswhite_google')); ?>" class="gp"> </a>
		
		<?php } ?>
		
		<?php  if( get_theme_mod('seoswhite_linkedin') ) {?>
		
		<a target="_blank" href="<?php echo esc_url(get_theme_mod('seoswhite_linkedin')); ?>" class="in"> </a>
		
		<?php } ?>
		
	</div>

<?php } ?>