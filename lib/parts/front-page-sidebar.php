<?php
/**
 * The template part for displaying the front page sidebar
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
 */
?>

<aside id="site-tools">
	<?php if ( ! is_main_site() ) : 
		// If not the Main Front Page, display site-specific info ?>
		<h4><?php the_title(); // pulls title from front page ?></h4>
		<ul>
			<li class="syllabus"><a href="<?php bloginfo( 'url' ); ?>/syllabus/">:: Syllabus</a></li>
			<?php 
				global $blog_id;
				if ( 2 == $blog_id ) { ?>
					<li><a href="<?php bloginfo( 'url' ); ?>/project-guidelines/">:: Project Guidelines</li>
					<li><a href="<?php bloginfo( 'url' ); ?>/project-guidelines/research-tips/">:: Research Tips</li>
					<li><a href="<?php bloginfo( 'url' ); ?>/project-guidelines/citations-guide/">:: Citation Guide</li>
				<?php }
			?>
			<li class="login">:: <?php wp_loginout( get_permalink() ); ?></li>
		</ul>
	<?php else : 
		// If its the Main Front Page, display a different menu ?>
		<h4>Hidden in Plain Sight Program Options</h4>
		<h5>Recertification Credit</h5>
		<ul> 
			<li><a href="/hiddeninplainsight/recert-syllabus/">:: Syllabus</a></li> 
			<li><a href="/hiddeninplainsight/recert-registration/">:: Registration</a></li>			
			<!-- <li>:: <?php wp_loginout( 'http://chnm.gmu.edu/hiddeninplainsight/' ); ?></li> --> 
		</ul>
		<h5>Graduate Credit</h5>
		<ul>
			<li><a href="http://chnm.gmu.edu/hiddeninplainsight/graduate-credit-syllabus/">:: Syllabus</a></li>
			<?php // <li><a href="/hiddeninplainsight/credit-pre-registration/">:: Registration</a></li> ?>
			<!-- <li>:: <?php wp_loginout( 'http://chnm.gmu.edu/hiddeninplainsight/credit/' ); ?></li> -->  
		</ul>
	<?php endif; ?>
</aside><!-- #site-tools -->