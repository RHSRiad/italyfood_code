 <?php get_header();?>


<!--////////////////////////////////////Container-->
<section id="container" class="sub-page">
	<div class="wrap-container zerogrid">
		<div class="crumbs">
			<ul>
				<li><a href="<?php site_url();?>">Home</a></li>
				<?php while(have_posts()):the_post(); ?>
				<li><a href="archive.html"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
		</div>
		<div id="main-content" class="col-2-3">
			<div class="wrap-content">
				<?php the_content(); ?>

			</div>
		</div>
<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer();?>