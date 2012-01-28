<?php
/**
 * Template part for displaying the Notes on Author archives
 *
 * @package WordPress
 * @subpackage Plain_Sight_VA
 * @since Plain Sight VA 2.0
 */
?>

<?php // First we need to figure out who the author is
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	$author_id = $curauth->ID;
	// could use psn_notes_by_author_id( $args ) to simply display all by author
?>

<h4>Click section title to expand.</h4>

<?php if ( psn_get_notes_by_meta( 632, $author_id ) ) : ?>
	<div id="historical-thinking" class="notes-page-section">
		<h2><a href="#historical-thinking">Historical Thinking</a></h2>
		<div class="all-module-notes">
			
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=2960&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=722&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=632&author_id=' . $author_id ); ?>
			</div>
				
		</div>
	</div>
<?php endif; ?>
	
<?php if ( psn_get_notes_by_meta( 132, $author_id ) ) : ?>
	<div id="virginia-geography" class="notes-page-section">
		<h2><a href="#virginia-geography">Virginia Geography</a></h2>
		<div class="all-module-notes">
		
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=693&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=177&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=132&author_id=' . $author_id ); ?>
			</div>
		
		</div>
	</div>
<?php endif; ?>
	
<?php if ( psn_get_notes_by_meta( 36, $author_id ) ) : ?>
	<div id="virginia-indians" class="notes-page-section">
		<h2><a href="#virginia-indians">Native Peoples</a></h2>
		<div class="all-module-notes">
			
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=695&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=43&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=36&author_id=' . $author_id ); ?>
			</div>
			
		</div>
	</div>
<?php endif; ?>
	
<?php if ( psn_get_notes_by_meta( 135, $author_id ) ) : ?>
	<div id="colonial-virginia" class="notes-page-section">
		<h2><a href="#colonial-virginia">Colonial Virginia</a></h2>
		<div class="all-module-notes">
		
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=699&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=186&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=135&author_id=' . $author_id ); ?>
			</div>
			
		</div>
	</div>
<?php endif; ?>
	
<?php if ( psn_get_notes_by_meta( 137, $author_id ) ) : ?>
	<div id="revolutionary-virginia" class="notes-page-section">
		<h2><a href="#revolutionary-virginia">Revolution and New Nation</a></h2>
		<div class="all-module-notes">
		
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=701&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=188&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=137&author_id=' . $author_id ); ?>
			</div>
		
		</div>
	</div>
<?php endif; ?>
	
<?php if ( psn_get_notes_by_meta( 139, $author_id ) ) : ?>
	<div id="civil-war-era" class="notes-page-section">
		<h2><a href="#civil-war-era">Civil War Era</a></h2>
		<div class="all-module-notes">
		
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=703&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=190&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=139&author_id=' . $author_id ); ?>
			</div>
		
		</div>
	</div>
<?php endif; ?>
	
<?php if ( psn_get_notes_by_meta( 141, $author_id ) ) : ?>
	<div id="20th-century-virginia" class="notes-page-section">
		<h2><a href="#20th-century-virginia">20th-century Virginia</a></h2>
		<div class="all-module-notes">
		
			<div class="section-wrap">
				<h4>Classroom ideas</h4>
				<?php psn_notes_by_meta( 'parentp_id=705&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Summaries</h4>
				<?php psn_notes_by_meta( 'parentp_id=193&author_id=' . $author_id ); ?>
			</div>
			
			<div class="section-wrap">
				<h4>Initial hypothesis</h4>
				<?php psn_notes_by_meta( 'parentp_id=141&author_id=' . $author_id ); ?>
			</div>
		
		</div>
	</div>
<?php endif; ?>