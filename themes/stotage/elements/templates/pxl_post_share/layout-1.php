<div class="pxl-post-share">
    <?php if ($settings['share_fb']=='true'): ?>
        <a class="pxl-icon icon-facebook " title="<?php echo esc_attr__('Facebook', 'stotage'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink(get_the_ID())); ?>">
            Facebook
        </a>
    <?php endif ?>
    <?php if ($settings['share_tw']=='true'): ?>
        <a class="pxl-icon icon-twitter " title="<?php echo esc_attr__('Twitter', 'stotage'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_permalink(get_the_ID())); ?>&text=<?php echo get_the_title(get_the_ID());?>%20">
            Twitter / X
        </a>
    <?php endif ?>
    <?php if ($settings['share_linked']=='true'): ?>
        <a class="pxl-icon icon-linkedin " title="<?php echo esc_attr__('Linkedin', 'stotage'); ?>" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_permalink(get_the_ID()));?>">Linked In</a>
    <?php endif ?>
    <?php if ($settings['share_skype']=='true'): ?>
     <a class="pxl-icon " title="<?php echo esc_attr__('Pinterest', 'stotage'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>&media=&description=<?php echo urlencode(the_title_attribute(array('echo' => false, 'post' => $post))); ?>">
        Pinterest
    </a>
<?php endif ?>

</div>