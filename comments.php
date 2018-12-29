<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'pt-twentyseventeen' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'pt-twentyseventeen'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => twentyseventeen_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'pt-twentyseventeen' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'pt-twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'pt-twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'pt-twentyseventeen' ); ?></p>
	<?php
	endif;

	$comments_args = array(
	'id_form'           => 'commentform',
	'id_submit'         => 'submit',
	'class_submit'      => 'submit',
	'name_submit'       => 'submit',
	'title_reply'       => __( 'Comments', 'pt-twentyseventeen' ),
	'title_reply_to'    => __( 'Reply to %s', 'pt-twentyseventeen' ),
	'cancel_reply_link' => __( 'Cancel reply', 'pt-twentyseventeen' ),
	'label_submit'      => __( 'Submit', 'pt-twentyseventeen' ),
	'format'            => 'html5',

	'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . __( 'Leave a comment:', 'pt-twentyseventeen' ) .
    '</label><br /><textarea id="comment" name="comment" aria-required="true">' .
    '</textarea></p>',

	'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.', 'pt-twentyseventeen' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

	'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( '<strong>Code name: </strong><a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'pt-twentyseventeen' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

	'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.', 'pt-twentyseventeen' ) . '</p>',

	'comment_notes_after' => '',

	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);

	comment_form( $comments_args );
	?>

</div><!-- #comments -->
