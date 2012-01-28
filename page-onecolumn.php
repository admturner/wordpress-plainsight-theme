<?php
/**
 * Template Name: Full-width, no sidebar
 * 
 * A custom page template, full-width, no sidebar.
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 1.0
 */

get_header(); ?>

	<div id="content" class="one-column-full" role="main">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php if ( is_page( 'modules' ) ) : ?>
					<header class="entry-header">
						<h1 class="pagetitle"><?php the_title(); ?></h1>
					</header>
					
					<div id="entry-content">
						<?php 
						the_content();
						
						get_template_part( 'lib/parts/modules-nav' );
						?>
					</div>
					
				<?php else : ?>
					<header class="entry-header">
						<h1 class="pagetitle"><?php the_title(); ?></h1>
					</header>
					
					<div id="entry-content">
						<?php the_content(); ?>
					</div>
							
				<?php endif; // End page checking ?>
	
				<footer class="entry-meta">
					<p><?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?></p>
				</footer>
				
			</article><!-- #post-<?php the_ID(); ?> -->
			
		<?php endwhile; // End of the posts loop ?>
	</div><!-- #content -->

<?php get_footer(); ?>