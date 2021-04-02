<?php
/*
* Template Name:Home page
*/
?>
<?php get_header(); ?>

	<main id="main">

		<section>

<!-- Start dynamic -->

		<?php if(have_posts()): while (have_posts()): the_post(); ?>
		
		   <article id="post-<?php the_ID(); ?> <?php post_class(); ?>>       

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
				
					<?php the_date('Y m-d', '<p class="white-date">', '</p>'); ?>	
					
					<h2><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h2>
					
					<div class="entry-meta">
					
						<i class="fa fa-user"></i> <?php the_author() ?> 
						
					</div><!-- .entry-meta -->		
			
					<div class="ex-right"><?php the_excerpt(); ?> </div>

					<?php edit_post_link( __( 'Edit', 'seos-white' ), '', '' ); ?>
					
		   </article>
		   
		<?php endwhile; endif;?>

<!-- End dynamic -->

		</section>
		
		<?php get_sidebar(); ?>
		
	</main>
	
<?php get_footer(); ?>