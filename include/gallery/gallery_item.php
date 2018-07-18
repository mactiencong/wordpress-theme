<a class="fancybox-thumbs" data-fancybox-group="<?php echo $category->term_id; ?>" href="<?php echo $gallery->custom_fields['image']['url']; ?>">
    <img class="<?php echo $class; ?>" src="<?php echo $gallery->custom_fields['image']['url']; ?>"/>
    <div class="cap_img">
        <p><?php garyu_esc_html($gallery->post_title); ?></p>
    </div>
</a>