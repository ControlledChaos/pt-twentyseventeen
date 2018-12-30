<?php
/**
 * Displays user info on the front page
 *
 * @package WordPress
 * @subpackage PT_Seventeen
 * @since 1.0
 * @version 1.0
 */
global $current_user;
$user_ID   = $current_user->ID;
$user_name = $current_user->display_name;
// Set up comments list
$args = array(
	'user_id' => $user_ID,
	'number'  => '3'
);
$comments = get_comments( $args ); ?>
<section class="user-info">
	<div class="wrap">
		<section class="front-page-profile">
			<div class="front-page-avatar">
				<?php echo get_avatar( $user_ID, 160, null, $user_name, array( 'class' => 'alignleft' ) ); ?>
			</div>
			<div class="front-page-user">
				<h3><?php _e( 'Your Dossier:', 'pt-twentyseventeen' ); ?></h3>
				<p><strong><?php _e( 'Code Name:', 'pt-twentyseventeen' ); ?> </strong><em><?php echo $current_user->display_name; ?></em><br /><strong><?php _e( 'Status:', 'pt-twentyseventeen' ); ?> </strong><em><?php _e( 'Logged In', 'pt-twentyseventeen' ); ?></em></p>
				<p><a href="<?php echo get_edit_user_link(); ?>"><?php _e( 'Edit Profile', 'pt-twentyseventeen' ); ?></a> | <a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Log Out', 'pt-twentyseventeen' ); ?></a></p>
			</div>
		</section>
		<section class="front-page-comments">
			<h3><?php _e( 'Communications:', 'pt-twentyseventeen' ); ?></h3>
			<?php if ( $comments ) { ?>
			<ul>
			<?php
			foreach ( $comments as $comment ) :
				$comment_link = get_comment_link( $comment );
				echo '<li><a href="' . $comment_link . '">' . $comment->post_title . '</a></li>';
			endforeach;
			?>
			</ul>
			<?php } else { ?>
				<p><?php _e( 'You haven\'t commented on any posts.', 'pt-twentyseventeen' ); ?></p>
			<?php } ?>
		</section>
	</div>
</section>