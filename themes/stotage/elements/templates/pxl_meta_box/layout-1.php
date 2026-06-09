<?php
extract($settings);
?>
<div  class="pxl-meta-box pxl-meta-box1 pxl-text-img-wrap pxl-parent-transition" >
    <div class="pxl-item--inner">
        <ul class="pxl-item--info">
            <?php foreach ($content_list as $key => $value): ?>
                <li class="list--item pxl-transtion  <?php echo esc_attr($settings['pxl_animate']); ?>"  data-target=".item-img-<?php echo esc_attr($key)?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" >
                    <div class="info">
                        <div class="avatar">
                            <img src="<?php echo esc_url($value['image']['url'])?>" alt="image hover">
                        </div>
                        <?php if(!empty($value['name'])) { ?> 
                            <h4 class="name"><?php echo pxl_print_html($value['name']); ?></h4>
                        <?php } ?>
                        <?php if(!empty($value['date'])) { ?> 
                            <span class="date"><?php echo pxl_print_html($value['date']); ?></span>
                        <?php } ?>
                    </div>
                    <?php if(!empty($value['amount'])) { ?> 
                        <span class="amount"><?php echo pxl_print_html($value['amount']); ?></span>
                    <?php } ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="pxl-item--image">
            <?php foreach ($content_list as $key => $value):  ?>
                <?php if(!empty($value['image']['url'])) : ?>
                    <div class="image--item pxl-spill-middle pxl-ov-hidden item-img-<?php echo esc_attr($key)?>">
                        <div class="image--inner pxl-spill-middle pxl-ov-hidden">
                            <img src="<?php echo esc_url($value['coin_image']['url'])?>" alt="image hover">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>