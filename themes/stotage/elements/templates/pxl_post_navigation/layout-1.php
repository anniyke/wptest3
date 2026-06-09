<?php
global $post;
$post_type = get_post_type($post);
$allowed_types = ['post' => 'post', 'service' => 'service', 'portfolio' => 'portfolio'];

if (isset($settings['type'], $allowed_types[$settings['type']])) {
    $current_type = $settings['type'];
    $target_post_type = $allowed_types[$current_type];

    if ($post_type !== $target_post_type) return;
    if ($target_post_type !== 'post') {
        add_filter('get_previous_post_where', function ($where) use ($target_post_type) {
            return str_replace("post_type = 'post'", "post_type = '$target_post_type'", $where);
        });
        add_filter('get_next_post_where', function ($where) use ($target_post_type) {
            return str_replace("post_type = 'post'", "post_type = '$target_post_type'", $where);
        });
    }

    $previous_post = get_previous_post();
    $next_post = get_next_post();

    if ($target_post_type !== 'post') {
        remove_all_filters('get_previous_post_where');
        remove_all_filters('get_next_post_where');
    }

    if (empty($previous_post) && empty($next_post)) return;
    ?>

    <div class="pxl-post-navigation">
        <?php if (is_a($previous_post, 'WP_Post') && get_the_title($previous_post->ID) != '') : ?>
            <div class="pxl--item item--prev pxl-navigation-btn--wrap pxl-navigation--prev">
                <a class="pxl-icon-link pxl-arrow--prev" href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>">
                    <?php if (!empty($settings['btn_text1'])): ?>
                        <?php echo pxl_print_html($settings['btn_text1']); ?>
                    <?php else: ?>
                        <?php echo pxl_print_html('Prev','stotage'); ?>
                    <?php endif ?>
                </a>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['link_grid_page'])) : ?>
            <div class="pxl--item pxl--item-grid">
                <a href= "<?php echo esc_url($settings['link_grid_page']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M0.623284 0.614537C-0.207761 1.43973 -0.207761 4.126 0.623284 4.93363C1.2471 5.38934 2.01227 5.60915 2.78283 5.55399C3.5534 5.60915 4.31857 5.38934 4.94238 4.93363C5.77342 4.10844 5.77342 1.42217 4.94238 0.614537C4.11133 -0.193099 1.44848 -0.216509 0.623284 0.614537Z" fill="#CB360F"/>
                        <path d="M0.623284 7.05204C-0.207761 7.87723 -0.207761 10.5635 0.623284 11.3711C1.2471 11.8268 2.01227 12.0466 2.78283 11.9915C3.5534 12.0466 4.31857 11.8268 4.94238 11.3711C5.77342 10.5459 5.77342 7.85967 4.94238 7.05204C4.11133 6.2444 1.44848 6.22099 0.623284 7.05204Z" fill="#CB360F"/>
                        <path d="M9.2194 5.55399C9.98996 5.60915 10.7551 5.38934 11.3789 4.93363C12.21 4.10844 12.21 1.42217 11.3789 0.614537C10.5479 -0.193099 7.86748 -0.216509 7.05985 0.614537C6.25221 1.44558 6.2288 4.126 7.05985 4.93363C7.68366 5.38934 8.44883 5.60915 9.2194 5.55399Z" fill="#CB360F"/>
                        <path d="M7.06078 7.05204C6.22974 7.87723 6.22974 10.5635 7.06078 11.3711C7.6846 11.8268 8.44976 12.0466 9.22033 11.9915C9.9909 12.0466 10.7561 11.8268 11.3799 11.3711C12.2109 10.5459 12.2109 7.85967 11.3799 7.05204C10.5488 6.2444 7.88598 6.22099 7.06078 7.05204Z" fill="#CB360F"/>
                    </svg>
                </a>
            </div>
        <?php endif; ?>
        <?php if (is_a($next_post, 'WP_Post') && get_the_title($next_post->ID) != '') : ?>
            <div class="pxl--item item--next pxl-navigation-btn--wrap pxl-navigation--next">
                <a class="pxl-icon-link pxl-arrow--next" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                    <?php if (!empty($settings['btn_text1'])): ?>
                        <?php echo pxl_print_html($settings['btn_text2']); ?>
                    <?php else: ?>
                        <?php echo pxl_print_html('Next','stotage'); ?>
                    <?php endif ?>
                </a>
            </div>
        <?php endif; ?>
    </div>

<?php
}
?>
