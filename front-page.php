<?php
/**
 * Template for displaying the front page
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
 */

get_header(); ?>

	<div id="content" class="one-column-full" role="main">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
				<header class="entry-header">
					<h1 class="pagetitle">Explore U.S. history through everyday objects<?php if ( ! is_main_site() ) echo ' <a class="entry-header-meta" href="' . esc_attr( get_bloginfo( 'url' ) ) . '/about/using-the-site/">Using the site &raquo; </a>'; ?></h1>
				</header>
				
				<div id="entry-content">
					<?php get_template_part( 'lib/parts/modules-nav' ); ?>
					
					<?php if ( ! is_main_site() && is_user_logged_in() ) {
						// The following functions are defined in functions.php
						ps_recent_notes_stream( array( 
							'note_pages' => array( 
								'Connections: Porcelain in History', 'Connections: The Dishwasher in History', 'Connections: The Dress in History', 'Connections: The Mail in History', 'Connections: The Nail in History', 'Connections: The Reaper in History', 'Connections: The Shirtwaist in History', 'Connections: The Shoe in History', 'Connections: The Tire in History', 'Connections: The Transistor in History'
							),
							'heading' => 'Classroom Ideas: What Others are Saying'
						) );
					} ?>
				</div><!-- #entry-content -->
				
				<div id="info-sidebar" role="complementary">				
					<?php get_template_part( 'lib/parts/front-page-sidebar' ); ?>
				</div><!-- #info-sidebar -->
				
				<footer class="entry-meta">
					<p><?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?></p>
				</footer>
			</article><!-- #post-<?php the_ID(); ?> -->
			
		<?php endwhile; // End of the posts loop ?>
	</div><!-- #content -->

<?php get_footer(); ?>