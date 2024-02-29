<?php 

function staff_shortcode($team,$member){

	$shortcode_membar	=	shortcode_atts(array(

			'staff_img'		=>'',
			'staff_name'	=>'',
			'staff_fb'		=>'',
			'staff_tw'		=>'',
			'staff_li'		=>'',
			'staff_in'		=>'',

		),$team,'staff');

		ob_start();
	?>


				<div class="chef">
							<div class="wrap-col">
								<div class="zoom-container">
									<a href="#">
										<img src="<?php echo wp_get_attachment_url($shortcode_membar['staff_img'],'full')?>" />
									</a>
								</div>
								<h3><?php echo $shortcode_membar['staff_name'] ?></h3>
								<ul class="social t-center">
									<li><a href="<?php echo $shortcode_membar['staff_fb']?>"><i class="fa fa-twitter"></i></a></li>
									<li><a href="<?php echo $shortcode_membar['staff_tw']?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo $shortcode_membar['staff_li']?>"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="<?php echo $shortcode_membar['staff_in']?>"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
				</div>



<?php
return ob_get_clean();
}
add_shortcode('staff','staff_shortcode');

vc_map(array(
	'base'				=>'staff',
	'name'				=>'staff membar',
	'description'		=>'add your staff mamber',
	'category'			=>'italy food',
	'params'			=>array(
		array(
			'param_name'		=>'staff_img',
			'type'				=>'attach_image',
			'heading'			=>'team membar photo',
		),
		array(
			'param_name'		=>'staff_name',
			'type'				=>'textfield',
			'heading'			=>'team membar name',
		),
		array(
			'param_name'		=>'staff_fb',
			'type'				=>'textfield',
			'heading'			=>'team membar facebook link',
		),
		array(
			'param_name'		=>'staff_tw',
			'type'				=>'textfield',
			'heading'			=>'team membar twitter',
		),
		array(
			'param_name'		=>'staff_li',
			'type'				=>'textfield',
			'heading'			=>'team membar linkedin',
		),
		array(
			'param_name'		=>'staff_in',
			'type'				=>'textfield',
			'heading'			=>'team membar instragrm',
		),
	),
));

 ?>