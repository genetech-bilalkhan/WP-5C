<?php
/*
* A Simple Category Template
*/ 
get_header(); ?>

	<main id="main">
	
		<section>
				
			<!-- Start dynamic -->

			<?php if(have_posts()): while (have_posts()): the_post(); ?>
					
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>>
					   
				<?php edit_post_link( __( 'Edit', 'seos-white' ), '', '' ); ?>
							
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							
				<div class="img-search">

					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?> 

				</div>

				<?php the_excerpt(); ?>

			</article>
					   
					<?php endwhile; endif; ?>

			<!-- End dynamic -->

			<div class="nextpage">
			
				<div class="pagination">
				
					<?php echo paginate_links(); ?>
					
				</div> 
				
			</div> 

		</section>

		<?php get_sidebar(); ?>

	</main>
	
<?php get_footer(); ?>