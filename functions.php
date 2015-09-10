<?php

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_image_size( 'slider-image', 975, 234, true );

/****************************************************************************************
 USE THIS TO INCLUDE ANY FILES AS THIS IS A CHILD THEME
				require_once( get_stylesheet_directory() . '/my_included_file.php' );
****************************************************************************************/


/**
 * Register widgetized area and update sidebar with default widgets
 */
function _ass_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', '_ass' ),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name'          => __( 'Right Sidebar', '_ass' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', '_ass_widgets_init' );



/****************************************************************************************
			ADD CUSTOM TYPE FOR THE SLIDER
****************************************************************************************/
add_action( 'init', 'register_cpt_slider' );
function register_cpt_slider() {
 
    $labels = array( 
  	'name'               => __( 'Slider Posts ', 'text_domain' ),
		'singular_name'      => __( 'Slider Post', 'text_domain' ),
		'add_new'            => _x( 'Add New Slider Post', '${4:Name}', 'text_domain' ),
		'add_new_item'       => __( 'Add New Slider Post', 'text_domain}' ),
		'edit_item'          => __( 'Edit Slider Post', 'text_domain' ),
		'new_item'           => __( 'New Slider Post', 'text_domain' ),
		'view_item'          => __( 'View Slider Post', 'text_domain' ),
		'search_items'       => __( 'Search Slider Posts', 'text_domain' ),
		'not_found'          => __( 'No Slider Posts found', 'text_domain' ),
		'not_found_in_trash' => __( 'No Slider Posts found in Trash', 'text_domain' ),
		'parent_item_colon'  => __( 'Parent Slider Post:', 'text_domain' ),
		'menu_name'          => __( 'Slider Posts', 'text_domain' ),
    );
 
    $args = array( 
		'labels'              => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array( 'category' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		//'menu_icon'         => '',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post', 
		'supports'            => array( 
									'title','thumbnail' 
									
								),
    );
 
    register_post_type( 'slider', $args );
}
function create_slider_post_type_labels($singular, $plural = null) {
	if ($plural === null) {
		$plural = $singular.'s';
	}
	$labels = array(
		'name'               => __( $plural, 'text-domain'),
		'singular_name'      => __( $singular, 'text-domain'),
		'menu_name'          => __( $plural, 'text-domain'),
		'name_admin_bar'     => __( $singular, 'text-domain'),
		'add_new'            => __( 'Add New '.$singular, 'text-domain'),
		'add_new_item'       => __( 'Add New '.$singular, 'text-domain'),
		'new_item'           => __( 'New '.$singular, 'text-domain'),
		'edit_item'          => __( 'Edit '.$singular, 'text-domain'),
		'view_item'          => __( 'View '.$singular, 'text-domain'),
		'all_items'          => __( 'All '.$plural, 'text-domain'),
		'search_items'       => __( 'Search '.$plural, 'text-domain'),
		'parent_item_colon'  => __( 'Parent '.$plural.':', 'text-domain'),
		'not_found'          => __( 'No '.$plural.' found.', 'text-domain'),
		'not_found_in_trash' => __( 'No '.$plural.' found in Trash.', 'text-domain')
	);
	return $labels;
}

/****************************************************************************************
 				END OF CUSTOM TYPES
****************************************************************************************/

function bootstrapwp_breadcrumbs()
{
    $home      = __('Home', 'bootstrapwp'); // text for the 'Home' link
    $before    = '<li class="active">'; // tag before the current crumb
    $sep       = '<span class="divider"> / </span>';
    $after     = '</li>'; // tag after the current crumb
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<ul class="breadcrumb">';
        global $post;
        $homeLink = home_url();
            echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
            if (is_category()) {
                global $wp_query;
                $cat_obj   = $wp_query->get_queried_object();
                $thisCat   = $cat_obj->term_id;
                $thisCat   = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($parentCat, true, $sep);
                }
                echo $before . __('Archive by category', 'bootstrapwp') . ' "' . single_cat_title('', false) . '"' . $after;
            } elseif (is_day()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                    'F'
                ) . '</a></li> ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                    'Y'
                ) . '</a></li> ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug      = $post_type->rewrite;
                    echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ';
                    echo $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                    echo $before . get_the_title() . $after;
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat    = get_the_category($parent->ID);
                $cat    = $cat[0];
                echo get_category_parents($cat, true, $sep);
                echo '<li><a href="' . get_permalink(
                    $parent
                ) . '">' . $parent->post_title . '</a></li> ';
                echo $before . get_the_title() . $after;
            } elseif (is_page() && !$post->post_parent) {
                echo $before . get_the_title() . $after;
            } elseif (is_page() && $post->post_parent) {
                $parent_id   = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page          = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
                        $page->ID
                    ) . '</a>' . $sep . '</li>';
                    $parent_id     = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) {
                    echo $crumb;
                }
                echo $before . get_the_title() . $after;
            } elseif (is_search()) {
                echo $before . __('Search results for', 'bootstrapwp') . ' "'. get_search_query() . '"' . $after;
            } elseif (is_tag()) {
                echo $before . __('Posts tagged', 'bootstrapwp') . ' "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . __('Articles posted by', 'bootstrapwp') . ' ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . __('Error 404', 'bootstrapwp') . $after;
            }
            // if (get_query_var('paged')) {
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ' (';
            //     }
            //     echo __('Page', 'bootstrapwp') . $sep . get_query_var('paged');
            //     if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()
            //     ) {
            //         echo ')';
            //     }
            // }
        echo '</ul>';
    }
}

// Creating the widget 
class ass_latest_posts extends WP_Widget {
function __construct() {
parent::__construct(
// Base ID of your widget
'ass_latest_posts', 
// Widget name will appear in UI
__('Latest Post Widget', 'wpb_widget_domain'), 
// Widget description
array( 'description' => __( 'All Saints Latest Post Widget', 'wpb_widget_domain' ), ) 
);
}
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
// This is where you run the code and display the output
$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
?>
<div class="list-group">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<ul class="nav">
				<li><a href="<?php the_permalink(); ?>" class=""><?php get_the_title() ? the_title() : the_ID(); ?></a></li>
			<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
			</ul>
		<?php endwhile; ?>
		</div>

<?php
} //This is the closing curly for the custom actions
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here
// Register and load the widget
function wpb_load_widget() {
	register_widget( 'ass_latest_posts' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

?>