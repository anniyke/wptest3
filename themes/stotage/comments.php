<?php
/**
 * @package Case-Themes
 */

if ( post_password_required() ) {
    return;
} ?>

<div id="comments" class="comments-area">

    <?php
    if ( have_comments() ) : ?>
        <div class="comment-list-wrap">

            <h2 class="comments-title">
                <?php
                $comment_count = get_comments_number();
                if ( 1 === intval($comment_count) ) {
                    echo esc_html__( '1 Comment', 'stotage' );
                } else {
                    echo esc_attr( $comment_count ).' '.esc_html__('Comments', 'stotage');
                }
                ?>
            </h2>

            <?php the_comments_navigation(); ?>

            <ul class="comment-list">
                <?php
                wp_list_comments( array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'callback'   => 'stotage_comment_list',
                    'max_depth'  => 3
                ) );
                ?>
            </ul>

            <?php the_comments_navigation(); ?>
        </div>
        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'stotage' ); ?></p>
            <?php
        endif;

    endif;

    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'         => 'btn-submit',
        'title_reply'       => esc_attr__( 'Make a Comment', 'stotage'),
        'title_reply_to'    => esc_attr__( 'Make a Comment To ', 'stotage') . '%s',
        'cancel_reply_link' => esc_attr__( 'Cancel Comment', 'stotage'),
        'submit_button'     => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" />add comment</button>',
        'comment_notes_before' => '',
        'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' =>
            '<div class="row"><div class="comment-form-author col-lg-6 col-md-6 col-sm-12">'.
            '<label>'.esc_html__('Full name ', 'stotage').'<pc>**</pc>'.'</label>'.
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30" placeholder="'.esc_attr__('Your Name', 'stotage').'"/>
            </div>',

            'email' =>
            '<div class="comment-form-email col-lg-6 col-md-6 col-sm-12">'.
            '<label>'.esc_html__('Email address ', 'stotage').'<pc>**</pc>'.'</label>'.
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30" placeholder="'.esc_attr__('Email Address', 'stotage').'"/>
            </div>',
        )
    ),
        'comment_field' =>  '<div class="comment-form-comment">'.'<label>'.esc_html__('Message ', 'stotage').'<pc>**</pc>'.'</label>'.'<textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Your Comment...', 'stotage').'" aria-required="true">' .
        '</textarea></div>',
    );
    comment_form($args); ?>
</div>