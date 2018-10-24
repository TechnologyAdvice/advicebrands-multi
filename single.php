<!--single-->

<?php get_header(); ?>
			<div id="content">

				<div id="inner-content" class="wrap row">

					<main id="main" class="col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                <header class="article-header entry-header">
									<div style="padding-top:2rem;">Download Your:</div>
                  <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

                </header> <?php // end article header ?>

                <section class="entry-content row" itemprop="articleBody">

										<div class="col-xs-12 col-sm-6">
											<?php the_content(); ?>
										<?php
										$bullet_points = get_the_terms($id,'bullets');
										$bullet_header = get_field('bullet_points_heading');
										if (!empty($bullet_points)) {
											echo "<h3>$bullet_header</h3>";
											echo '<ul class="bullet-list">';
											foreach($bullet_points as $bullet_point) {
												echo '<li><i class="far fa-check-square"></i> '.$bullet_point->name.'</li>';
											}
											echo '</ul>';
										}
										?>
										<?php $ninja_form = get_field('ninja_form_id'); ?>
										<?php echo do_shortcode('[ninja_form id='.$ninja_form.']'); ?></div>
										<div class="col-xs-12 col-sm-6 thumbnail"><?php the_post_thumbnail('full'); ?></div>


									<?php
									$attachment_id = get_field('vendor_logo');
									$size = "full"; // (thumbnail, medium, large, full or custom size)
									$image = wp_get_attachment_image_src( $attachment_id, $size );
									// url = $image[0];
									// width = $image[1];
									// height = $image[2];
									?>
									<div class="row vendor">
										<div class="col-xs-12 col-sm-3 vendor-logo">
											<img src="<?php echo $image[0]; ?>">
										</div>
										<div class="col-xs-12 col-sm-9">
		                  <p><?php the_field('vendor_description'); ?></p>
										</div>
									</div>
                </section> <?php // end article section ?>

                <?php //comments_template(); ?>

              </article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry ">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'startertheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'startertheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'startertheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
