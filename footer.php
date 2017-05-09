<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package joecue
 */

?>

	</div><!-- #content -->
	<div class="footer-wrap">
		<?php if( is_front_page() && is_home() ) :?>
		<div class="footer-edge">
			&nbsp;
		</div>
		<?php endif;?>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="row">
				<div class="small-12 medium-6 columns footer-copyright">
					&copy <?php echo date("Y"); ?> Joe Querin.
					</div>
					<div class="small-12 medium-6 columns text-right">
						<div class="site-info">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'joecue' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'joecue' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'joecue' ), 'joecue', '<a href="http://www.joequerin.com/" rel="designer">Joe Querin</a>' ); ?>
							</div><!-- .site-info -->
						</div>
					</div>
			</footer><!-- #colophon -->
		</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
