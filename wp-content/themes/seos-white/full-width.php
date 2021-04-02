<?php
/*
* Template Name: Full Width Page
*/
?>
<?php get_header(); ?>

	<main id="main">

		<div id="full-width">

			<!-- Start dynamic -->

			<?php if(have_posts()): while (have_posts()): the_post(); ?>
				
			<article>       

				<?php if ( has_post_thumbnail() )  {?>
				
					<ul class="ch-grid img">
							
						<li>
								
							<div class="ch-item ch-img-1">
									
								<div class="ch-info">
											
									<p class="homepage-img"> <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?> </a></p>	
												
								</div>
											
							</div>
									
						</li>
								
					</ul>
							
				<?php } ?>				 
								
					<h2><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h2>
								
					<div class="entry-meta"></div><!-- .entry-meta -->	
						
					<div class="content"><?php the_content();?></div>

					<?php edit_post_link( __( 'Edit', 'seos-white' ), '', '' ); ?>
							
			</article>
				   
			<?php endwhile; endif; ?>

			<!-- End dynamic -->

		</div>
		
	</main>
	
<?php get_footer(); ?>
