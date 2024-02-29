<?php 

/*
Template Name:gallery page
*/

get_header(); ?>	
<!--////////////////////////////////////Container-->
<section id="container" class="sub-page">
	<div class="wrap-container zerogrid">
		<div class="crumbs">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="gallery.html">Gallery</a></li>
			</ul>
		</div>
		<div id="main-content">
			<div class="wrap-content">
				<div class="row">

					<?php 

						$gallery_custom_post 	=	new WP_Query(array(
								'post_type'				=>'gallery_post',
						));

					while($gallery_custom_post ->have_posts()):$gallery_custom_post ->the_post(); ?>
					<div class="col-1-4">
						<div class="zoom-container">
							<a href="<?php the_permalink();?>">
								<span class="zoom-caption">
									<span><?php the_title(); ?></span>
								</span>
							<?php the_post_thumbnail(); ?>	
							</a>
						</div>
					</div>

				<?php endwhile; ?>
				</div>
			</div>
		</div> 
	</div>
</section>

<!--////////////////////////////////////Footer-->
<?php get_footer(); ?>