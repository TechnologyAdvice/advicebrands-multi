<!--page-->
<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap  row">
					<main id="main" class="col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<section class="entry-content ">
							<?php the_content(); ?>
						</section>
					<?php endwhile; endif; ?>
					<?php wp_reset_postdata(); ?>

				</main>
			</div>
		</div>

<?php get_footer(); ?>
