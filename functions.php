<?php  

add_action('after_setup_theme','italyfood_theme_support');

function italyfood_theme_support(){
	add_theme_support('menus');
	add_theme_support('widgets');
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');


	register_nav_menus(array(
		'main_menu'		=>'main menu',
		

	));
}

add_action('wp_enqueue_scripts','itallyfood_enqueue_link');

function itallyfood_enqueue_link(){
	wp_enqueue_style('zerogrid',get_theme_file_uri().'/css/zerogrid.css',null,'flase','all');
	wp_enqueue_style('style',get_theme_file_uri().'/css/style.css',null,'flase','all');
	wp_enqueue_style('slide',get_theme_file_uri().'/css/slide.css',null,'flase','all');
	wp_enqueue_style('menu',get_theme_file_uri().'/css/menu.css',null,'flase','all');
	wp_enqueue_style('font-awesome',get_theme_file_uri().'/font-awesome/css/font-awesome.min.css',null,'flase','all');


	wp_enqueue_script('classie',get_theme_file_uri().'/js/classie.js',null,'flase',true);
	wp_enqueue_script('demo',get_theme_file_uri().'/js/demo.js',null,'flase',true);

	wp_enqueue_script('theme-jquiry',get_theme_file_uri().'/js/jquery-1.11.3.min.js',null,'flase',true);
	wp_enqueue_script('responsive',get_theme_file_uri().'/js/responsiveslides.min.js',array('theme-jquiry'),'flase',true);
	wp_enqueue_script('main',get_theme_file_uri().'/js/main.js',array('theme-jquiry'),'flase',true);

	
}

function italyfood_sidebar_widget(){

	register_sidebar(array(
		'name'				=>'right sidebar 1',
		'id'				=>'rs1',
		'before_widget'		=>'<div class="widget wid-about">',
		'after_widget'		=>'</div>',
		'before_title'		=>'<div class="wid-header"><h5> ',
		'after_title'		=>' </h5></div>',
	));
register_sidebar(array(
		'name'				=>'right sidebar 2',
		'id'				=>'rs2',
		'before_widget'		=>'<div class="widget wid-post">',
		'after_widget'		=>'</div>',
		'before_title'		=>'<div class="wid-header"><h5>',
		'after_title'		=>'</h5></div>',
	));

register_sidebar(array(
		'name'				=>'right sidebar 3',
		'id'				=>'rs3',
		'before_widget'		=>'<div class="widget wid-tag">',
		'after_widget'		=>'</div>',
		'before_title'		=>'<div class="wid-header"><h5>',
		'after_title'		=>'</h5></div>',
	));


register_sidebar(array(
		'name'				=>'right sidebar 4',
		'id'				=>'rs4',
		'before_widget'		=>'<div class="widget wid-gallery">',
		'after_widget'		=>'</div>',
		'before_title'		=>'<div class="wid-header"><h5>',
		'after_title'		=>'</h5></div>',
	));

register_sidebar(array(
		'name'				=>'Footer left sidebar',
		'id'				=>'fls',
		'before_widget'		=>'<div class="wrap-col">',
		'after_widget'		=>'</div>',
		'before_title'		=>'<h4>',
		'after_title'		=>'</h4>',
	));
register_sidebar(array(
		'name'				=>'Footer middle location',
		'id'				=>'fml',
		'before_widget'		=>'<div class="wrap-col">',
		'after_widget'		=>'</div>',
		'before_title'		=>'<h4>',
		'after_title'		=>'</h4>',
	));
	
	register_widget('latest_food');
	register_widget('footer_map');
	}

add_action('widgets_init','italyfood_sidebar_widget');

class latest_food extends WP_Widget{

