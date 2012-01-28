<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the content-overlord div and all content
 * after. Calls sidebar-footer.php for complementary footer content.
 * Also contains the closing div for #content-overlord (opened in
 * header.php).
 *
 * @package WordPress
 * @subpackage Plain_Sight
 * @since Plain Sight 2.0
 */
?>

	</div><!-- #content-overlord --> 
 	
	<footer id="footer" role="contentinfo">
			
		<?php get_template_part( 'lib/parts/footer-nav' ); ?>			

		<?php get_sidebar( 'footer' ); ?>
		
		<div id="contentinfo"> 
			<p class="site-generator">
				&copy; 2010, Center for History and New Media. <a href="http://chnm.gmu.edu/copyright">(Copyright Notice)</a>
				<span class="wp-power">Powered by WordPress</span>
			</p>
		</div><!-- #contentinfo -->

	</footer><!-- #footer --> 

<?php wp_footer(); ?>
</body> 
</html>