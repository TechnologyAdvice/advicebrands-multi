<!--front-page-->
<?php get_header('front'); ?>
	<div class="hero--content">
		<div id="inner-content">
			<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" style="height:100%;">
				<?php if (have_posts()) : ?>
					<div class="hero--text wrap">
						<h1>
							<span class="hero--hero-text"><?php the_field('hero_text', 'option'); ?></span>
						</h1>
						<p><?php the_field('secondary_content', 'option'); ?></p>
					</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</main>
		</div>
	</div>
	<div class="hero--content_articles-header">header row</div>
	<div class="hero--content_articles row">
		<div class="row">
		<!--first block-->
			<div class="col-sm-4">
				<?php
						$meta_query  = WC()->query->get_meta_query();
						$tax_query   = WC()->query->get_tax_query();
						$tax_query[] = array(
							 'taxonomy' => 'product_visibility',
							 'field'    => 'name',
							 'terms'    => 'featured',
							 'operator' => 'IN',
						);

						$args = array(
							 'post_type'           => 'product',
							 'post_status'         => 'publish',
							 'ignore_sticky_posts' => 1,
							 'product_cat'				 => 'business intelligence',
							 'posts_per_page'      => 2,
							 'orderby'             => $atts['orderby'],
							 'order'               => $atts['order'],
							 'meta_query'          => $meta_query,
							 'tax_query'           => $tax_query,
						);
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				?>
				<div class="col-sm-5 article__thumbnail">
					<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

							<h3><?php the_title(); ?></h3>

					</a>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		<!--end first block-->
		<!--second block-->
			<div class="col-sm-4">
				<?php
						$meta_query  = WC()->query->get_meta_query();
						$tax_query   = WC()->query->get_tax_query();
						$tax_query[] = array(
							 'taxonomy' => 'product_visibility',
							 'field'    => 'name',
							 'terms'    => 'featured',
							 'operator' => 'IN',
						);

						$args = array(
							 'post_type'           => 'product',
							 'post_status'         => 'publish',
							 'ignore_sticky_posts' => 1,
							 'product_cat'				 => 'business intelligence',
							 'posts_per_page'      => 2,
							 'orderby'             => $atts['orderby'],
							 'order'               => $atts['order'],
							 'meta_query'          => $meta_query,
							 'tax_query'           => $tax_query,
						);
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				?>
				<div class="col-sm-5 article__thumbnail">
					<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

							<h3><?php the_title(); ?></h3>

					</a>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		<!--end second block-->
		<!--third block-->
			<div class="col-sm-4">
				<?php
						$meta_query  = WC()->query->get_meta_query();
						$tax_query   = WC()->query->get_tax_query();
						$tax_query[] = array(
							 'taxonomy' => 'product_visibility',
							 'field'    => 'name',
							 'terms'    => 'featured',
							 'operator' => 'IN',
						);

						$args = array(
							 'post_type'           => 'product',
							 'post_status'         => 'publish',
							 'ignore_sticky_posts' => 1,
							 'product_cat'				 => 'business intelligence',
							 'posts_per_page'      => 2,
							 'orderby'             => $atts['orderby'],
							 'order'               => $atts['order'],
							 'meta_query'          => $meta_query,
							 'tax_query'           => $tax_query,
						);
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				?>
				<div class="col-sm-5 article__thumbnail">
					<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

							<h3><?php the_title(); ?></h3>

					</a>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		<!--end third block-->
		</div>
	</div>
		<?php include 'partials/logo-bar.php'; ?>
	</div>
	<section class="featured-content__header">
		<h1>Featured Content</h1>
	</section>
	<section class="articles wrap">
		<?php include 'partials/featured-loop.php'; ?>
	</section>
<?php get_footer('front'); ?>