	public function __construct(){

		parent::__construct('latest_food','latest food widget',array(
			'description'			=>'latest food widget',
		));

	}
	public function widget($latest,$food){

		$title =$food['title'];


?>

				<?php echo $latest['before_widget'] ?>
					<?php echo $latest['before_title'] ?> <?php echo $title; ?> <?php echo $latest['after_title'] ?>					
					<div class="wid-content">

						<?php 

							$latest_food_wid	=	new WP_Query(array(
									'post_type'		=>'latest_post',
									'post_per_page'	=>3,
							));

						while($latest_food_wid->have_posts()):$latest_food_wid->the_post(); ?>

						<div class="post">
							<a href="<?php the_permalink()?>"><?php the_post_thumbnail(); ?></a>
							<div class="wrapper">
							  <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
							   <span><?php echo the_field('minimum_price') ?> - <?php echo the_field('maximum_price') ?></span>
							</div>
						</div>
						
					<?php endwhile; ?>

					</div>

					<?php echo $latest['after_widget'] ?>



<?php
	}
	public function form($food){

		$title =$food['title'];

		?>

		<p>
			
			<label for="">Title</label>
			<input type="text" value='<?php echo $title; ?>' name="<?php echo $this->get_field_name('title')?>">

		</p>

		<?php
	}

}





class footer_map extends WP_Widget{

	public function __construct(){
		parent::__construct('footer_map','Footer map',array(

				'description'				=>'Footer map Embad link',
		));
	}
	public function widget($footers,$maps){}
	public function form($maps){}
}





function cptui_register_my_cpts() {

	/**
	 * Post Type: slider posts.
	 */

	$labels = [
		"name" => esc_html__( "slider posts", "italyfood" ),
		"singular_name" => esc_html__( "slider post", "italyfood" ),
		"all_items" => esc_html__( "All slider post", "italyfood" ),
		"add_new" => esc_html__( "Add new Slider", "italyfood" ),
	];

	$args = [
		"label" => esc_html__( "slider posts", "italyfood" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "slider_post", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-cover-image",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "slider_post", $args );

	/**
	 * Post Type: menu posts.
	 */

	$labels = [
		"name" => esc_html__( "menu posts", "italyfood" ),
		"singular_name" => esc_html__( "menu post", "italyfood" ),
		"all_items" => esc_html__( "All menu post", "italyfood" ),
		"add_new" => esc_html__( "Add new menu post", "italyfood" ),
	];

	$args = [
		"label" => esc_html__( "menu posts", "italyfood" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "menu_post", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-menu-alt",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "menu_post", $args );

	/**
	 * Post Type: Gallery posts.
	 */

	$labels = [
		"name" => esc_html__( "Gallery posts", "italyfood" ),
		"singular_name" => esc_html__( "Gallery post", "italyfood" ),
		"all_items" => esc_html__( "All Gallery post", "italyfood" ),
		"add_new" => esc_html__( "Add new item", "italyfood" ),
	];

	$args = [
		"label" => esc_html__( "Gallery posts", "italyfood" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "gallery_post", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-gallery",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "gallery_post", $args );

	/**
	 * Post Type: latest posts.
	 */

	$labels = [
		"name" => esc_html__( "latest posts", "italyfood" ),
		"singular_name" => esc_html__( "latest post", "italyfood" ),
		"all_items" => esc_html__( "All latest post", "italyfood" ),
		"add_new" => esc_html__( "Add New latest post", "italyfood" ),
	];

	$args = [
		"label" => esc_html__( "latest posts", "italyfood" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "latest_post", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "latest_post", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


/*slider custom post end*/

include_once 'inc/shortcode/staff_shortcode.php';
include_once 'inc/shortcode/location_shortcode.php';
include_once 'inc/shortcode/reservation_shortcode.php';
include_once 'inc/shortcode/reservation_mail_shortcode.php';
include_once 'inc/shortcode/menu_shortcode.php';
include_once 'inc/redux/ReduxCore/framework.php';
include_once 'inc/redux/sample/config.php';

/*contact form*/

if(isset($_POST['submit'])){

	$name 			= $_POST['name'];
	$email 			= $_POST['email'];
	$subject 		= $_POST['subject'];
	$date 			= $_POST['date'];
	$time 			= $_POST['time'];
	$message 		= $_POST['message'];
	$all_message	= $name . $email . $date . $time . $message ;
	mail('riad.bme@gmail.com', $subject , $all_message );

};

