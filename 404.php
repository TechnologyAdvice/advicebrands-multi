<!--404-->
<?php get_header('404'); ?>

			<div id="content" style="height:100vh;">

				<div id="inner-content" class="wrap row" style="background:#fff;height: 50vh; display: flex; justify-content: center; align-items: center;">
					<main id="main" class="col-xs-12 col-md-10" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( '404 - Article Not Found', 'startertheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'startertheme' ); ?></p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

						</article>

					</main>

				</div>

			</div>
			<?php get_footer(); ?>
