<div class="line_one">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <span><?php garyu_esc_html(get_the_date( 'Y-m-d', $news->ID )); ?></span>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 pad_new__bot">
        <p><a href="<?php garyu_esc_html($news->post_name); ?>"><?php garyu_esc_html($news->post_title); ?></a></p>
    </div>
</div>