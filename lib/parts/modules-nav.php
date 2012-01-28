<?php
/**
 * The template part for displaying the Modules nav gallery
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
 */
if ( has_nav_menu( 'secondary-mod' ) ) {
	wp_nav_menu( array( 
		'theme_location' => 'secondary-mod',
		'container' => 'nav',
		'container_id' => 'above-thumb-container',
		'menu_class' => 'above-thumb'
	) );
}

if ( is_active_sidebar( 'frontpage-widget-area' ) ) {
	dynamic_sidebar( 'frontpage-widget-area' );
}

if ( is_front_page() ) {
	if ( ! is_main_site() ) {
		$module_nav_menu = wp_nav_menu( array( 
			'theme_location' 	=> 'secondary',
			'container'			=> 'nav',
			'container_id'		=> 'thumb-container',
			'menu_class'		=> 'thumb',
			'link_after'		=> '<img src="http://chnm.gmu.edu/hiddeninplainsight/wp-content/uploads/thumbs/cup.png" alt="" />',
			'echo'				=> false,
			'walker'				=> new Last_Visited_Walker
			) ); 
		// filter menu results to insert correct image
		$pattern = '/("\>)(\d+)(<img .*?)cup.png/';
		$replace = '$1$3$2.jpg';
		echo preg_replace($pattern, $replace, $module_nav_menu);
		echo '<h5>Hover over an image to see more. Click to go to the module.</h5>';
	} else {
		// On Main Front Page remove links
		$module_nav_menu = wp_nav_menu( array( 
			'theme_location' 	=> 'secondary',
			'container'			=> 'nav',
			'container_id'		=> 'thumb-container',
			'menu_class'		=> 'thumb',
			'link_after'		=> '<img src="http://chnm.gmu.edu/hiddeninplainsight/wp-content/uploads/thumbs/cup.png" alt="" />',
			'echo'				=> false
			) ); 
		// filter menu results to insert correct image
		$pattern = array( '/("\>)(\d+)(<img .*?)cup.png/', '/(<a) href=".*?"(>)/' );
		$replace = array( '$1$3$2.jpg', '$1$2' );
		echo preg_replace($pattern, $replace, $module_nav_menu);
	}
} else {
	$module_nav_menu = wp_nav_menu( array( 
		'theme_location' 	=> 'secondary',
		'container'			=> 'nav',
		'container_id'		=> 'module-splash-nav',
		'link_after'		=> '<img src="http://chnm.gmu.edu/hiddeninplainsight/wp-content/uploads/thumbs/cup.png" alt="" />',
		'echo'				=> false,
		'walker'				=> new Last_Visited_Walker
		) );
	// filter menu results to insert correct image
	$pattern = '/("\>)(\d+)(<img .*?)cup.png/';
	$replace = '$1$3$2.jpg';
	echo preg_replace($pattern, $replace, $module_nav_menu);
}
?>