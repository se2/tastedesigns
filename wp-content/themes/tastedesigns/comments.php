<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
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
	if ( have_comments() ) :
		?>
		<div class="comments-separator bg-taste-5 h-2 w-265 mx-auto"></div>
		<h2 class="comments-title font-title text-36 leading-49.36 lg:text-42 lg:leading-57 text-taste-1 text-center mt-60 mb-60 lg:mt-90 lg:mb-80">
			Comments
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<?php
		wp_list_comments( array(
			'walker' => new Comment_Walker(),
		) );
		?> <!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ttg-wp' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$args = array(
		'id_form'           		=> 'commentform',
		'class_form'      			=> 'c-blog__form text-0 clearfix px-20 lg:px-0',
		'class_submit'      		=> 'c-blog__submit font-body text-16 leading-30.16 tracking-4.24 lg:text-18 lg:leading-30.18 lg:tracking-4.77 text-taste-2 uppercase px-20 lg:px-30 py-25 bg-transparent',
		'name_submit'       		=> 'submit',
		'title_reply'       		=> __( 'Leave a Comment' ),
		'title_reply_before'		=> '<h2 id="reply-title" class="comment-reply-title font-title text-36 leading-49.36 lg:text-42 lg:leading-57 text-taste-1 text-center mb-40 mt-80 px-20 lg:px-0">',
		'title_reply_after'			=> '</h2>',
		'label_submit'      		=> __( 'Submit' ),
		'format'            		=> 'xhtml',
		'comment_notes_before'	=> '',
	);

	comment_form($args);
	?>

</div><!-- #comments -->
