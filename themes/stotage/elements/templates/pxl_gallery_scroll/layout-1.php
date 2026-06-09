<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
}
$count=1;
?>
<div class="pxl-wrap-scroll">
    <div class="pxl-img-scroll">
        <div class="wrap-content">
            <?php foreach ($settings['list_image'] as $key => $value):
                $image = isset($value['image']) ? $value['image'] : '';
                if(!empty($image['id'])) { ?>
                    <div class="pxl-item--image img-<?php echo pxl_print_html($count++); ?>" >
                        <?php if(!empty($image['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => 'full',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <?php echo pxl_print_html($thumbnail); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
            <div class="content">
                <h4 class="title">
                    <?php echo pxl_print_html($settings['title']); ?>
                </h4>
                <?php if (!empty($settings['button_text'])): ?>
                    <a class="btn  btn-default  btn-style-2  pxl-icon--left" <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none"><path d="M9.71875 1.125C9.84375 0.96875 10.0938 0.96875 10.25 1.125L13.875 4.75C14.0312 4.90625 14.0312 5.125 13.875 5.28125L10.25 8.90625C10.0938 9.0625 9.84375 9.0625 9.71875 8.90625L9.46875 8.6875C9.34375 8.53125 9.34375 8.3125 9.46875 8.15625L12.0938 5.53125H0.375C0.15625 5.53125 0 5.375 0 5.15625V4.84375C0 4.65625 0.15625 4.46875 0.375 4.46875H12.0938L9.46875 1.875C9.34375 1.71875 9.34375 1.5 9.46875 1.34375L9.71875 1.125Z" fill="white"></path></svg>
                        <span class="pxl--btn-text">
                            <?php echo pxl_print_html($settings['button_text']); ?>
                        </span>
                    </a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>