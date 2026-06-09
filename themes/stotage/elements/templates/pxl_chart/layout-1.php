<?php
$html_id = pxl_get_element_id($settings);
if(isset($settings['pxl_chart']) && !empty($settings['pxl_chart']) && count($settings['pxl_chart'])): ?>
    <div class="pxl-chart pxl-chart-1 " type_canvas='line'   >
        <?php foreach ($settings['pxl_chart'] as $key => $value):
            $chart_title = isset($value['chart_title']) ? $value['chart_title'] : '';
            $label_chart = isset($value['label_chart']) ? $value['label_chart'] : '';
            $chart_value = isset($value['chart_value']) ? $value['chart_value'] : '';
            $chart_color = isset($value['chart_color']) ? $value['chart_color'] : '';
            ?>
            <span style='display: none;' chart_border_width='<?php echo esc_attr($settings['chart_border_width']); ?>' chart_border_color='<?php echo esc_attr($settings['chart_border_color']); ?>' chart_title='<?php echo esc_attr($chart_title); ?>'  chart_value='<?php echo esc_attr($chart_value); ?>' chart_color='<?php echo esc_attr($chart_color); ?>'></span>
        <?php endforeach; ?>
        <div class="chart-bar">
            <canvas id="<?php echo esc_attr($html_id); ?>" class="mychart"></canvas>
        </div>
    </div>
    <?php endif; ?>