<?php
/**
 * The template for displaying Comments.
 */
?>
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	
	die ('Please do not load this page directly. Thanks!');
		
	if ( post_password_required() ) { ?>
	
   <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','seos-white'); ?></p>
   
<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<h3 id="comments"><?php comments_number(__('No Comment','seos-white'), __('One Comment','seos-white'), __('% Comments','seos-white') );?><?php _e(' so far:','seos-white'); ?></h3>
	
	<ol class="ol-comments">
	
		<?php wp_list_comments(array('avatar_size' => 75)); ?>
		
	</ol>
	
	<?php previous_comments_link() ?>
			
	<?php next_comments_link() ?>
			
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( ! comments_open() && ! is_page() ) : ?>
	
		<?php _e('Comments are closed.','seos-white'); ?>
		
	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

		<?php comment_form(); ?>
		
<?php endif;  ?>
