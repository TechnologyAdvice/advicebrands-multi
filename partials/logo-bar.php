<?php if(have_posts()) : ?>
  <?php if( have_rows('add_partner_logos', 'option') ): ?>
<ul class="hero--logo-bar">
  <?php
  //create a repeater loop
  // check if the repeater field has rows of data
   while ( have_rows('add_partner_logos', 'option') ) : the_row(); ?>

    <?php
      $attachment_id = get_sub_field('logo');
      $size = "medium"; // (thumbnail, medium, large, full or custom size)
      $image = wp_get_attachment_image_src( $attachment_id, $size );
      // url = $image[0];
      // width = $image[1];
      // height = $image[2];
    ?>
    <?php if( get_sub_field('logo')): ?>
      <li>
        <img src="<?php echo $image[0]; ?>">
      </li>
    <?php endif; ?>


  <?php endwhile;?>
  </ul>
  <?php endif; endif; ?>
  <?php wp_reset_postdata(); // reset the query ?>
