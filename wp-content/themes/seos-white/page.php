<?php get_header(); ?>	

	<main id="main">
	
		<section>

		<!-- Start dynamic -->

			<?php if(have_posts()): while (have_posts()): the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				   
				<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
					
				<div class="content"><?php the_content();?></div>	
							
				<?php if (comments_open() || get_comments_number()) {comments_template();} ?>
							
				<?php edit_post_link( __( 'Edit', 'seos-white' ), '', '' ); ?>
							
			</article>
				   
			<?php endwhile; endif; ?>

		<!-- End dynamic -->

		</section>
				
		<?php get_sidebar(); ?>

	</main>
	
<?php get_footer(); ?>