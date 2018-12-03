<?php 
function starter_theme_customizer($wp_customize)
{
  // $wp_customize calls go here.
	
	// Primary
    $wp_customize->add_setting('primary_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'section' => 'colors',
        'label' => esc_html__('Primary', 'theme'),
    )));

	// Primary Light
    $wp_customize->add_setting('primary_light_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_light_color', array(
        'section' => 'colors',
        'label' => esc_html__('Primary Light', 'theme'),
    )));

	// Primary Medium
    $wp_customize->add_setting('primary_medium_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_medium_color', array(
        'section' => 'colors',
        'label' => esc_html__('Primary Medium', 'theme'),
    )));

	// Primary Dark
    $wp_customize->add_setting('primary_dark_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_dark_color', array(
        'section' => 'colors',
        'label' => esc_html__('Primary Dark', 'theme'),
    )));

	// Accent
    $wp_customize->add_setting('accent_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'section' => 'colors',
        'label' => esc_html__('Accent', 'theme'),
    )));

	// Text color
    $wp_customize->add_setting('text_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'section' => 'colors',
        'label' => esc_html__('Text', 'theme'),
    )));



  // Uncomment the below lines to remove the default customize sections

    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_panel('widgets');
    $wp_customize->remove_section('custom_css');
    $wp_customize->remove_control("background_color");

  // Uncomment the following to change the default section titles
    $wp_customize->get_section('colors')->title = __('Brand Colors');
}

add_action('customize_register', 'starter_theme_customizer');

function theme_get_customizer_css()
{
    ob_start();

    $text_color = get_theme_mod('text_color', '');
    if (!empty($text_color)) {
        ?>
      body.site {
        color: <?php echo $text_color; ?> !important;
      }
      <?php

    }

    $primary_color = get_theme_mod('primary_color', '');
    if (!empty($primary_color)) {
        ?>
        .woocommerce a.button, #searchform input[type="search"], #searchform #searchsubmit, .primary-btn, input[type="submit"], .nf-field-element input[type=button] {background-color:<?php echo $primary_color; ?> !important;}
        .featured-content h1, .hero--content_articles__title:hover {color:<?php echo $primary_color; ?> !important;}
        .hero--text p {border-right-color:<?php echo $primary_color; ?> !important;}
        .highlight {background:<?php echo $primary_color; ?> !important;}
        .single article .thumbnail img {
            -webkit-box-shadow: 5px 5px <?php echo $primary_color; ?> !important;
            box-shadow: 5px 5px <?php echo $primary_color; ?> !important;
            border: 1px solid <?php echo $primary_color; ?> !important; }
      <?php

    }

    $primary_medium_color = get_theme_mod('primary_medium_color', '');
    if (!empty($primary_medium_color)) {
        ?>
        .woocommerce a.button:hover,.primary-btn:hover, .comment-reply-link:hover, #submit:hover, .primary-btn:focus, .comment-reply-link:focus, #submit:focus, input[type="submit"]:hover, input[type="submit"]:focus, .nf-field-element input[type=button]:hover, .nf-field-element input[type=button]:focus { background-color: <?php echo $primary_medium_color; ?> !important; }
        body.site a:active, .featured-content__header h1 {color:<?php echo $primary_medium_color; ?> !important;}
        .footer {background-color:<?php echo $primary_medium_color; ?> !important; }
      <?php

    }

    $primary_dark_color = get_theme_mod('primary_dark_color', '');
    if (!empty($primary_dark_color)) {
        ?>
        body.site a, .hero--hero-text {color:<?php echo $primary_dark_color; ?> !important;}
        .featured-content h1, .hero--text p {background-color:<?php echo $primary_dark_color; ?> !important;}
      <?php

    }

    $accent_color = get_theme_mod('accent_color', '');
    if (!empty($accent_color)) {
        ?>
        .woocommerce div.product .product_title {border-bottom-color:<?php echo $accent_color; ?> !important;}
        .woocommerce .button.button.alt {background-color:<?php echo $accent_color; ?> !important;}
      <?php

    }

    $primary_light_color = get_theme_mod('primary_light_color', '');
    if (!empty($primary_light_color)) {
        ?>
        .footer-nav li a, .footer .social_platforms a, .hero--inner .hero--hero-text, .article__thumbnail:hover h3 {color:<?php echo $primary_light_color; ?> !important;}
        #wpadminbar a, .woocommerce a.button {color: white !important;}
        input[type="search"]:focus {background-color: white !important;}
      <?php

    }

    $css = ob_get_clean();
    return $css;
}