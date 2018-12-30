<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage PT_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<?php if ( has_post_thumbnail() && ! is_front_page() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );

		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->
	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php echo sprintf(
					'<h2 class="entry-title front-page-title"><span class="screen-reader-text">%1s</span></h2>',
					esc_html__( 'Question Everything, Especially Authority', 'pt-twentyseventeen' )
				); ?>
				<?php pt_twentyseventeen_intro_subheading(); ?>

			</header><!-- .entry-header -->

			<?php if ( is_front_page() && is_user_logged_in() ) {
				pt_twentyseventeen_user_info_front();
			} ?>

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'pt-twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
