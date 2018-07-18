<?php
$intro = garyu_get_homepage_intro();
?>
<div class="intro">
    <div class="container">
        <div class="img_top">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/img-who-we-are.jpg">
            <div class="container_content">
                <h2><?php garyu_esc_html($intro->post_title) ?></h2>
                <div id="hide" style="overflow: hidden;">
                    <?php garyu_post_content($intro->post_content) ?>
                </div>
                <div class="more_img" id="more">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/icn-sp-detail.png" style="width: 10%"><span style="font-size: 20px"><?php garyu_translated_string('もっと'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>