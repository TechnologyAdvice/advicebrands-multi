<!--advertise-->
<?php get_header(); ?>

			<div id="content">


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php include 'partials/flexible.php'; ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_postdata(); ?>


	<?php include 'partials/logo-bar.php'; ?>
	</div>
		<?php wp_reset_postdata(); // reset the query ?>
<?php get_footer(); ?>
