<?php
/**
 * The template for displaying Pages.
 *
 * This is the template that displays all Pages by default.
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 1.0
 */

get_header();

// Require users to be logged in
if ( ! is_user_logged_in() ) : ?>
	<div id="content" role="main">
		<h1>Please log in to continue.</h1>
		<?php 
		$login_form = wp_login_form( array( 'echo' => false ) );	
		$pattern = '%<label for="(.*)">(.*)</label>(.*\n.*)<input %';
		$replace = '<label class="assistive-text" for="$1">$2</label>$3<input placeholder="$2" ';
		echo preg_replace( $pattern, $replace, $login_form );
		?>
	</div><!-- #content -->

<?php else : // User is logged in, so lets continue ?>
	
	<div id="content" role="main">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
					<h1 class="pagetitle"><?php the_title(); ?></h1>
				</header>
				
				<?php the_content(); ?>
				
				<footer class="entry-meta">
					<p><?php edit_post_link( __( 'Edit (ID ' . get_the_ID() . ')', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?></p>
				</footer>		
			
			</article><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile; // End of the posts loop ?>
	</div><!-- #content -->
	
	<?php get_sidebar();
	
	get_template_part( '/lib/parts/page-nav' );
	
endif; // Now we don't care if the user is is not logged in

get_footer(); ?>