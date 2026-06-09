<?php 
$html_id = pxl_get_element_id($settings);
extract($settings);

$ids = esc_attr('grad-'.$html_id);
$ids1 = esc_attr('grad1-'.$html_id);
?>
<div class="pxl-circle-svg">
  <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="<?php if($settings['bg_parallax_height']['size'])
   echo esc_attr($settings['bg_parallax_height']['size']); else echo 370 ?>" viewBox="0 0 1920 <?php if($settings['bg_parallax_height']['size'])
   echo esc_attr($settings['bg_parallax_height']['size']); else echo 370 ?>" fill="none">
    <defs>
      <linearGradient class="linear-dot1" id="<?php echo esc_attr($ids); ?>" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop class="stop1" offset="0%" style="stop-color:#40CCFC;stop-opacity:1" />
        <stop class="stop2" offset="100%" style="stop-color:#1AECF5;stop-opacity:1" />
      </linearGradient>
      <linearGradient class="linear-dot2" id="<?php echo esc_attr($ids1); ?>" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop class="stop1" offset="0%" style="stop-color:#40CCFC;stop-opacity:1" />
        <stop class="stop2" offset="100%" style="stop-color:#1AECF5;stop-opacity:1" />
      </linearGradient>
    </defs>
    <g id="Layer_1" data-name="Layer 1">
      <?php echo pxl_print_html($settings['path_svg_text']); ?>
    </g>
  </svg>    
</div>