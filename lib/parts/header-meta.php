<?php 
/**
 * The header meta area
 *
 * Provides the header widget area and the user login info
 * used in the header.php file
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 1.0
 */
?>

<div class="header-utility">
	<div class="header-utility-wrap">
		<div class="header-widget-area">
			<?php if ( is_active_sidebar( 'header-widget-area' ) ) {
						dynamic_sidebar( 'header-widget-area' );
			} ?>
		</div><!-- .header-widget-area -->
		<ul>
			<li>
			<?php if ( is_user_logged_in() ) {
				global $current_user; 
				get_currentuserinfo();
				echo 'Hi ' . $current_user->display_name . ' | '; wp_loginout( home_url() ); 
			} ?>
			</li>
		</ul>
	</div><!-- .header-utility-wrap -->
</div><!-- .header-utility -->