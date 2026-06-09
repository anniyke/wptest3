<?php
$taxonomy_type = $widget->get_setting('taxonomy_type', '');
$source_categories = $widget->get_setting('source_categories', '');
$source_tags = $widget->get_setting('source_tags', '');

if (!empty($taxonomy_type)) : ?>
    <div class="pxl-post-taxonomy  <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['show_post_counts']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php if ($taxonomy_type == 'categories' && !empty($source_categories)) : ?>
            <?php
            $portfolio_categories = get_terms(array(
                'taxonomy' => 'portfolio-category',
                'hide_empty' => false,
            ));

            $desired_slugs = array_values($source_categories);

            $filtered_categories = array();
            foreach ($portfolio_categories as $category) {
                if (in_array($category->slug, $desired_slugs)) {
                    $category_link = get_term_link($category);
                    $post_count = $category->count;

                    $filtered_categories[] = sprintf(
                        '<li class="cat-item cat-item-%1$s"><a href="%2$s" class="pxl-hover-transition">%3$s <span class="pxl-count pxl-right">(%4$s)</span></a></li>',
                        esc_attr($category->term_id),
                        esc_url($category_link),
                        esc_html($category->name),
                        esc_html($post_count)
                    );
                }
            }

            if (!empty($filtered_categories)) {
                echo '<div class="widget widget_categories"><ul>' . implode('', $filtered_categories) . '</ul></div>';
            }
            ?>
        <?php endif; ?>
        <?php if ($taxonomy_type == 'tags' && !empty($source_tags)) : ?>
            <div class="widget widget_tag_cloud">
                <div class="tagcloud">
                    <?php
                    foreach ($source_tags as $tag_name) {
                        $tag = get_term_by('name', $tag_name, 'post_tag');
                        if ($tag) {
                            $tag_ids[] = $tag->term_id;
                        }
                    }
                    $args = array(
                        'include' => $tag_ids,
                    );
                    wp_tag_cloud($args);
                    ?>
                </div> 
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
