/* Typography
--------------------------*/

/* Primary */

/* Primary - Background Color  */

#searchform input[type="search"], #searchform #searchsubmit, .primary-btn, input[type="submit"], .nf-field-element input[type=button] {background-color:<?php the_field('primary', 'option'); ?> !important;}

/* Primary - Color  */

.featured-content h1 {color:<?php the_field('primary', 'option'); ?> !important;}

.hero--text p {border-right-color:<?php the_field('primary', 'option'); ?> !important;}

/* Primary - Background */
.highlight {background:<?php the_field('primary','option');?> !important;}

/* Primary - Shadow */

.single article .thumbnail img {
      -webkit-box-shadow: 5px 5px <?php the_field('primary','option');?> !important;
      box-shadow: 5px 5px <?php the_field('primary','option');?> !important;
      border: 1px solid <?php the_field('primary','option');?> !important; }


/* Primary Medium */

.primary-btn:hover, .comment-reply-link:hover, #submit:hover, .primary-btn:focus, .comment-reply-link:focus, #submit:focus, input[type="submit"]:hover, input[type="submit"]:focus, .nf-field-element input[type=button]:hover, .nf-field-element input[type=button]:focus { background-color: <?php the_field('primary_medium','option');?> !important; }

body.site a:active, .featured-content__header h1 {color:<?php the_field('primary_medium','option');?> !important;}

.footer {background-color:<?php the_field('primary_medium','option');?> !important; }

/* Primary Dark - Color */

body.site a, .hero--hero-text {color:<?php the_field('primary_dark','option');?> !important;}

.featured-content h1, .hero--text p {background-color:<?php the_field('primary_dark', 'option'); ?> !important;}

/* Accent */

.woocommerce div.product .product_title {border-bottom-color:<?php the_field('accent', 'option'); ?> !important;}

.woocommerce .button.button.alt {background-color:<?php the_field('accent', 'option'); ?> !important;}

/* Text */

body.site  {
  color:<?php the_field('text','option');?> !important;
}

/* Primary - Light */

.footer-nav li a, .footer .social_platforms a {color:<?php the_field('primary_light', 'option'); ?> !important;}

/* White */
#wpadminbar a {color: white !important;}
input[type="search"]:focus {background-color:white !important;}
