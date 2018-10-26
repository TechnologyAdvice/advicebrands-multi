
/* Typography
--------------------------*/
body.site  {
  color:<?php the_field('text','option');?> !important;
}

#testimonial--buttons i, .content_section .contact-email a, .content_section .contact-address a, body.site h1,body.site h2,body.site h3,body.site h4,body.site h5,body.site h6, body.site a:hover {color:<?php the_field('primary','option');?>;}

.header--inner .nav li a, .nf-form-cont .nf-form-title h3 {color:<?php the_field('primary','option');?> !important;}

.hero--content_articles {background: linear-gradient(to bottom, rgba(<?php the_field('primary','option');?>, 0.5) 0%, rgba(<?php the_field('primary_medium','option');?>, 0.7) 100%);}

.hero--hero-text {color:<?php the_field('primary_dark','option');?> !important;}

#mobile-nav {color:<?php the_field('primary','option');?> !important;}

input[type="search"], #searchsubmit {background-color:<?php the_field('primary','option');?> !important;}

input[type="search"]:focus {background-color:white !important;}

.article__thumbnail h3

.single article .thumbnail img {
  -webkit-box-shadow: 5px 5px <?php the_field('primary','option');?> !important;
          box-shadow: 5px 5px <?php the_field('primary','option');?> !important;
  border: 1px solid <?php the_field('primary','option');?> !important; }


body.site a:active, .featured-content__header h1 {color:<?php the_field('primary_medium','option');?>;}

.content_section--testimonials .testimonial--client-name,.content_section--testimonials .testimonial--client-title, .content_section .contact-email .fas, .content_section .contact-address .fas, i#prev:hover, i#next:hover, .article__thumbnail:hover .article__thumbnail--overlay .reveal:before {color:<?php the_field('primary_dark','option');?>;}

body.site a {color:<?php the_field('primary_dark','option');?> !important;}

.highlight {background:<?php the_field('primary','option');?> !important;}

.primary-btn, .comment-reply-link, #submit, input[type="submit"], .nf-field-element input[type=button] {
  background-color: <?php the_field('primary','option');?> !important; }
  .primary-btn:hover, .comment-reply-link:hover, #submit:hover, .primary-btn:focus, .comment-reply-link:focus, #submit:focus, input[type="submit"]:hover, input[type="submit"]:focus, .nf-field-element input[type=button]:hover, .nf-field-element input[type=button]:focus {
    background-color: <?php the_field('primary_medium','option');?> !important; }
  .primary-btn:active, .comment-reply-link:active, #submit:active, input[type="submit"]:active, .nf-field-element input[type=button]:active {
    background-color: <?php the_field('primary','option');?> !important; }

  .article__thumbnail--overlay .reveal {
    background-color: <?php the_field('primary','option');?> !important;}

  .footer {background-color:<?php the_field('primary_medium','option');?> !important; }
