<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage PT_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php echo twentyseventeen_time_link(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail()) {
		if ( is_home() ) {
			$thumb_size  = 'twentyseventeen-featured-image';
			$thumb_class = 'alignnone';
		} else {
			$thumb_size  = 'twentyseventeen-featured-image';
			$thumb_class = 'posts-panel-image';
		}
	// If no post thumbnail.
	} else {
		$thumb_size  = null;
		$thumb_class = '';
	} ?>

	<div class="entry-summary">
		<a href="<?php the_permalink(); ?>" >
			<?php the_post_thumbnail( $thumb_size, array( 'class' => $thumb_class ) ); ?>
		</a>
		<?php
		if ( is_home() || is_front_page() ) {
			the_content();
		} else {
			the_excerpt();
		} ?>
	</div><!-- .entry-summary -->
	<?php if ( is_home() || is_front_page() ) : ?>
	<p class="link-more"><a href="<?php the_permalink(); ?>" class="more-link">Read More</a></p>
	<?php endif; ?>

</article><!-- #post-## -->
