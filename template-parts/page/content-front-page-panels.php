<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		$thumbnail_text = get_field( 'truther_front_section_image_text' );
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<header>
				<h2><?php the_title(); ?></h2>
			</header>
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<?php if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) {
		$panel_ID = 'front-page-posts';
	} else {
		$panel_ID = 'page-' . get_the_ID();
	} ?>
	<div id="<?php echo $panel_ID; ?>" class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php
				$subtitle = get_field( 'truther_subtitle' );
				if ( ! has_post_thumbnail() ) { the_title( '<h2 class="entry-title">', '</h2>' ); }
				if ( $subtitle ) { echo '<h3>' . $subtitle . '</h3>'; }
				?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<?php // Show three most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => false,
					'no_found_rows'       => true,
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>

					<div id="recent-posts-panel" class="recent-posts">

						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
						<hr />
						<p><a class="posts-page-link" href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>"><?php _e( 'All Posts', 'pt-twentyseventeen' ); ?> <?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?></a></p>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
