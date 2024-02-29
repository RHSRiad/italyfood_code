<?php global $italyfood; ?>

<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head();?>
</head>
<body <?php body_class();?>>
<div class="wrap-body">
	<!--///////////////////////////////////////Top-->
	<div class="top">
		<div class="zerogrid">
			<ul class="number f-left">
				<li class="mail"><p> <?php echo $italyfood['htle'] ?></p></li>
				<li class="phone"><p> <?php echo $italyfood['htlp'] ?></p></li>
			</ul>
			<ul class="top-social f-right">
				<li><a href=" <?php echo $italyfood['htt'] ?>"><i class="fa fa-twitter"></i></a></li>
				<li><a href=" <?php echo $italyfood['htf'] ?>"><i class="fa fa-facebook"></i></a></li>
				<li><a href=" <?php echo $italyfood['htg'] ?>"><i class="fa fa-google-plus"></i></a></li>
				<li><a href=" <?php echo $italyfood['htl'] ?>"><i class="fa fa-linkedin"></i></a></li>
				<li><a href=" <?php echo $italyfood['hti'] ?>"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
	</div <?php echo $italyfood['htlp'] ?>
	<!--////////////////////////////////////Header-->
	<header>
		<div class="zerogrid">
			<center>
				<div class="logo">
					<a href="<?php site_url();?>"><img src="<?php echo $italyfood['lu']['url'] ?>"> </a>	
				</div>
		</center>
		</div>
	</header>
	<div class="site-title">
		<div class="zerogrid">
			<div class="row">
				<h2 class="t-center"><?php echo $italyfood['ss'] ?></h2>
			</div>
		</div>
	</div>
    <!--//////////////////////////////////////Menu-->
    <a href="#" class="nav-toggle">Toggle Navigation</a>
	    <nav class="cmn-tile-nav">
			

		

				<?php wp_nav_menu(array(
					'theme_location'				=>'main_menu',
					'container'						=>'',
					'menu_class'					=>'clearfix',
					'menu_id'						=>'',
					));
				?>

	    </nav>
	