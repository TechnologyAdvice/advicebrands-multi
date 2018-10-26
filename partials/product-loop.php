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

    $loop = new WP_Query( $args );

    $product_categories = get_terms( 'product_cat', $args );

    wp_dropdown_categories($args);

    while ( $loop->have_posts() ) : $loop->the_post(); global $products;

?>
<div>
  <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); ?>

      <h3><?php the_title(); ?></h3>
      <p><?php echo apply_filters( 'the_content', $post->post_content ); ?></p>

  </a>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
