<?php 

function location_shortcode($reserv ,$short){

$location_shortcode_atts =	shortcode_atts(array(

		'address'		=>'',
		'mon_friday'	=>'',
		'sat_sun'		=>'',
		'email'			=>'',
		'tel'			=>'',
		'fax'			=>'',
		

	),$reserv,'location');
	ob_start();
	?>
						<div class="wrap-col">
							<h3>Address</h3>
							<p> <?php echo $location_shortcode_atts['address'] ?></p><br/>
							<h3>Hours Of Operation</h3>
							<p><span>MONDAY-FRIDAY: </span><?php echo $location_shortcode_atts['mon_friday'] ?></p>
							<p><span>SATURDAY-SUNDAY: </span><?php echo $location_shortcode_atts['sat_sun'] ?></p><br/>
							<h3>Contact Info</h3>
							<p><span>EMAIL ADDRESS: </span><?php echo $location_shortcode_atts['email'] ?></p>
							<p><span>TELEPHONE: </span><?php echo $location_shortcode_atts['tel'] ?></p>
							<p><span>FAX: </span><?php echo $location_shortcode_atts['fax'] ?></p>
						</div>



	<?php  
	return ob_get_clean();
};

add_shortcode('location','location_shortcode');

	vc_map(array(
	'base'			=>'location',
	'name'			=>'submition section details',
	'description'	=>'type your submition section details',
	'category'		=>'italy food',
	'params'		=>array(
		array(
			'param_name'		=>'address',
			'type'				=>'textarea',
			'heading'			=>'type your address',
		
			),
		array(
			'param_name'		=>'mon_friday',
			'type'				=>'textfield',
			'heading'			=>'time',
		
			),
		array(
			'param_name'		=>'sat_sun',
			'type'				=>'textfield',
			'heading'			=>'time satarday to sunday',
		
			),
		array(
			'param_name'		=>'email',
			'type'				=>'textfield',
			'heading'			=>'email',
		
			),
		array(
			'param_name'		=>'tel',
			'type'				=>'textfield',
			'heading'			=>'phone numbar',
		
			),
		array(
			'param_name'		=>'fax',
			'type'				=>'textfield',
			'heading'			=>'fax',
		
			),
		),

	));
 ?>