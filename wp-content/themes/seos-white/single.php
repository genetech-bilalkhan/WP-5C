<?php get_header(); ?>

<main id="main">

	<section>

		<!-- Start dynamic -->

		<?php if(have_posts()): while (have_posts()): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<?php edit_post_link( __( 'Edit', 'seos-white' ), '', '' ); ?>
						
			<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
						
			<div class="content"><?php the_content();?></div>
								
			<?php if (comments_open() || get_comments_number()) { comments_template(); } ?>
								
			<small><?php _e('Posted by:', 'seos-white'); ?></small> <em><?php the_author() ?></em> <small><?php _e('on', 'seos-white'); ?> </small>	
								
			<em class="entry-date"> <?php echo get_the_date(); ?></em>
								
			<span><?php _e('Category:', 'seos-white'); ?> <?php the_category( ', ', '' ); ?> </span>
								
			<p><?php the_tags(); ?></p>

			<?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> previous - ', 'seos-white')); ?>
			  
			<?php next_post_link('%link', __('next <span class="meta-nav">&rarr;</span>', 'seos-white')); ?>
			
			<?php
				wp_link_pages(array(
					'before' => '<div class="nextpage"><div class="pagination next-page">' . __('Pages: ', 'seos-white'),
					'after' => '</div></div></div>',
					'next_or_number' => 'next_and_number',
					'nextpagelink' => __(' Next', 'seos-white'),
					'previouspagelink' => __(' Previous', 'seos-white'),
					'pagelink' => '%',
					'echo' => 1 )
				);
			?>
		 
		</article>

		<?php endwhile; endif; ?>

		<!-- End dynamic -->

	</section>
		
	<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>