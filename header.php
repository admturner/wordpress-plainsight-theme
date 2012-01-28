<?php
/**
 * The Plain Sight Header adapted from Twentyeleven.
 *
 * Displays all of the <head> section and everything up till <div id="content-overlord">
 * and displays the upper page-nav secondary navigation on non one-column template pages
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		
		wp_title( '|', true, 'right' );
		
		// Add the blog name.
		bloginfo( 'name' );
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	<div id="header-wrap">
		<?php get_template_part( 'lib/parts/header-meta' ); ?>
		<header id="masthead" role="banner">
			<hgroup id="branding">
				<a href="<?php bloginfo('url'); ?>" title="Home"><span class="title-hidden">Hidden</span> <span class="title-in">in</span> <span class="title-plainsight">Plain Sight</span></a>
			</hgroup><!-- #branding -->
			<nav role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>							
			</nav>
		</header><!-- #masthead -->
	</div><!-- #header-wrap -->

	<div id="content-overlord">
		<?php if ( is_page() && ! is_page_template( 'page-onecolumn.php' ) && ! is_page_template( 'page-narrowcolumn.php' ) && ! is_front_page() ) {
			get_template_part( 'lib/parts/page-nav' );
		} ?>