<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package simplybusiness
 */
?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div id="background-foot" class="container">
		<div class="row">
			<div class="site-footer-inner col-sm-12">

				<div class="site-info">
					<?php do_action( 'simplybusiness_credits' ); ?>
					<?php if (is_front_page()) { ?>
					<a class="credits" href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'simplybusiness' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'simplybusiness' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
                    <a class="credits" rel="designer" href="https://www.tvojsajt.com/" target="_simplybusiness" title="Theme by Tvoj Sajt" alt="Theme developed by Tvoj Sajt"><?php _e('Theme by Tvoj Sajt','simplybusiness') ?> </a>
					 <?php } else {?>
					 <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'simplybusiness' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'simplybusiness' ), 'WordPress' ); ?></a>
				     <?php } ?>
				</div><!-- close .site-info -->

			</div>
		</div>
	</div><!-- close .container-fluid -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>
