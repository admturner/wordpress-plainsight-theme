<?php
/**
 * Plain Sight functions and definitions.
 *
 * Sets up the theme and provides some helper functions.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
 */

/**
 * Register and enqueue styles and scripts in the header
 *
 * @since Plain Sight 0.2.0
 */
function plainsight_styles_scripts_fn() {
	wp_register_style( 'colorbox_style', get_bloginfo('stylesheet_directory') . '/lib/css/colorbox/colorbox.css' );
	wp_enqueue_style( 'colorbox_style' );
	
	wp_register_script( 'colorbox', get_bloginfo('stylesheet_directory') . '/lib/js/jquery/jquery.colorbox-min.js', '', '', true );
	wp_register_script( 'hoverintent', get_bloginfo('stylesheet_directory') . '/lib/js/jquery/jquery.hoverIntent.minified.js', '', '', true );
	wp_register_script( 'hipscript', get_bloginfo('stylesheet_directory') . '/lib/js/jquery/hipscript.min.js', array('jquery', 'colorbox', 'hoverintent'), '', true );
	wp_enqueue_script( 'hipscript' );
}
add_action( 'wp_print_styles', 'plainsight_styles_scripts_fn' );

/**
 * Register navigation menus in 6 locations
 *
 * @since Plain Sight 0.2.0
 */
register_nav_menus( array(
	'primary' => __( 'Primary Navigation' ),
	'secondary' => __( 'Module Navigation' ),
	'secondary-mod' => __('Above Module Navigation' ),
	'footer-left' => __( 'Footer Left' ),
	'footer-middle' => __( 'Footer Middle' ),
	'footer-right' => __( 'Footer Right' ),
	'footer-sidebar' => __( 'Footer Sidebar' )
) );
/**
 * Register widgetized areas, then unregister defaults later
 *
 * @since Plain Sight 2.0
 * @uses register_sidebar
 */
