<?php if ( is_active_sidebar( 'category-filter' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'category-filter' ); ?>
	</div>
<?php endif; ?>
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
       'posts_per_page'      => 5,
       'hide_empty'          => yes,
       'order'               => 'ASC',
       'meta_query'          => $meta_query,
       'tax_query'           => $tax_query,
       'include'             => $ids,
       'taxonomy'            => 'product_cat',
    );

    $loop = new WP_Query( $args ); ?>
<ul class="row articles">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <li class="col-xs-12">
    <div class="wrap row flex--row_collapse">
      <div class="col-xs-12 col-sm-4 img">
        <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'product'); ?>
        </a>
      </div>
      <div class="col-xs-0 col-sm-1 spacer">&nbsp;</div>
      <div class="col-xs-12 col-sm-7 content">
        <h2><a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
          <?php the_title(); ?>
        </a></h2>
        <?php the_field('product_description'); ?>
        <?php echo apply_filters( 'the_content', $post->post_excerpt ); ?>
        <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" class="primary-btn" style="max-width:200px;color:white !important;">Learn More</a>
      </div>
    </div>
  </li>
  <?php endwhile; ?>
<?php wp_reset_query(); ?>
</ul>
