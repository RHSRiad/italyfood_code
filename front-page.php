<?php 

get_header(); ?>	
	<div class="zerogrid">
		<div class="callbacks_container">
			<ul class="rslides" id="slider4">
				<?php 

				$banner_post		=	new WP_Query(array(
						'post_type'			=> 'slider_post',
				));


				 ?>

				<?php while($banner_post ->have_posts()):$banner_post ->the_post(); ?>
				<li>
					<?php the_post_thumbnail(); ?>
					<div class="caption">
						<h2><?php the_title(); ?></h2></br>
						<?php the_content(); ?>
					</div>
				</li>
					<?php endwhile; ?>
			</ul>
		</div>
	</div>
	
<!--////////////////////////////////////Container-->
<section id="container" class="index-page">
	<div class="wrap-container zerogrid">
		<!-----------------content-box-1-------------------->
		<section class="content-box box-1">
			<div class="zerogrid">
				<div class="row box-item"><!--Start Box-->
					<h2>“ <?php echo $italyfood['bss'] ?> ”</h2>
					<span><?php echo $italyfood['bss2'] ?></span>
				</div>
			</div>
		</section>
		<!-----------------content-box-2-------------------->
		<section class="content-box box-2">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="header">
						<h2>Welcome</h2>
						<hr class="line">
						<span>text text text text text</span>
					</div>
					<div class="row">
						<?php 

							$food_menu_post			= new WP_Query(array(
									'post_type'		=>'menu_post',
							))
						 ?>
						<?php while($food_menu_post->have_posts()):$food_menu_post->the_post(); ?>

						<div class="col-1-3">
							<div class="wrap-col">
								<div class="box-item">
									<span class="ribbon"><?php the_title(); ?><b></b></span>
									<?php the_post_thumbnail(); ?>
									<p> <?php echo wp_trim_words(get_the_content(),20,false) ?></p>
									<a href=" <?php the_permalink();?>" class="button button-1"> <?php echo the_field('menu_read') ?></a>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>

<!--////////////////////////////////////Footer-->
<?php get_footer(); ?>