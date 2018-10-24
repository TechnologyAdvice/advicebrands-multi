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
	<div id="container">
		<?php if (have_posts()) : ?>
		<?php
			$attachment_id = get_field('site_image', 'option');
			$size = "full"; // (thumbnail, medium, large, full or custom size)
			$image = wp_get_attachment_image_src( $attachment_id, $size );
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
		?>
	<div class="hero--background-image" style="background-image:url('<?php echo $image[0]; ?>');"></div>
		<div class="hero">
			<div class="overlay">
				<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
					<div id="inner-header" class="wrap">
						<div class="header-nav row">
							<a href="/" rel="nofollow" class="logo col-xs-12 col-sm-2">
									<?php if( get_field('secondary_logo', 'option')): ?>
										<img src="<?php the_field('secondary_logo', 'option'); ?>">
									<?php elseif( get_field('primary_logo', 'option')) : ?>
										<img src="<?php the_field('primary_logo', 'option'); ?>">
									<?php endif; ?>
							</a>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
						<div class="col-xs-12 col-sm-7">
							<nav role="navigation" class="row" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<?php
									wp_nav_menu(
										array(
											'container' => false,                           // remove nav container
											'container_class' => 'menu ',                 // class of container (should you choose to use it)
											'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
											'menu_class' => 'nav top-nav ',               // adding custom nav class
											'theme_location' => 'main-nav',                 // where it's located in the theme
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
						<div class="col-xs-0 col-sm-3 mobile-hide"><?php get_search_form(); ?></div>
						<div id="mobile-nav" class="col-xs-12">
							Menu <i class="fas fa-bars"></i>
						</div>
					</div>
				</header>