function plainsight_widgets_init() {	
	// Header widget 1, located in the header sidebar
	register_sidebar( array(
		'name' => __( 'Header Widget Area', 'twentyten' ),
		'id' => 'header-widget-area',
		'description' => __( 'Located in header meta area above masthead', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Content widget 1, located on the front page below the_content()
	register_sidebar( array(
		'name' => __( 'Front Page Widget Area', 'twentyten' ),
		'id' => 'frontpage-widget-area',
		'description' => __( 'Below the content and above the front page nav gallery menu', 'twentyten' ),
		'before_widget' => '<aside id="%1$s" class="frontpage-widget widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 1, on the initial hypothesis pages (p. 1)
	register_sidebar( array(
		'name' => __( 'Initial Hypothesis Widget Area', 'twentyten' ),
		'id' => 'hypothesis-widget-area',
		'description' => __( 'Widget area for the initial hypothesis pages', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div><!-- #%1$s -->',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 2, on the 'Behind the object' pages (p. 2)
	register_sidebar( array(
		'name' => __( 'Behind the Object Widget Area', 'twentyten' ),
		'id' => 'object-widget-area',
		'description' => __( 'Widget area for the Behind the Object pages', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 2.1, on the 'Article' pages (p. 2.1)
	register_sidebar( array(
		'name' => __( 'Article Widget Area', 'twentyten' ),
		'id' => 'article-widget-area',
		'description' => __( 'Widget area for the Article pages', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 3, on the Quiz pages (p. 3)
	register_sidebar( array(
		'name' => __( 'Quiz Page Widget Area', 'twentyten' ),
		'id' => 'quiz-widget-area',
		'description' => __( 'Widget area for the Quiz pages', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 4, on the Rethink pages (p. 4)
	register_sidebar( array(
		'name' => __( 'Rethink Page Widget Area', 'twentyten' ),
		'id' => 'rethink-widget-area',
		'description' => __( 'Widget area for the Rethink pages', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 5, on the Connections pages (p. 5)
	register_sidebar( array(
		'name' => __( 'Connections Page Widget Area', 'twentyten' ),
		'id' => 'connections-widget-area',
		'description' => __( 'Widget area for the Connections pages. Remember to change the page slug to just "connections"', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 6, on Wrap-up pages (p. 6)
	register_sidebar( array(
		'name' => __( 'Wrap-up Sidebar Widget Area', 'twentyten' ),
		'id' => 'wrapup-sidebar-widget-area',
		'description' => __( 'Widget area for all wrap-up pages. Remember to change the page slug to just "wrap-up"', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Sidebar widget 7, on generic pages
	register_sidebar( array(
		'name' => __( 'Generic Sidebar Widget Area', 'twentyten' ),
		'id' => 'generic-sidebar-widget-area',
		'description' => __( 'Widget area for all generic pages', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	// Footer widget 1, located in the left footer
	register_sidebar( array(
		'name' => __( 'Left Footer Widget Area', 'twentyten' ),
		'id' => 'left-footer-widget-area',
		'description' => __( 'The left footer widget area; displays if there is no nav menu there', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s footer-widget-left footer-column">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	// Footer widget 1, located in the middle footer
	register_sidebar( array(
		'name' => __( 'Middle Footer Widget Area', 'twentyten' ),
		'id' => 'middle-footer-widget-area',
		'description' => __( 'The middle footer widget area', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s footer-widget-midleft footer-column">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	// Footer widget 2, located in the right footer
	register_sidebar( array(
		'name' => __( 'Right Footer Widget Area', 'twentyten' ),
		'id' => 'right-footer-widget-area',
		'description' => __( 'The right footer widget area', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s footer-widget-midright">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	// Footer widget 3, located in the footer sidebar (sidebar-footer.php)
	register_sidebar( array(
		'name' => __( 'Sidebar Footer Widget Area', 'twentyten' ),
		'id' => 'sidebar-footer-widget-area',
		'description' => __( 'The sidebar footer widget area', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s footer-widget-right footer-column">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'plainsight_widgets_init' );

function plainsight_unregister_widgets() {
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );
	unregister_sidebar( 'sidebar-4' );
	unregister_sidebar( 'sidebar-5' );
}
add_action( 'widgets_init', 'plainsight_unregister_widgets', 11 );

/**
 * Set post thumbnail (featured image) sizes
 */
set_post_thumbnail_size( 54, 54, true ); // Normal post thumbnails
add_image_size( 'featured-image', 528, 330 ); // Featured image size

/**
 * Change default Comment Form title
 *
 * Default is "Leave a Reply"
 *
 * @since 2.0.0
 */
function ps_new_comment_form_title( $defaults ) {
	$defaults['title_reply'] = 'Continue the Discussion';
	$defaults['title_reply_to'] = 'Continue the Discussion %s';
	return $defaults;
}
add_filter('comment_form_defaults', 'ps_new_comment_form_title');

/**
 * Traverse page tree to get parent post ID
 */
function is_tree($pid) {	// $pid = The ID of the page we're looking for pages underneath
	global $post;				// load details about this page

	if ( is_page($pid) )
      return true;			// we're at the page or at a sub page

	$anc = get_post_ancestors( $post->ID );
	foreach ( $anc as $ancestor ) {
		if( is_page() && $ancestor == $pid ) {
			return true;
		}
	}
        return false;		// we aren't at the page, and the page is not an ancestor
}

/**
 * Hide the universal admin bar new to WP3.1
 */
function please_disable_admin_bar() {
	if ( !current_user_can('delete_others_posts') ) {
		add_filter( 'show_admin_bar', '__return_false' );
		//add_action( 'admin_print_scripts-profile.php', 'yoast_hide_admin_bar_settings' );
	}
}
add_action( 'init', 'please_disable_admin_bar' , 9 );

/**
 * Add a filter to the WP autoembed to prevent overlapping content
 * 
 * This filter adds the "wmode" attribute to the embed src tag and sets
 * its value to "opaque" to prevent its being placed effectively on top
 * of all other content on the page, regardless of z-index.
 * 
 * @see http://mehigh.biz/wordpress/adding-wmode-transparent-to-wordpress-3-media-embeds.html
 * @since 0.8.0
 */
function add_video_wmode_opaque( $html, $url, $attr ) {
	if ( strpos($html, "<embed src=" ) !== false ) {
		$html = str_replace('allowfullscreen="true"', 'allowfullscreen="true" wmode="opaque"', $html);
	} else {
		continue;
	}
	/*if ( strpos($html, "<embed src=" ) !== false ) {
		$html = str_replace('?version', '?enablejsapi=1&version=3', $html);
	} else {
		continue;
	}*/
	return $html;
}
add_filter('embed_oembed_html', 'add_video_wmode_opaque', 10, 3);

/**
 * Add instruction field to Profile for creating avatar
 *
 * @hook 
 * @since 2.0
 */
function ps_avatar_howto_profile_field() {
	?><h3>Avatar</h3>
	<?php echo get_avatar( get_current_user_id(), 50 ); ?> <span class="description">Your current avatar.</span>
	<p>An avatar is an image that appears beside your name when you do things like post on the site.<br />
	Avatars help identify your posts and notes. Your current avatar is the image above.</p>
	<p><strong>Want a new avatar?</strong> This site (like other WordPress-powered sites) uses Gravatar for its avatars.<br />
	Simply <a href="http://gravatar.com/">visit Gravatar's website</a> and follow their instructions. Be sure to give them the same email address you use here.</p><?php 
}
add_action( 'profile_personal_options', 'ps_avatar_howto_profile_field' );

/**
 * Redirect Subscribers to their author page after updating profile
 *
 * Hooks into 'profile_update' action and then conditionally redirects
 * Subscribers only to their author page at ../blog/author/username/
 *
 * @since 2.0
 * @uses do_action('personal_options_update', $user_id);
 */
function subscriber_profile_redirect( $user_id ) {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_redirect( get_author_posts_url( $user_id ) );
		exit;
	}
}
add_action( 'profile_update', 'subscriber_profile_redirect', 12 );

/**
 * Create the module gallery navigation
 *
 * @since 1.0
 */
function ps_module_nav_menu() {
	$module_nav_menu = wp_nav_menu( array( 
		'theme_location' 	=> 'secondary',
		'container'			=> 'nav',
		'container_id'		=> 'module-splash-nav',
		'link_after'		=> '<img src="http://chnm.gmu.edu/hiddeninplainsight/wp-content/uploads/thumbs/cup.png" alt="" />',
		'echo'				=> false
		) ); 
	// filter menu results to insert correct image
	$pattern = '/("\>)(\d+)(<img .*?)cup.png/';
	$replace = '$1$3$2.jpg';
	
	echo preg_replace($pattern, $replace, $module_nav_menu);
}

/**
 * A shortcode to manage module slideshow page content
 * 
 * Using the shortcode [ps_module_slide]some content[/ps_module_slide]
 * in page content will output the following, activating the slideshow
 * effect.
 * 
 * @since 0.2.0
 */
function plainsight_slideshow_shortcode_fn( $args, $content = null ) {
	global $post;
	extract(shortcode_atts(array(
		'slide_number' => (int) '1',
		'div_class' => '',
		'a_class' => 'colorbox',
		'href' => '',
		'a_content' => '',
		'a_name' => '',
		'mod_num' => get_post_meta($post->ID, 'module-number', true),
		'img_title' => '',
		'title' => '',
		'title_wrap' => 'h2',
		'uploads_dir' => 'modules/'
	), $args));
	
	if ( empty($a_content) ) {
		$a_content = '<img src="' . network_site_url( '/wp-content/uploads/' ) . $uploads_dir . $mod_num . '/slide-' . $slide_number .'_640x395.jpg" alt="" /><span class="slide-helper">Click for more</span>';
	}
	if ( empty($href) ) {
		$href = network_site_url( '/wp-content/uploads/' ) . $uploads_dir . $mod_num . '/slide-' . $slide_number .'_full.jpg';
	}
	if ( ! empty($a_name) ) {
		$a_name_att = 'name="' . $a_name . '" ';
	}
	
	$the_content = '<div id="slide-' . $slide_number . '" class="' . $div_class . '">
						<a class="' . esc_attr( $a_class ) . '"' . $a_name_att . ' href="' . esc_url( $href ) . '" title="' . esc_attr( $img_title ) . '">' . $a_content . '</a>
						<' . $title_wrap . '>' . wptexturize( $title ) . '</' . $title_wrap . '>' . wpautop( $content ) . '</div>';
	
	return do_shortcode( $the_content );
}
add_shortcode( 'ps_module_slide', 'plainsight_slideshow_shortcode_fn' );

/**
 * A filter that allows shortcodes in widgets
 *
 * @since 0.2.0
 */
add_filter('widget_text', 'do_shortcode');

/**
 * A shortcode to do conditional tests in content/widgets
 *
 * @since 0.8.0
 * @uses is_page()
 * @uses is_user_logged_in()
 * @todo Add ability to test for other things
 */
function ps_conditional_shortcode_fn( $args, $content = null ) {
	global $wpdb;
	extract(shortcode_atts(array(
		'query' => 'is_page',
		'value' => '',
		'untrue' => false
	), $args));
	
	ob_start();
		
		$value = explode(", ", $value);
		
		if ( $untrue == true ) {
			if ( ! $query( $value ) ) {
				echo $content;
			}
		} else {
			if ( $query( $value ) ) {
				echo $content;
			}
		}
		$output = ob_get_contents();
	ob_end_clean();
	
	return apply_filters( 'the_content', $output );
}
add_shortcode( 'ps_if', 'ps_conditional_shortcode_fn' );

/**
 * Get the primary source content from their WP pages
 * 
 * Gathers and displays the_content() of selected WP pages. This
 * is for use as inline content for ColorBoxs on the "Behind the
 * {object}" pages.
 * 
 * @since 0.2.0
 * @uses get_page()
 */
function get_ps_primary_source( $args ) {
	$defaults = array(
		'page_id' => '',
		'page_title' => '',
		'new_loop' => false
	);
	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
	
	// If no page title or ID is supplied, end now
	if ( empty( $page_title ) && empty( $page_id ) ) {
		return;
	}
	
	if ( $new_loop == false ) {
		// Don't open a new WP Query, stick with get_page_by_title()
		$page_data = get_page_by_title( $page_title );
		
		// Override get_page_by_title() if requested page ID is present
		if ( ! empty( $page_id ) ) {
			$page_data = get_page( $page_id );
		}
		
		// Run WP standard content filter [wpautop(), do_shortcode(), etc.]
		$output = apply_filters( 'the_content', $page_data->post_content );
	
		echo $output;
		
	} else {
		// Need a little more, so start up a new WP Query
		$the_query = new WP_Query( 'page_id=671' );
		
		while ( $the_query->have_posts() ) : $the_query->the_post();			
			the_content();
		endwhile;

		wp_reset_postdata();
	}
}

/**
 * A shortcode for displaying the primary source content
 *
 * As a shortcode, it pulls content from other WP pages by title.
 * Feed it a title in the content section of one page, and it'll
 * display the content from the other.
 * 
 * @since 0.2.0
 * @uses get_ps_primary_source( $args )
 */
function ps_sources_shortcode_fn( $args ) {
	extract(shortcode_atts(array(
		'page_id' => '',
		'page_title' => '',
		'new_loop' => false
	), $args));
	
	ob_start();
		get_ps_primary_source( $args );
		$output = ob_get_contents();
	ob_end_clean();
	
	return do_shortcode( $output );
}
add_shortcode( 'ps_source', 'ps_sources_shortcode_fn' );

/**
 * Track last page logged-in users visited within each module
 *
 * @since 0.8.0
 */
function ps_last_page_visited() {
	global $current_blog, $current_user, $post;
	get_currentuserinfo();
	
	if ( ! is_page_template( 'page-onecolumn.php' ) 
	  && ! is_page_template( 'page-narrowcolumn.php' ) 
	  && ! is_front_page() ) {	
		$module_page = get_page_by_title( 'Modules' );
		$pages = get_pages( array( 'child_of' => $module_page->ID, 'parent' => $module_page->ID, 'hierarchical' => '0' ) );
		
		foreach ( $pages as $page ) {
			$mpages = get_pages( array( 'child_of' => $page->ID ) );
			if ( is_page( array( 
				$page->ID,
				$mpages[0]->ID, 
				$mpages[1]->ID, 
				$mpages[2]->ID, 
				$mpages[3]->ID, 
				$mpages[4]->ID, 
				$mpages[5]->ID, 
				$mpages[6]->ID, 
				$mpages[7]->ID,
				$mpages[8]->ID,
				$mpages[9]->ID,
				$mpages[10]->ID 
			) ) ) {
				$user_id = get_current_user_id();
				$key = $current_blog->blog_id . '_module_url_' . $page->ID;
				$value = esc_url( $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] );
				update_user_meta($user_id, $key, $value);
					break;
			} else {
					continue;
			}
		}
	}
}
add_action( 'wp_footer', 'ps_last_page_visited' );

/**
 * Modify the nav menu with user meta field for last visited page
 *
 * Replacement for the native Walker, using user meta fields where
 * the nav item's rel="" value matches the number of the desired 
 * meta key in the format module-id-{int}
 * 
 * @since 0.8.0
 * @see	http://wordpress.stackexchange.com/q/14037/
 */
class Last_Visited_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query, $current_user, $current_blog;		
		get_currentuserinfo();
		$user_id = get_current_user_id();

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		// Dishwasher
		if ( $item->xfn == 'module-id-240' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Dishwasher in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 257 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_240', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_240', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Dress
		if ( $item->xfn == 'module-id-577' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Dress in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 589 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_577', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_577', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Mail
		if ( $item->xfn == 'module-id-323' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Mail in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 334 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_323', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_323', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Nail
		if ( $item->xfn == 'module-id-10' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Nail in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 70 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_10', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_10', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Porcelain
		if ( $item->xfn == 'module-id-308' ) {
			$note = psn_get_notes_by_meta( 'Connections: Porcelain in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 321 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_308', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_308', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Reaper
		if ( $item->xfn == 'module-id-275' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Reaper in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 287 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_275', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_275', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Shirtwaist
		if ( $item->xfn == 'module-id-452' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Shirtwaist in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 467 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_452', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_452', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Shoe
		if ( $item->xfn == 'module-id-13' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Shoe in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 89 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_13', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_13', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Shoe
		if ( $item->xfn == 'module-id-218' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Shoe in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 89 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_218', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_218', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Tire
		if ( $item->xfn == 'module-id-290' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Tire in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 301 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_290', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_290', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		// Transistor
		if ( $item->xfn == 'module-id-601' ) {
			$note = psn_get_notes_by_meta( 'Connections: The Transistor in History', $user_id );
			if ( !empty($note) ) {
				$jump_url = '<a class="jump-url" href="' . esc_attr( get_permalink( 611 ) ) . '">Discussion &raquo;</a>';
			} else {
				$jump_url = get_user_meta( $user_id, $current_blog->blog_id . '_module_url_601', true ) != '' ? '<a class="jump-url" href="' . esc_attr( get_user_meta( $user_id, $current_blog->blog_id . '_module_url_601', true ) ) . '">Continue working &raquo;</a>' : '';
			}
		}
		
		$description = ! empty( $item->description ) ? ' <span>' . esc_attr( $item->description ) . '</span>' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= $description;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$item_output .= $jump_url;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * A shortcode for displaying user meta values by calling their key
 *
 * @since 0.2.0
 * @uses get_user_meta( $args )
 */
function ps_user_meta_shortcode_fn( $args ) {
	global $current_user;
	extract(shortcode_atts(array(
		'user_id'   => '',
		'key'       => '',
		'backup_id' => '',
		'single'    => true
	), $args));
	
	get_currentuserinfo();
	$user_id = ! empty( $user_id ) ? $user_id : get_current_user_id();
	$key = ! empty( $key ) ? $key : 'last_name';
	
	if ( get_user_meta ( $user_id, $key, true ) != '' ) {
		$output = esc_attr( get_user_meta( $user_id, $key, $single ) );
	} else {
		$output = esc_attr( get_permalink( $backup_id ) );
	}
	
	return $output;
}
add_shortcode( 'ps_user_meta', 'ps_user_meta_shortcode_fn' );

/**
 * Store WP user meta data to record visited to "Behind the {object} pages"
 *
 * We want to check if a user has visited a specific page before, so
 * we'll save the visit date in WordPress' user meta with.
 * 
 * @since 0.8.0
 * @uses update_user_meta()
 */
function ps_resource_drawer_usermeta_fn() {
	global $current_user, $post;
	get_currentuserinfo();
		
	// We only want these cookies if its a "Behind the {object}" page
	if ( is_page( 'what-is-historical-thinking' )
	  || is_page( 'behind-the-fence' )
	  || is_page( 'behind-the-moccasins' ) 
	  || is_page( 'behind-the-hoe' ) 
	  || is_page( 'behind-the-coat' ) 
	  || is_page( 'behind-the-song' )
	  || is_page( 'behind-the-bus' ) ) {
		
		$user_id = get_current_user_id();
		$key = 'has_visited_' . $post->post_name;
		$value = date('Y-m-d_H:i');
		
		update_user_meta($user_id, $key, $value);
		// delete_user_meta($user_id, $key);
	}
}
add_action( 'wp_footer', 'ps_resource_drawer_usermeta_fn' );

/**
 * A tool for displaying a stream of recent Notes
 * 
 * Call this function from a WordPress template file using the
 * format: ps_recent_notes_stream( array( [parameters here] ) );
 * The note_pages array is required. Input the page IDs or Titles
 * of each page you want to pull the recent Notes from. This should
 * be in the format: array( #, #, #, etc.). So if I wanted the recent
 * Notes from pages 4, 15, About, and 213, I would use:
 * ps_recent_notes_stream( array( 'note_pages' => array( 4, 15, 'About', 213 )) );
 * 
 * @uses psn_get_notes_by_meta()
 * @since Plain Sight 2.0
 */
function ps_recent_notes_stream( $args ) {
	global $current_user;
	
	$defaults = array(
		'wrap_class' => 'recent-notes-stream',
		'heading' => 'Recent Classroom Ideas',
		'author_id' => $current_user->ID,
		'exclude_auth' => '',
		'empty_msg' => 'Check back after completing a module.',
		'howmany' => 3,
		'note_pages' => array(),
		'include_pages' => array()
	);
	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
	
	// If no page titles or IDs are supplied, end now
	if ( empty( $note_pages ) ) {
		return;
	} 
	
	// Classes can be added / removed when the function is called ?>
	<div class="<?php echo $wrap_class; ?>">
		<h3><?php _e( $heading ); // this is the heading, which can be changed when the function is called ?></h3>
		
		<?php foreach ( $note_pages as $page ) : 
			// First check if user supplied a title rather than an ID number for $note_page 
			if ( ! is_int( $page ) ) {
				// using page title, so let's get the ID from it
				$page_data = get_page_by_title( $page );
				$page = $page_data->ID;
			}
			
			// Check to see if user has completed note for supplied page
			$note_data[] = psn_get_notes_by_meta( $page, $author_id, 1 );
			
		endforeach;
		
		// Create the $include_pages array to include recent notes only from completed modules
		foreach ( $note_data as $data ) {
			if ( ! empty( $data ) ) {
				foreach ( $data as $d )
					$include_pages[] = $d->notes_parentPostID;
			}
		}
		
		if ( ! empty( $include_pages ) ) {
			// This function is defined by the plugin at: /wp-content/plugins/plainsight-notes/plainsightnotes-public.php
			psn_recent_notes(array( 'howmany' => $howmany, 'excerpt' => 1, 'include_pages' => $include_pages, 'order' => 'DESC' ));
		} else {
			echo '<p>No classroom ideas posted yet. Try checking back after completing a module.</p>';
		} ?>
		
		<p><a href="<?php bloginfo('url'); ?>/notes/">See all classroom notes &gt;&gt;</a></p>
	</div><!-- .<?php echo $wrap_class; ?> --><?php
}
?>