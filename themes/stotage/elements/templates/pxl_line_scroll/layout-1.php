<div class="pxl_line_scroll">
    <div class="line">
        <div class="line-change"></div>
        <?php foreach ($settings['dot'] as $key => $value): ?>
                <span class="dot elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>" >
                </span>
        <?php endforeach; ?>
    </div>
</div>
