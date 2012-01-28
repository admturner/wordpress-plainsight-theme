<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
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

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php endif; // Now we don't care if the user is is not logged in

get_footer(); ?>