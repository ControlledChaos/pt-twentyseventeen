<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
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
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			</header><!-- .entry-header -->

			<?php if ( is_front_page() && is_user_logged_in() ) :
			global $current_user;
			$user_ID   = $current_user->ID;
			$user_name = $current_user->display_name;
			// Set up comments list
			$args = array(
				'user_id' => $user_ID,
				'number' => '3'
			);
			$comments = get_comments( $args ); ?>
			<section class="user-info">
				<div class="wrap">
					<section class="front-page-profile">
						<div class="front-page-avatar">
							<?php echo get_avatar( $user_ID, 160, null, $user_name, array( 'class' => 'alignleft' ) ); ?>
						</div>
						<div class="front-page-user">
							<h3>Your Dossier:</h3>
							<p><strong>Code Name: </strong><em><?php echo $current_user->display_name; ?></em><br /><strong>Status: </strong><em>Logged In</em></p>
							<p><a href="<?php echo get_edit_user_link(); ?>">Edit Profile</a> | <a href="<?php echo wp_logout_url( home_url() ); ?>">Log Out</a></p>
						</div>
					</section>
					<section class="front-page-comments">
						<h3>Communications:</h3>
						<?php if ( $comments ) : ?>
						<ul>
						<?php
						foreach ( $comments as $comment ) :
							$comment_link = get_comment_link( $comment );
							echo '<li><a href="' . $comment_link . '">' . $comment->post_title . '</a></li>';
						endforeach;
						?>
						</ul>
						<?php else : ?>
							<p>You haven't commented on any posts.</p>
						<?php endif; ?>
					</section>
				</div>
			</section>
			<?php endif; ?>

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
