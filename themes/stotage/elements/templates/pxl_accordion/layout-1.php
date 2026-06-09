<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);
$count_acc = 1;
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $step = isset($value['step']) ? $value['step'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <?php if ($settings['style']=='style-1' || $settings['style']=='style-3'): ?>
                    <span class="pxl-icon--plus"></span>
                <?php endif ?>
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                <?php if (!empty($step)): ?>
                    <span class="pxl-step"> <?php echo pxl_print_html($step);?></span>
                <?php endif ?>
                <span class="pxl-title--text pxl-pr-20"><?php echo wp_kses_post($title); ?></span>
                <?php if ($settings['style']=='style-2'): ?>
                    <span class="pxl-icon--plus"></span>
                <?php endif ?>
              </<?php pxl_print_html($settings['title_tag']); ?>>
              <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>>
                <?php echo wp_kses_post(nl2br($desc)); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>