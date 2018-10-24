<?php include 'partials/logo-bar.php'; ?>
	<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<?php if(have_posts()) : the_post(); ?>
				<div id="inner-footer" class="wrap row">
					<?php if( get_field('secondary_logo', 'option')): ?>
						<div class="col-xs-12 col-md-3 footer_logo">
							<img src="<?php the_field('secondary_logo', 'option') ?>">
						</div>
					<?php elseif( get_field('primary_logo', 'option') ): ?>
						<div class="col-xs-12 col-md-3 footer_logo">
							<img src="<?php the_field('primary_logo', 'option') ?>">
						</div>


						<!--nothing-->
					<?php endif; ?>
					<div class="col-xs-12 col-md-9">
						<nav role="navigation">
							<?php wp_nav_menu(array(
	    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
	    					'container_class' => 'footer-links',         // class of container (should you choose to use it)
	    					'menu' => __( 'Footer Links', 'startertheme' ),   // nav name
	    					'menu_class' => 'nav footer-nav',            // adding custom nav class
	    					'theme_location' => 'footer-links',             // where it's located in the theme
	    					'before' => '',                                 // before the menu
	    					'after' => '',                                  // after the menu
	    					'link_before' => '',                            // before each link
	    					'link_after' => '',                             // after each link
	    					'depth' => 0,                                   // limit the depth of the nav
	    					'fallback_cb' => 'starter_footer_links_fallback'  // fallback function
							)); ?>
						</nav>
					</div>

					<div class="physical_address col-xs-12 col-md-6 first">
						<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.<br><?php the_field('physical_address', 'option'); ?></p>
					</div>
					<div class="social_platforms col-xs-12 col-md-6 last">
						<?php
								// check if the repeater field has rows of data
								if( have_rows('social_platforms', 'option') ):
								// loop through the rows of data
									while ( have_rows('social_platforms', 'option') ) : the_row();
										// display a sub field value
									?>
											<a href="<?php the_sub_field('social_link') ?>" class="fab fa-<?php the_sub_field('social_name')?>" target="_blank"></a>
								<?php
									endwhile;
								else :
									// no rows found
								endif;
								?>
					</div>

				</div>

			</footer>


		<?php endif; ?>
		<?php // all js scripts are loaded in library/starter.php ?>
		<?php wp_footer(); ?>

		<!--script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script-->

	</body>

</html> <!-- end of site. what a ride! -->
