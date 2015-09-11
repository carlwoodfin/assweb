<?php
/**
 * The sidebar containing the main widget area
 *
 * @package _ass
 */
?>

	<!-- close .main-content-inner -->

	<div class="sidebar col-sm-3 col-md-3">
	
		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		<div class="sidebar-padder">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
				<ul id="sidebar">
					<?php dynamic_sidebar( 'sidebar-left' ); ?>
				</ul>
			<?php endif; ?>

			

		</div><!-- close .sidebar-padder -->
		
		</div>