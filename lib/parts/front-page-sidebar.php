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
			<li class="login">:: <?php wp_loginout( get_permalink() ); ?></li>
		</ul>
		<?php 
				if ( is_user_logged_in() ) {
					global $blog_id;
					if ( 2 == $blog_id ) { ?>
						<ul>
							<li><a href="<?php bloginfo( 'url' ); ?>/project-guidelines/">:: Project Guidelines</a></li>
							<li><a href="<?php bloginfo( 'url' ); ?>/project-guidelines/research-tips/">:: Research Tips</a></li>
							<li><a href="<?php bloginfo( 'url' ); ?>/project-guidelines/citations-guide/">:: Citation Guide</a></li>
						</ul>
					<?php }
					
					// Upcoming events pull from ScholarPress Courseware plugin schedule entries ?>
					<h5><strong>Coming Up</strong></h5>
					
					<?php $events = sp_courseware_schedule_get_upcoming_entries( 1 );					
					foreach ( $events as $event ) {
						?><h6>
							<span class="cal-title"><?php echo $event->schedule_title; ?></span><br />
							<span class="cal-date"><?php echo date('F d, Y', strtotime($event->schedule_date)); ?></span><br />
							<span class="cal-place"><?php echo $event->schedule_location; ?></span><br />
						</h6><?php 
					}
					
				} // end is_user_logged_in() ?>
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