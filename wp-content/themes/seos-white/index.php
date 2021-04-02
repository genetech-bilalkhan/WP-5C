<?php get_header(); ?>

	<main id="main">
	
		<section>

		<!-- Start dynamic -->

			<?php if(have_posts()): while (have_posts()): the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php edit_post_link( __( 'Edit', 'seos-white' ), '', '' ); ?>
							
					<h1><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h1>
					
					<p class="img"><?php the_post_thumbnail(); ?> </p>
						 
					<div class="content"><?php the_content();?></div>

				</article>
				   
			<?php endwhile; endif; ?>

		<!-- End dynamic -->

		</section>
				
		<?php get_sidebar(); ?>

	</main>
	
<?php get_footer(); ?>