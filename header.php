<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>

		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>
		<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
		<script>
      window.sr = ScrollReveal({ duration: 600, reset: false, easing: 'ease-in', scale: .98, distance:'50px'});
    </script>
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>
	<body <?php body_class('site'); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php if (is_single()) { ?>

			<header class="header header--inner" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div id="inner-header" class="wrap row">
						<div class="header-nav col-xs-12">
						<a href="/" rel="nofollow" class="logo col-xs-12 col-sm-4">
							<div>
								<img src="<?php the_field('primary_logo', 'option'); ?>">
							</div>
						</a>

					<div class="col-xs-12 col-sm-4 menu-left">
						<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php
								wp_nav_menu(
									array(
										'container' => false,                           // remove nav container
										'container_class' => 'menu ',                 // class of container (should you choose to use it)
										'menu' => __( 'The Left Menu', 'bonestheme' ),  // nav name
										'menu_class' => 'nav top-nav ',               // adding custom nav class
										'theme_location' => 'main-nav-left',                 // where it's located in the theme
										'before' => '',                                 // before the menu
													'after' => '',                                  // after the menu
													'link_before' => '',                            // before each link
													'link_after' => '',                             // after each link
													'depth' => 0,                                   // limit the depth of the nav
										'fallback_cb' => '',                             // fallback function (if there is one)
									)
								);
								?>
						</nav>
					</div>
					<div class="col-xs-12 col-sm-4 menu-right">
						<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php
								wp_nav_menu(
									array(
									'container' => false,                           // remove nav container
									'container_class' => 'menu ',                 // class of container (should you choose to use it)
									'menu' => __( 'The Right Menu', 'bonestheme' ),  // nav name
									'menu_class' => 'nav top-nav ',               // adding custom nav class
									'theme_location' => 'main-nav-right',                 // where it's located in the theme
									'before' => '',                                 // before the menu
												'after' => '',                                  // after the menu
												'link_before' => '',                            // before each link
												'link_after' => '',                             // after each link
												'depth' => 0,                                   // limit the depth of the nav
									'fallback_cb' => '',                             // fallback function (if there is one)
									)
								);
							?>
						</nav>
					</div>
					<div id="mobile-nav" class="col-xs-12">
						Menu <i class="fas fa-bars"></i>
					</div>
				</div>

			</header>
			<div id="container">

				<?php
								$attachment_id = get_field('site_image', 'option');
								$size = "full"; // (thumbnail, medium, large, full or custom size)
								$image = wp_get_attachment_image_src( $attachment_id, $size );
								// url = $image[0];
								// width = $image[1];
								// height = $image[2];
							?>
				<div class="hero--background-image hero--background-image--inner hero--background-image--inner_single" style="background-image:url('<?php echo $image[0]; ?>');"></div>
			<?php endwhile; endif; ?>
				<div class="hero hero--inner">

			<div>

				</div>

						<?php } else { ?>

							<header class="header header--inner" role="banner" itemscope itemtype="http://schema.org/WPHeader">
								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
								<div id="inner-header" class="wrap row">
										<div class="header-nav col-xs-12">
										<a href="/" rel="nofollow" class="logo col-xs-12 col-sm-4">
											<div>
												<img src="<?php the_field('primary_logo', 'option'); ?>">
											</div>
										</a>

									<div class="col-xs-12 col-sm-4 menu-left">
										<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
											<?php
												wp_nav_menu(
													array(
														'container' => false,                           // remove nav container
														'container_class' => 'menu ',                 // class of container (should you choose to use it)
														'menu' => __( 'The Left Menu', 'bonestheme' ),  // nav name
														'menu_class' => 'nav top-nav ',               // adding custom nav class
														'theme_location' => 'main-nav-left',                 // where it's located in the theme
														'before' => '',                                 // before the menu
																	'after' => '',                                  // after the menu
																	'link_before' => '',                            // before each link
																	'link_after' => '',                             // after each link
																	'depth' => 0,                                   // limit the depth of the nav
														'fallback_cb' => '',                             // fallback function (if there is one)
													)
												);
												?>
										</nav>
									</div>
									<div class="col-xs-12 col-sm-4 menu-right">
										<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
											<?php
												wp_nav_menu(
													array(
													'container' => false,                           // remove nav container
													'container_class' => 'menu ',                 // class of container (should you choose to use it)
													'menu' => __( 'The Right Menu', 'bonestheme' ),  // nav name
													'menu_class' => 'nav top-nav ',               // adding custom nav class
													'theme_location' => 'main-nav-right',                 // where it's located in the theme
													'before' => '',                                 // before the menu
																'after' => '',                                  // after the menu
																'link_before' => '',                            // before each link
																'link_after' => '',                             // after each link
																'depth' => 0,                                   // limit the depth of the nav
													'fallback_cb' => '',                             // fallback function (if there is one)
													)
												);
											?>
										</nav>
									</div>
									<div id="mobile-nav" class="col-xs-12">
										Menu <i class="fas fa-bars"></i>
									</div>
								</div>

							</header>
							<div id="container">

								<?php
												$attachment_id = get_field('site_image', 'option');
												$size = "full"; // (thumbnail, medium, large, full or custom size)
												$image = wp_get_attachment_image_src( $attachment_id, $size );
												// url = $image[0];
												// width = $image[1];
												// height = $image[2];
											?>
								<div class="hero--background-image hero--background-image--inner" style="background-image:url('<?php echo $image[0]; ?>');"></div>
							<?php endwhile; endif; ?>
								<div class="hero hero--inner">

							<div class="overlay overlay--inner">
								<div class="wrap hero hero--inner">
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<main id="main" class="col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

											<div class="hero--text">
												<h1>
													<span class="hero--hero-text"><?php the_title(); ?></span>
												</h1>
											</div>

										</main>
									<?php endwhile; endif ?>
									<?php wp_reset_postdata(); ?>
								</div>
								<div class="col-xs-12 col-sm-4 menu-left">
 		 						<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
 		 							<?php
 		 								wp_nav_menu(
 		 									array(
 		 										'container' => false,                           // remove nav container
 		 										'container_class' => 'menu ',                 // class of container (should you choose to use it)
 		 										'menu' => __( 'The Left Menu', 'bonestheme' ),  // nav name
 		 										'menu_class' => 'nav top-nav ',               // adding custom nav class
 		 										'theme_location' => 'main-nav-left',                 // where it's located in the theme
 		 										'before' => '',                                 // before the menu
 		 													'after' => '',                                  // after the menu
 		 													'link_before' => '',                            // before each link
 		 													'link_after' => '',                             // after each link
 		 													'depth' => 0,                                   // limit the depth of the nav
 		 										'fallback_cb' => '',                             // fallback function (if there is one)
 		 									)
 		 								);
 		 								?>
 		 						</nav>
 		 					</div>
 		 					<div class="col-xs-12 col-sm-4 menu-right">
 		 						<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
 		 							<?php
 		 								wp_nav_menu(
 		 									array(
 		 									'container' => false,                           // remove nav container
 		 									'container_class' => 'menu ',                 // class of container (should you choose to use it)
 		 									'menu' => __( 'The Right Menu', 'bonestheme' ),  // nav name
 		 									'menu_class' => 'nav top-nav ',               // adding custom nav class
 		 									'theme_location' => 'main-nav-right',                 // where it's located in the theme
 		 									'before' => '',                                 // before the menu
 		 												'after' => '',                                  // after the menu
 		 												'link_before' => '',                            // before each link
 		 												'link_after' => '',                             // after each link
 		 												'depth' => 0,                                   // limit the depth of the nav
 		 									'fallback_cb' => '',                             // fallback function (if there is one)
 		 									)
 		 								);
 		 							?>
 		 						</nav>
 		 					</div>
 		 					<div id="mobile-nav" class="col-xs-12">
 		 						Menu <i class="fas fa-bars"></i>
 		 					</div>
 		 				</div>
 		 			</header>
			 <? } ?>
