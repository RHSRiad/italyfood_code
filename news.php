<?php 

/*
Template Name:news page
*/

get_header(); ?>

<!--////////////////////////////////////Container-->
<section id="container" class="sub-page">
	<div class="wrap-container zerogrid">
		<div class="crumbs">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="news.html">News</a></li>
			</ul>
		</div>
		<div id="main-content" class="col-2-3">
			<div class="wrap-content">

				<?php 

				$news_query =	new wp_query(array(
						'post_type'		=>'post',
						'posts_per_page'	=>1,
						'category_name'		=>'news',
				));				


				while($news_query ->have_posts()):$news_query ->the_post(); ?>
				<article>
					<div class="art-header">
						<div class="entry-title"> 
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="info">By <a href="#"> <?php the_author(); ?></a> on <?php the_time('M d,Y') ?></div>
					</div>
					<div class="art-content">
						<?php the_post_thumbnail(); ?>
							<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>

				<div class="widget wid-related">
					<div class="wrap-col">
						<div class="wid-header">
							<h5>Related Post</h5>
						</div>
						<div class="wid-content">
							<div class="row">

								<?php

								$related_news	=	New wp_query([

										'post_type'			=>'post',
										'posts_per_page'	=>3,
										'category_name'		=>'news',

								]);

								 while($related_news ->have_posts()):$related_news ->the_post(); ?>
								<div class="col-1-3">
									<div class="wrap-col">
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
										<h4><a href="<?php the_permalink();?>"><?php the_title() ?> </a></h4>
									</div>
								</div>
							<?php endwhile; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php get_sidebar(); ?>
	</div>	
</section>

<!--////////////////////////////////////Footer-->
<?php get_footer(); ?>