<?php
  // check if the flexible content field has rows of data
  if( have_rows('content_sections') ):

       // loop through the rows of data
      while ( have_rows('content_sections') ) : the_row();

      // START FULL WIDTH
          if( get_row_layout() == 'text_and_full_width_image' ):

            if( have_rows('content') ):

                while( have_rows('content') ): the_row(); ?>
                <a name="<?php echo str_replace(' ', '', get_sub_field('headline', 'option')); ?>"></a>
                  <article>
                    <div class="content_section content_section--full-width content_section--<?php the_sub_field('text_alignment'); ?> <?php if( get_sub_field('background_color') ): ?>background-color<?php endif; ?>">
                      <?php if(get_sub_field('headline')) : ?>
                      <div class="content_section--content wrap row">
                        <h1><?php the_sub_field('headline'); ?></h1>
                        <div class="sub-head"><?php the_sub_field('subhead'); ?></div>
                      </div>
                    <?php endif; ?>
                      <?php if( get_sub_field('body_copy') ): ?>
                      <div class="col-xs-10 col-sm-8" style="margin:0 auto;">
                        <?php the_sub_field('body_text'); ?>
                      </div>
                    <?php endif; ?>
                        <?php
                          $attachment_id = get_sub_field('image');
                          $size = "full-width"; // (thumbnail, medium, large, full or custom size)
                          $image = wp_get_attachment_image_src( $attachment_id, $size );
                          // url = $image[0];
                          // width = $image[1];
                          // height = $image[2];
                        ?>
                      <img src="<?php echo $image[0]; ?>">
                    </div>
                  </article>

                <?php endwhile; endif;
          // END FULL WIDTH

          // START HALF WIDTH
          elseif( get_row_layout() == 'text_and_half_image' ):

            if( have_rows('content') ):

                while( have_rows('content') ): the_row(); ?>
                <a name="<?php echo str_replace(' ', '', get_sub_field('headline', 'option')); ?>"></a>
                  <article>
                    <div class="content_section content_section--half content_section--<?php the_sub_field('text_alignment'); ?> <?php if( get_sub_field('background_color') ): ?>background-color<?php endif; ?>">
                      <div class="content_section--content wrap row">
                        <h1><?php the_sub_field('headline'); ?></h1>
                        <?php if(get_sub_field('subhead') ): ?>
                          <div class="sub-head"><?php the_sub_field('subhead'); ?></div>
                        <?php endif; ?>
                      </div>

                      <div class="content_section--<?php the_sub_field('image_alignment'); ?> wrap row">
                        <?php if( get_sub_field('body_copy') ): ?>
                        <div class="col-xs-12 col-sm-7">
                          <?php the_sub_field('body_text'); ?>
                        </div>
                      <?php endif; ?>
                        <div class="col-xs-12 col-sm-5">
                          <?php
                                  $attachment_id = get_sub_field('image');
                                  $size = "full-width"; // (thumbnail, medium, large, full or custom size)
                                  $image = wp_get_attachment_image_src( $attachment_id, $size );
                                  // url = $image[0];
                                  // width = $image[1];
                                  // height = $image[2];
                                ?>

                                <img src="<?php echo $image[0]; ?>">
                        </div>

                      </div>

                    </div>
                  </article>

                <?php endwhile; endif;
                // END HALF WIDTH

                // START CONTACT
                elseif( get_row_layout() == 'contact_section' ):

                  if( have_rows('content') ):

                      while( have_rows('content') ): the_row(); ?>
                      <a name="<?php echo str_replace(' ', '', get_sub_field('headline', 'option')); ?>"></a>
                        <article>

                          <div class="content_section content_section--contact content_section--<?php the_sub_field('text_alignment'); ?> <?php if( get_sub_field('background_color') ): ?>background-color<?php endif; ?>">
                            <?php if(get_sub_field('headline')) : ?>
                            <div class="content_section--content wrap row">
                              <h1><?php the_sub_field('headline'); ?></h1>
                              <?php if(get_sub_field('subhead') ): ?>
                                <div class="sub-head"><?php the_sub_field('subhead'); ?></div>
                              <?php endif; ?>
                            </div>
                          <?php endif; ?>
                            <div class="content_section--<?php the_sub_field('image_alignment'); ?> wrap row" style="justify-content:space-evenly;">

                              <?php if( get_sub_field('body_copy') ): ?>
                              <div class="col-xs-10 col-sm-5 first" style="order:<?php the_sub_field('align_form'); ?>">
                                <?php the_sub_field('body_text'); ?>
                                <?php if(get_sub_field('include_physical_address')) : ?>

                                    <?php if(get_field('physical_address', 'option')) : ?>

                                      <div class="contact-address"><i class="fas fa-globe"></i><?php the_field('physical_address', 'option'); ?>
                                      </div>
                                    <?php endif;  ?>
                                  <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                                <?php if(get_sub_field('include_contact_email')) : ?>

                                    <?php if(get_field('contact_email', 'option')) : ?>
                                      <div class="contact-email"><i class="fas fa-envelope"></i><a href="<?php the_field('contact_email', 'option'); ?>"><?php the_field('contact_email', 'option'); ?></a></div>

                                    <?php endif; ?>
                                  <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                              </div>
                            <?php endif; ?>

                              <div class="col-xs-12 col-sm-5 last" style="order:2;">
                                <?php the_sub_field('contact_form'); ?>
                              </div>

                            </div>

                          </div>
                        </article>

                      <?php endwhile; endif;
                      // END CONTACT

                      // START TESTIMONIAL
                      elseif( get_row_layout() == 'customer_testimonials' ):

                        if( have_rows('content') ):

                            while( have_rows('content') ): the_row(); ?>
                            <a name="<?php echo str_replace(' ', '', get_sub_field('headline', 'option')); ?>"></a>
                              <article>
                                <div class="content_section content_section--contact content_section--<?php the_sub_field('text_alignment'); ?> <?php if( get_sub_field('background_color') ): ?>background-color<?php endif; ?>">
                                  <div class="content_section--content wrap row">
                                    <h1><?php the_sub_field('headline'); ?></h1>
                                    <?php if(get_sub_field('subhead') ): ?>
                                      <div class="sub-head"><?php the_sub_field('subhead'); ?></div>
                                    <?php endif; ?>
                                  </div>

                                  <div class="content_section--testimonials wrap row">
                                    <!-- BEGIN SLIDER -->
                                    <?php	// check if the nested repeater field has rows of data
                                      if( have_rows('testimonials') ): ?>
                                    <div id="carousel">

                                        <div id="testimonial--buttons"><i id="prev" class="fas fa-adjust"></i><i id="next" class="fas fa-adjust fa-flip-horizontal" data-fa-transform="flip-v flip-h"></i> </div>

                                        <div id="slides">
                                            <ul>
                                              <?php // loop through the rows of data
                                              while ( have_rows('testimonials') ) : the_row(); ?>
                                                <li class="slide">
                                                    <div class="quoteContainer">
                                                    <div class="testimonial">
                                                      <i class="fas fa-quote-left"></i>
                                                      <span><?php the_sub_field('testimonial'); ?></span>
                                                      <i class="fas fa-quote-right"></i>
                                                    </div>

                                                        </p>
                                                    </div>
                                                    <div class="authorContainer">
                                                      <div class="testimonial--client-name">
                                                          <?php the_sub_field('client_name'); ?>
                                                      </div>
                                                      <div class="testimonial--client-title">
                                                          <?php the_sub_field('client_title'); ?>
                                                      </div>
                                                    </div>
                                                </li>
                                                <?php	endwhile; endif; ?>


                                            </ul>
                                        </div>
                                        <!-- END SLIDER -->

                                  </div>
                                </article>

                            <?php endwhile; endif;
                            // END TESTIMONIAL
           endif; endwhile; else :

      // no layouts found

  endif;

?>
