<?php
/**
 * The template for displaying the footer
 */
?>
	<footer>

		<details class="deklaracia">
			
			<summary><?php _e('All rights reserved', 'seos-white'); ?>  &copy; <?php bloginfo('name'); ?></summary>
				
			<p><a href="http://wordpress.org/" title="<?php esc_attr_e( 'WordPress', 'seos-white' ); ?>"><?php printf( __( 'Powered by %s', 'seos-white' ), 'WordPress' ); ?></a></p>
						
			<p><a title="<?php _e('Seos free wordpress themes', 'seos-white'); ?>" href="<?php echo esc_url(__('http://seosthemes.com/', 'seos-white')); ?>" target="_blank"><?php _e('Theme by SEOS', 'seos-white'); ?></a></p>	
				
		</details>
	   
	</footer>

	<?php wp_footer();?>

</body>

</html>
