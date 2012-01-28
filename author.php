<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
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

	<div id="content" class="one-column-full" role="main">
		
		<?php // First we need to figure out who the author is
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		?>
 		
		<header class="page-header">
			<h1 class="author pagetitle"><?php echo $curauth->display_name; ?><?php if ( $curauth->ID == get_current_user_id() ) { echo ' <a href="http://chnm.gmu.edu/hiddeninplainsight/wp-admin/profile.php">Edit your profile &raquo;</a>'; } ?></h1>
		</header>
		
		<?php if ( $curauth->description || $curauth->user_url || $curauth->aim || $curauth->yim || $curauth->jabber ) : 
			// If a user has filled out profile info, show a bio on their entries. ?>
			<div id="author-info" class="vcard">
				<h4><?php printf( __( 'About <span class="fn n">%s</span>', 'twentyeleven' ), $curauth->display_name ); ?></h4>
				<div id="author-description" class="third">
					<div id="author-avatar">
						<?php echo get_avatar( $curauth->user_email, apply_filters( 'twentyeleven_author_bio_avatar_size', 60 ) ); ?>
					</div><!-- #author-avatar -->
					<p class="note"><?php the_author_meta( 'description', $curauth->ID ); ?></p>
				</div><!-- #author-description -->
				<?php if ( $curauth->user_url || $curauth->aim || $curauth->yim || $curauth->jabber ) { 
					// Verify user has entered at least one of these add'l fields. Otherwise lets not bother. ?>
					<div id="author-extra" class="third">
						<?php if ( $curauth->user_url ) { ?>
							<p>Website: <span><a class="url" href="<?php echo esc_url($curauth->user_url); ?>"><?php echo esc_url($curauth->user_url); ?></a></span></p>
						<?php } if ( $curauth->aim ) { ?>
							<p>AIM: <span><?php echo $curauth->aim; ?></span></p>
						<?php } if ( $curauth->yim ) { ?>
							<p>Yahoo IM: <span><?php echo $curauth->yim; ?></span></p>
						<?php } if ( $curauth->jabber ) { ?>
							<p>Jabber/Google Talk: <span><?php echo $curauth->jabber; ?></span></p>
						<?php } ?>
					</div>
				<?php } ?>
			</div><!-- #entry-author-info .vcard -->
		<?php endif; ?>
		
		<?php if ( psn_get_notes_by_author_id( $curauth->ID ) ) : 
			// Call the Author Notes template part if the user has posted Notes
			
			echo '<h2>' . _( $curauth->display_name . "&rsquo;s Notes" ) . '</h2>';
			
			// We let this do the long heavy lifting
			get_template_part( 'lib/parts/content-author-notes' );
		
		else : 
			// If the author hasn't posted any Notes yet
			
			echo '<h2>' . _( $curauth->display_name . " hasn&rsquo;t posted any Notes yet." ) . '</h2>';
			
		endif; // End Notes loop ?>
		
		<?php if ( have_posts() ) : ?>

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>
			
			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>
			
			<?php twentyeleven_content_nav( 'nav-above' ); ?>
			
			<?php /* Now for the Posts Loop */ ?>
			
			
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() ); 
				?>
				
			<?php endwhile; ?>
			
			<?php twentyeleven_content_nav( 'nav-below' ); ?>
			
		<?php else : // Don't do anything for now; once we're using posts, uncomment the content in this section ?>
			
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<!-- <h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h2> -->
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					<!-- <p><?php _e( 'This author does not have any posts yet.', 'twentyeleven' ); ?></p> -->
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
			
		<?php endif; ?>
	</div><!-- #content -->
<?php get_sidebar(); ?>
<?php endif; // Now we don't care if users are logged in or not ?>
<?php get_footer(); ?>