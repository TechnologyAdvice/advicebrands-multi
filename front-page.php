<!--front-page-->
<?php get_header('front'); ?>
	<div class="hero--content">
		<div id="inner-content">
			<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" style="height:100%;">
				<div class="hero--text wrap">
					<h1>
						<span class="hero--hero-text"><?php the_field('hero_text', 'option'); ?></span>
					</h1>
					<p><?php the_field('secondary_content', 'option'); ?></p>
				</div>
			</main>
		</div>
	</div>
	<div class="hero--content_articles-header"></div>
	<div class="hero--content_articles row">
		<div class="row">
		<!--first block-->
			<div class="col-xs-12 col-sm-4 flex flex--column">
				<?php $tag_one = get_field('box_one_tag', 'option'); ?>
				<a href="product-tag/<?php $page_link = sanitize_title_for_query( $tag_one ); echo esc_attr( $page_link ); ?>" class="hero--content_articles__title"><?php echo $tag_one; ?> <i class="fas fa-chevron-circle-right"></i></a>
				<div class="hero--content_articles__container">
				<?php
					$meta_query = WC()->query->get_meta_query();
					$tax_query = WC()->query->get_tax_query();
					$tax_query[] = array(
						'taxonomy' => 'product_visibility',
						'field' => 'name',
						'terms' => 'featured',
						'operator' => 'IN',
					);

					$args = array(
						'post_type' => 'product',
						'post_status' => 'publish',
						'ignore_sticky_posts' => 1,
						'product_tag' => $tag_one,
						'posts_per_page' => 2,
						'orderby' => 'desc',
						'meta_query' => $meta_query,
					);
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				?>

				<div class="col-xs-6 article__thumbnail">
					<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

							<h3><?php the_title(); ?></h3>

					</a>
				</div>
				<?php endwhile; ?>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		<!--end first block-->
		<!--second block-->
			<div class="col-xs-12 col-sm-4 flex flex--column">
				<?php $tag_two = get_field('box_two_tag', 'option'); ?>
				<a href="product-tag/<?php $page_link = sanitize_title_for_query( $tag_two ); echo esc_attr( $page_link ); ?>" class="hero--content_articles__title"><?php echo $tag_two; ?> <i class="fas fa-chevron-circle-right"></i></a>
				<div class="hero--content_articles__container">
				<?php
					$meta_query = WC()->query->get_meta_query();
					$tax_query = WC()->query->get_tax_query();
					$tax_query[] = array(
						'taxonomy' => 'product_visibility',
						'field' => 'name',
						'terms' => 'featured',
						'operator' => 'IN',
					);

					$args = array(
						'post_type' => 'product',
						'post_status' => 'publish',
						'ignore_sticky_posts' => 1,
						'product_tag' => $tag_two,
						'posts_per_page' => 2,
						'orderby' => 'desc',
						'tax_query' => $tax_query,
					);
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				?>
				<div class="col-xs-6 article__thumbnail">
					<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

							<h3><?php the_title(); ?></h3>

					</a>
				</div>
				<?php endwhile; ?>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		<!--end second block-->
		<!--third block-->
			<div class="col-xs-12 col-sm-4 flex flex--column">
				<?php $tag_three = get_field('box_three_tag', 'option'); ?>
				<a href="product-tag/<?php $page_link = sanitize_title_for_query( $tag_three ); echo esc_attr( $page_link ); ?>" class="hero--content_articles__title"><?php echo $tag_three; ?> <i class="fas fa-chevron-circle-right"></i></a>
				<div class="hero--content_articles__container">
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
							 'product_tag'		     => $tag_three,
							 'posts_per_page'      => 2,
							 'orderby'             => 'desc',
							 'meta_query'          => $meta_query,
						);
		        $loop = new WP_Query( $args );
		        while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				?>
				<div class="col-xs-6 article__thumbnail">
					<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

							<h3><?php the_title(); ?></h3>

					</a>
				</div>
				<?php endwhile; ?>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		<!--end third block-->
		</div>
	</div>
		<?php include 'partials/logo-bar.php'; ?>
	</div>
	<section class="featured-content row">
		<h1>Featured Content</h1>
		<?php include 'partials/product-loop.php'; ?>
	</section>
<?php get_footer('front'); ?>
