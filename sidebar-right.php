<?php
/**
 * The sidebar containing the main widget area
 *
 * @package _ass
 */
?>

	<!-- close .main-content-inner -->
	<div class="col-md-3">
		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
				<ul id="">
					<?php dynamic_sidebar( 'sidebar-right' ); ?>
				</ul>
			<?php endif; ?>

			

		</div><!-- close .sidebar-padder -->
		