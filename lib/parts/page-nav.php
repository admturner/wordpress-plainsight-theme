<?php
/**
 * The template part for displaying the page navigation link
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 1.0
 */ ?>
<nav class="pagenav"><?php 
	$pagelist = get_pages( 'sort_column=menu_order&sort_order=asc' );
	$pages = array();
	
	foreach ( $pagelist as $page ) {
		$pages[] += $page->ID;
	}
	
	$current = array_search( $post->ID, $pages );
	$prevID = $pages[$current-1];
	$nextID = $pages[$current+1];
	
	if ( ! empty( $prevID ) && ! is_page( 'What story is hidden in this object?' ) && ! is_page( 'what-does-it-mean-to-think-historically' ) && ! is_page( 'notes' ) ) { ?>
		<a class="pagenav-prev expand" href="<?php echo get_permalink( $prevID ); ?>" title="<?php echo get_the_title( $prevID ); ?>">&larr; Previous page<span>: &ldquo;<?php echo get_the_title($prevID); ?>&rdquo;</span></a>
	<?php }
	
	if ( ! empty( $nextID ) ) {
		if ( ! is_page( 'wrap-up' ) ) : 
			?><a class="<?php if ( current_user_can( edit_others_posts ) ) { echo 'pagenav-next-override'; } else { echo 'pagenav-next'; } ?> expand" href="<?php echo esc_url( get_permalink( $nextID ) ); ?>" title="<?php echo esc_attr( get_the_title( $nextID ) ); ?>">Next page<span>: &ldquo;<?php echo get_the_title( $nextID ); ?>&rdquo;</span> &rarr;</a><?php 
		else : 
			?><a class="<?php if ( current_user_can( edit_others_posts ) ) { echo 'pagenav-next-override'; } else { echo 'pagenav-next'; } ?> expand" href="<?php echo esc_url( home_url( '/modules/' ) ); ?>" title="Explore another module">Explore another module &rarr;</a><?php 
		endif;
	}
?></nav><!-- .pagenav -->