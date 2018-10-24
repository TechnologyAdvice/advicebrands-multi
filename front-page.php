<!--front-page-->
<?php get_header('front'); ?>
	<div class="hero--content wrap" >
		<div id="inner-content">
			<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<?php if (have_posts()) : ?>
					<div class="hero--text">
						<h1>
							<span class="hero--hero-text"><?php the_field('hero_text', 'option'); ?></span>
						</h1>
						<p><?php the_field('secondary_content', 'option'); ?></p>
					</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
				<div class="hero--content_articles row">
					<h2 class="col-xs-12">latest content</h2>
					<?php
						// the query
						$the_query = new WP_Query( array(
							//'category_name' => 'news',
							'posts_per_page' => 3,
						));
					?>
					<?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="col-sm-4 article__thumbnail">
						<div class="article__thumbnail--container">
							<?php
								$attachment_id = get_post_thumbnail_id($post->ID);
								$size = "full"; // (thumbnail, medium, large, full or custom size)
								$image = wp_get_attachment_image_src( $attachment_id, $size );
									// url = $image[0];
									// width = $image[1];
									// height = $image[2];
							?>
							<div class="article__thumbnail--background-image" style="background-image:url('<?php echo $image[0]; ?>');"></div>
							<a href="<?php the_permalink() ?>" class="article__thumbnail--overlay">
								<div class="reveal"></div>
								<div class="content"><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></div>
								<div class="primary-btn">Learn More</div>
							</a>
							<span class="article__thumbnail--title highlight highlight--wrapping"><?php the_title(); ?></span>
						</div>
					</div>
					<?php endwhile; endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</main>
		</div>
	</div>
		<?php include 'partials/logo-bar.php'; ?>
	</div>
	<section class="articles wrap" style="max-Width:1035px;margin-bottom:3rem;">
		<h2>All articles</h2>
		<div class="row">
			<?php
				// the query
				$the_query = new WP_Query( array(
					//'category_name' => 'news',
					'posts_per_page' => 9,
					'offset' => 3,
				));
			?>
			<?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 article__thumbnail">
				<div class="article__thumbnail--container">
					<?php
						$attachment_id = get_post_thumbnail_id($post->ID);
						$size = "full"; // (thumbnail, medium, large, full or custom size)
						$image = wp_get_attachment_image_src( $attachment_id, $size );
							// url = $image[0];
							// width = $image[1];
							// height = $image[2];
					?>
					<div class="article__thumbnail--background-image" style="background-image:url('<?php echo $image[0]; ?>');"></div>
						<a href="<?php the_permalink() ?>" class="article__thumbnail--overlay">
							<div class="reveal"></div>
							<div class="content"><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></div>
							<div class="primary-btn">Learn More</div>
						</a>
						<span class="article__thumbnail--title highlight highlight--wrapping"><?php the_title(); ?></span>
					</div>
				</div>
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php get_footer('front'); ?>
