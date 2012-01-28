<?php
/**
 * The content sidebar.
 *
 * Displays different things depending on the type of page we're on.
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 2.0
 */
?>
<div id="content-sidebar" class="widget-area" role="complementary">
	<?php if ( is_page() ) : ?>
		
		<aside id="content-sidebar-section" class="widget-area" role="complementary">
			<?php // Display different widgets for each module page
			if ( is_page( 'What story is hidden in this object?' ) ) {
				// An 'initial hypothesis' page (Module Page 1)
				if ( is_active_sidebar( 'hypothesis-widget-area' ) ) {
					dynamic_sidebar( 'hypothesis-widget-area' );
				}
			} elseif ( is_page( 'inside-the-dishwasher' )
					  || is_page( 'behind-the-dress' )
					  || is_page( 'inside-the-mail' )
					  || is_page( 'behind-the-nail' )
					  || is_page( 'inside-colonial-porcelain' )
					  || is_page( 'behind-the-reaper' )
					  || is_page( 'behind-the-shirtwaist' )
					  || is_page( 'inside-the-boot' )
					  || is_page( 'behind-the-tire' )
					  || is_page( 'behind-the-transistor' ) ) { 
				// A 'behind the object' page (Module Page 2)
				if ( is_active_sidebar( 'object-widget-area' ) ) {
					dynamic_sidebar( 'object-widget-area' );
				}
				
				/**
				 * A snippet of code to test if a user has been to one of
				 * the "Behind the {object}" pages before
				 */
					$user_id = get_current_user_id();
					$key = 'has_visited_' . $post->post_name;
					$slide_toggle_class = get_user_meta ( $user_id, $key, true ) != '' ? ' class="allow-pagenav-next"' : ' class="hide-pagenav-next"'; 
				
				?><nav id="slideshow-nav">
					<ul id="slide-toggler" <?php echo $slide_toggle_class; ?>>
						<?php $img_thumb_url = network_site_url( '/wp-content/uploads/modules/' ) . get_post_meta($post->ID, 'module-number', true); ?>
						<li class="current_page_item"><a href="#slide-1"><img src="<?php echo $img_thumb_url; ?>/slide-1_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-2"><img src="<?php echo $img_thumb_url; ?>/slide-2_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-3"><img src="<?php echo $img_thumb_url; ?>/slide-3_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-4"><img src="<?php echo $img_thumb_url; ?>/slide-4_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-5"><img src="<?php echo $img_thumb_url; ?>/slide-5_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-6"><img src="<?php echo $img_thumb_url; ?>/slide-6_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-7"><img src="<?php echo $img_thumb_url; ?>/slide-7_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-8"><img src="<?php echo $img_thumb_url; ?>/slide-8_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-9"><img src="<?php echo $img_thumb_url; ?>/slide-9_100x100.jpg" alt="" /></a></li>
						<li><a href="#slide-10"><img src="<?php echo $img_thumb_url; ?>/slide-10_100x100.jpg" alt="" /></a></li>
						<?php if ( ! get_post_meta($post->ID, 'no 11th slide', true ) ) { ?>
							<li><a href="#slide-11"><img src="<?php echo $img_thumb_url; ?>/slide-11_100x100.jpg" alt="" /></a></li>
						<?php } ?>
						<?php if ( ! get_post_meta($post->ID, 'no 12th slide', true ) ) { ?>
							<li><a href="#slide-12"><img src="<?php echo $img_thumb_url; ?>/slide-12_100x100.jpg" alt="" /></a></li>
						<?php } ?>
					</ul>
				</nav><!-- #slideshow-nav --><?php
			
			} elseif ( is_page( 'article' ) ) {
				// When the Page is an Article page (Credit version)
				if ( is_active_sidebar( 'article-widget-area' ) )
					dynamic_sidebar( 'article-widget-area' );
			} elseif ( is_page( 'quiz' ) ) {
				// When the Page is a Quiz page (Module Page 3)
				if ( is_active_sidebar( 'quiz-widget-area' ) )
					dynamic_sidebar( 'quiz-widget-area' );
			} elseif ( is_page( 'Rethink' ) ) {
				// When the Page is a Rethink page (Module Page 4)
				if ( is_active_sidebar( 'rethink-widget-area' ) )
					dynamic_sidebar( 'rethink-widget-area' );
			} elseif ( is_page( 'connections' ) ) {
				// When the Page is a Connections page (Module Page 5)
				if ( is_active_sidebar( 'connections-widget-area' ) )
					dynamic_sidebar( 'connections-widget-area' );
			} elseif ( is_page( 'wrap-up' ) ) {
				// When the Page is a Wrap-up page (Module Page 6)
				if ( is_active_sidebar( 'wrapup-sidebar-widget-area' ) )
					dynamic_sidebar( 'wrapup-sidebar-widget-area' );
				comments_template( '', true );
			} else {
				// When any other page
				if ( is_active_sidebar( 'generic-sidebar-widget-area' ) )
					dynamic_sidebar( 'generic-sidebar-widget-area' );
			} ?>
		</aside><!-- #content-sidebar-section .widget-area -->
		
	<?php // this will be the elseif section for Single posts, Archive pages, etc. ?>
	
	<?php endif; // Finished is_page() || is_single() ?>
</div><!-- #content-sidebar -->