<?php
/**
 * @package WordPress
 * @subpackage Truther_PT_Seventeen
 * @since 1.0
 * @version 1.0
 *
 * Template Name: Front Page Section
 * Template Post Type: page
 * Description: For pages used as a front page section.
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
