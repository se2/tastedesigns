<?php

/**
 * Custom Comment List
 */
class Comment_Walker extends Walker_Comment {
  var $tree_type = 'comment';
  var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

  // constructor – wrapper for the comments list
  function __construct() { ?>

    <section class="comments-list">

  <?php }

  // start_lvl – wrapper for child comments list
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 2; ?>

    <section class="child-comments comments-list">

  <?php }

  // end_lvl – closing wrapper for child comments list
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $GLOBALS['comment_depth'] = $depth + 2; ?>

    </section>

  <?php }

  // start_el – HTML for comment template
  function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;
    $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

    if ( 'article' == $args['style'] ) {
      $tag = 'article';
      $add_below = 'comment';
    } else {
      $tag = 'article';
      $add_below = 'comment';
    } ?>

    <article <?php comment_class((empty( $args['has_children'] ) ? '' : 'parent')); ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
      <div class="comment-content-inner flex p-20 bg-taste-8 my-40">
        <figure class="gravatar"><?php echo get_avatar( $comment, 87, 'blank', 'Avatar', array('class'=>'block bg-taste-9 max-w-initial') ); ?></figure>
        <div class="comment-content pl-40">
          <div class="comment-body min-h-87 pt-10">
            <div class="comment-meta post-meta" role="complementary">
              <h2 class="comment-author font-body text-16 leading-24 text-taste-1 font-bold">
                <?php comment_author(); ?>
                <span class="comment-author-reply font-normal">Says:</span>
              </h2>
              <?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
              <?php if ($comment->comment_approved == '0') : ?>
              <p class="comment-meta-item font-body text-16 leading-24 text-taste-3 italic">Your comment is awaiting moderation.</p>
              <?php endif; ?>
            </div>
            <div class="comment-content post-content font-body text-16 leading-24 text-taste-1" itemprop="text">
              <?php comment_text(); ?>
            </div>
          </div>
          <div class="comment-content-reply font-body text-12 leading-24 tracking-3 text-taste-1 uppercase mt-20">
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
          </div>
        </div>
      </div>

  <?php }

  // end_el – closing HTML for comment template
  function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

    </article>

  <?php }

  // destructor – closing wrapper for the comments list
  function __destruct() { ?>
    </section>
  <?php }
}

add_action('after_setup_theme', function() {

  /**
   * Add custom field to comment form
   */
  add_filter('comment_form_default_fields', function($fields) {
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : ’ );

    $fields['author'] = '<div class="w-half pr-25 inline-block"><input id="author" class="font-body text-14 leading-17 text-taste-2 border-2 border-taste-4 px-20 py-20 w-full" name="author" type="text" placeholder="First Name" size="30" tabindex="1"' . $aria_req . ' /></div>';

    $fields['last_name'] = '<div class="w-half pl-25 inline-block"><input id="last-name" class="font-body text-14 leading-17 text-taste-2 border-2 border-taste-4 px-20 py-20 w-full" name="last-name" type="text" placeholder="Last Name" size="30" tabindex="2"' . $aria_req . ' /></div>';

    $fields['email'] = '<input id="email" class="font-body text-14 leading-17 text-taste-2 border-2 border-taste-4 px-20 py-20 mt-30 w-full" name="email" type="text" placeholder="Email" size="30" tabindex="3"' . $aria_req . ' />';

    $fields['url'] = '';

    $fields['cookies'] = '';

    return $fields;
  });

  /**
   * Re-order fields
   */
  add_filter('comment_form_fields', function($fields) {
    $author_field = $fields['author'];
    unset($fields['author']);
    $fields['author'] = $author_field;

    $last_name_field = $fields['last_name'];
    unset($fields['last_name']);
    $fields['last_name'] = $last_name_field;

    $email_field = $fields['email'];
    unset($fields['email']);
    $fields['email'] = $email_field;

    unset($fields['comment']);
    $fields['comment'] = '<textarea id="comment" class="font-body text-14 leading-17 text-taste-2 border-2 border-taste-4 px-20 py-20 mt-30 w-full" name="comment" placeholder="Comment" cols="45" rows="10" aria-required="true"></textarea>';

    return $fields;
  });

  /**
   * Save new custom field data
   */
  add_action( 'comment_post', function( $comment_id ) {
    if ( ( isset( $_POST['last_name'] ) ) && ( $_POST['last_name'] != ’) )
    $last_name = wp_filter_nohtml_kses($_POST['last_name']);
    add_comment_meta( $comment_id, 'last_name', $last_name );
  });
});
