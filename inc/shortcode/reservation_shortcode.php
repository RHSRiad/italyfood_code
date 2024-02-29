<?php 

function reservation_shortcode($reserv ,$short){

$reservation_shortcode_atts =	shortcode_atts(array(

		'submition_details'		=>'',
		'phone1'				=>'',
		'phone2'				=>'',
		'email'					=>'',

		

	),$reserv,'reservation');
	ob_start();
	?>
						
						<div class="wrap-col">
							<h3>Complete the Submission Form</h3>
							<p><?php echo $reservation_shortcode_atts['submition_details'] ?></p><br/>
							<h3>Or Just Make a Call</h3>
							<p><?php echo $reservation_shortcode_atts['phone1'] ?> <br>
								<?php echo $reservation_shortcode_atts['phone2'] ?></p>
							<p><?php echo $reservation_shortcode_atts['email'] ?></p>
						</div>

						
	<?php  
	return ob_get_clean();
};

add_shortcode('reservation','reservation_shortcode');

	vc_map(array(
	'base'			=>'reservation',
	'name'			=>'submition section details',
	'description'	=>'type your submition section details',
	'category'		=>'italy food',
	'icon'			=>'',
	'params'		=>array(
		array(
			'param_name'		=>'submition_details',
			'type'				=>'textarea',
			'heading'			=>'submition form details',

		
			),
		array(
			'param_name'		=>'phone1',
			'type'				=>'textfield',
			'heading'			=>'phone',

		
			),
		array(
			'param_name'		=>'phone2',
			'type'				=>'textfield',
			'heading'			=>'phone',

		
			),
		array(
			'param_name'		=>'email',
			'type'				=>'textfield',
			'heading'			=>'email',

		
			),
		),

	));

 ?>