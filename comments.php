<?php
/**
 * @package Viral
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment!  ?>

    <?php if (have_comments()): ?>
        <h3 class="comments-title">
            <?php
            printf(// WPCS: XSS OK.
                esc_html(_nx('%d Comment', '%d Comments', get_comments_number(), 'comments title', 'viral')), number_format_i18n(get_comments_number())
            );
            ?>
        </h3>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'callback' => 'viral_comment'
            ));
            ?>
        </ul><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments().  ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open()):
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'viral'); ?></p>
    <?php endif; ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $fields = array(
        'author' =>
            '<div class="author-email-url hs-clearfix"><p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
            '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Name', 'viral') . ($req ? '*' : '') . '" /></p>',
        'email' =>
            '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
            '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Email', 'viral') . ($req ? '*' : '') . '" /></p>',
        'url' =>
            '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
            '" size="30" placeholder="' . esc_attr__('Website', 'viral') . '" /></p></div>',
    );


    $args = array(
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__('Comment', 'viral') . '">' .
            '</textarea></p>',
    );
    ?>

    <?php comment_form($args); ?>

</div><!-- #comments -->