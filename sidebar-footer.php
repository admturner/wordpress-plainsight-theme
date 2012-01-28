<?php
/**
 * The Footer nav menu and widget areas.
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 2.0
 */
?>
	<div id="supplementary">
		<?php
		/* The footer widget area is triggered if any of the areas
		 * have widgets. So let's check that first.
		 * If none of the sidebars have widgets, then let's bail early.
		 */
			if ( ! is_active_sidebar( 'left-footer-widget-area' )
			&& ! is_active_sidebar( 'middle-footer-widget-area' )
			&& ! is_active_sidebar( 'right-footer-widget-area' )
			&& ! is_active_sidebar( 'sidebar-footer-widget-area' )
			)
				return;
		
		if ( has_nav_menu( 'footer-left' ) ) {
			?><div class="footer-widget-left footer-column"> 
				<?php wp_nav_menu( array( 'theme_location' => 'footer-left', 'container' => 'nav' ) ); ?>
			</div><!-- .footer-widget-left .footer-column --><?php 
		} elseif ( is_active_sidebar( 'left-footer-widget-area' ) ) {
			dynamic_sidebar( 'left-footer-widget-area' );
		}
		
		if ( is_active_sidebar( 'middle-footer-widget-area' ) ) {
			dynamic_sidebar( 'middle-footer-widget-area' );
		}
		
		if (is_active_sidebar( 'right-footer-widget-area' ) ) {
			dynamic_sidebar( 'right-footer-widget-area' );
		}
		
		if ( is_active_sidebar( 'sidebar-footer-widget-area' ) ) {
			dynamic_sidebar( 'sidebar-footer-widget-area' );
		} ?>
	</div><!-- #supplementary -->