<div class="content_his">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 align his_inline">
        <b><?php _e(get_the_date( 'Y-m-d', $news->ID )); ?></b>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 his_inline">
        <a href="<?php garyu_esc_html('news/' . $news->post_name); ?>"><?php garyu_esc_html($news->post_title); ?></a>
    </div>
</div>