<?php 

function menu_shortcode($reserv ,$short){

$menu_shortcode_atts =	shortcode_atts(array(

		'food_category'		=>'',		
		'food_image'		=>'',		
		'food_name'			=>'',		
		'food_price'		=>'',		
		'food_all'			=>'',		

	),$reserv,'menu');
	ob_start();
	?>
						
						

						<div class="wrap-col">
							<h3><?php echo $menu_shortcode_atts['food_category'] ?></h3>

							<?php

							$food_data = vc_param_group_parse_atts($menu_shortcode_atts['food_all']);

							 foreach($food_data as $single_data): ?>

							<div class="post">
								<a href="#"><img src="<?php echo wp_get_attachment_image_url($single_data['food_image'] )?>"/></a>
								<div class="wrapper">
								  <h5><a href="#"><?php echo $single_data['food_name'] ?></a></h5>
								  <span><?php echo $single_data['food_price'] ?></span>
								</div>
							</div>
						<?php endforeach; ?>

						</div>




	<?php  
	return ob_get_clean();
};

add_shortcode('menu','menu_shortcode');

	vc_map(array(
	'base'			=>'menu',
	'name'			=>'Food menu',
	'description'	=>'add your menu item',
	'category'		=>'italy food',
	'icon'			=>get_theme_file_uri().'/images/food_menu.png',
	'params'		=>array(
		array(
			'param_name'			=>'food_category',
			'type'					=>'textfield',
			'heading'				=>'Food Category',
		),
		array(
			'param_name'			=>'food_all',
			'type'					=>'param_group',
			'heading'				=>'Add Food Item',
			'params'				=>array(
				array(
					'param_name'		=>'food_image',
					'type'				=>'attach_image',
					'heading'			=>'Add image',
				),
				array(
					'param_name'		=>'food_name',
					'type'				=>'textfield',
					'heading'			=>'Food name',
				),
				array(
					'param_name'		=>'food_price',
					'type'				=>'textfield',
					'heading'			=>'Add Price',
				),
			),
		),
	),



	));
 ?>