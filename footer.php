<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */
?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
	<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="media pull-right">
  	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/activemark.jpg" class="footer-images" />
  	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/asr.jpg" class="footer-images" />
  	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/es.jpg" class="footer-images" />
  	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/hst.jpg" class="footer-images" />
  	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/saa.jpg" class="footer-images" />
  	</div>	
	</div>
	</div>
		<div class="row">
			<div class="site-footer-inner col-sm-12">
			<div class="footer-address text-center">
					<p>Church St, Heaton Norris, Stockport, SK4 1ND<br>
					Tel: 0161 285 7373 | Fax: 0161 218 1188</p>
				</div>

				<div class="site-info pull-right">
				Built by <a href="http://www.carlwoodfin.com">Carl Woodfin</a> |
				<a href="<?php echo esc_url( home_url( '/wp-admin' ) ); ?>">Log in</a>
					
				</div><!-- close .site-info -->

			</div>
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>