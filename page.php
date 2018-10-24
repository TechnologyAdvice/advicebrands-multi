<!--page-->
<?php get_header(); ?>

			<div id="content">


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php include 'partials/flexible.php'; ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_postdata(); ?>


	
	</div>

<?php get_footer(); ?>
