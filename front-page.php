<?php
 /*
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */

get_header(); ?>

<div class="row">
<div class="col-xs-12">

<div id="postCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
<ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>

  </ol>

<?php 
	$loop = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => 1 )); 
		 while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="item active">
  				<?php the_post_thumbnail('slider-image');?>
			</div>
 
				<?php endwhile; ?>
			
				<?php wp_reset_postdata(); ?>

<?php 
	$loop = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => 3, 'offset' => 1 )); 
?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="item">
  <?php the_post_thumbnail('slider-image');?>

   </div>
				<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>	

      <a class="left carousel-control" href="#postCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#postCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>					
				</div>

      </div>

    </div><!-- /.carousel -->    
</div>
<hr>
<div class="row">
<div class="col-xs-4 col-md-2 col-md-offset-3">
<div class="text-center">
    <button type="button"  class="btn btn-glyph btn-circle btn-l"><i class="fa fa-newspaper-o"></i></button>
      <div class="caption">
        <h5>School News</h5>
      </div>
    </div>
     </div>
<div class="col-xs-4 col-md-2">
<div class="text-center">
      <button type="button"  class="btn btn-glyph btn-circle btn-l"><i class="fa fa-calendar"></i></button>
      <div class="caption">
        <h5>Term Dates</h5>
      </div>
      </div>
      </div>

<div class="col-xs-4 col-md-2">
      <div class="text-center">
      <button type="button" class="btn btn-glyph btn-circle btn-l"><i class="fa fa-phone fa-6"></i></button>
      <div class="caption">
        <h5>Contact us</h5>
      </div>
      </div>
      </div>
</div>
<hr>


<?php get_sidebar('left');?>



<div class="col-xs-12 col-md-6">
<h3 class="year-work text-center">Check out our blogs... Pick a year!</h3>
<div class="col-xs-2 col-md-2">
<p><a href="<?php echo get_post_type_archive_link( 'year-1' ); ?>">
    <button type="button" class="btn btn-glyph btn-circle btn-l">1</button>
    </a></p>
</div>
<div class="col-xs-2 col-md-2">
    <p><a href="<?php echo get_post_type_archive_link( 'year-2' ); ?>">
    <button type="button" class="btn btn-glyph btn-circle btn-l">2</button>
    </a></p>
</div>
<div class="col-xs-2 col-md-2">
    <p><a href="<?php echo get_post_type_archive_link( 'year-3' ); ?>">
    <button type="button" class="btn btn-glyph btn-circle btn-l">3</button>
    </a></p>
</div>
<div class="col-xs-2 col-md-2">
    <p><a href="<?php echo get_post_type_archive_link( 'year-4' ); ?>">
    <button type="button" class="btn btn-glyph btn-circle btn-l">4</button>
    </a></p>
</div>
<div class="col-xs-2 col-md-2">
    <p><a href="<?php echo get_post_type_archive_link( 'year-5' ); ?>">
    <button type="button" class="btn btn-glyph btn-circle btn-l">5</button>
    </a></p>
</div>
<div class="col-xs-2 col-md-2">
    <p><a href="<?php echo get_post_type_archive_link( 'year-6' ); ?>">
    <button type="button" class="btn btn-glyph btn-circle btn-l">6</button>
    </a></p>
    </div>
    </div>

    <div class="col-xs-12">
    <hr>
    <h3 class="safeguard-statement text-center">All Saints is committed to safeguarding all our children</h3>
    </div>
   
    
    

    

<?php get_footer(); ?>
