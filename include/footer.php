<footer class="footer">
    <div class="row">
        <div class="container">
        
            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 align_footer ">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-footer-white.svg" style="width: 80px">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 menu_footer">
				<div class="col-xs-12 col-sm-2 inline_mobile first">
                <a href="<?php echo get_home_url(); ?>"><?php garyu_translated_string('ホーム'); ?></a>
                </div>
                <div class="col-xs-12 col-sm-2 inline_mobile">
                <a href="<?php echo get_home_url() . '/news'; ?>"><?php garyu_translated_string('ニュース'); ?></a>
                </div>
                <div class="col-xs-12 col-sm-2 inline_mobile">
                <a href="<?php echo get_home_url() . '/company'; ?>"><?php garyu_translated_string('商品紹介'); ?></a>
                </div>
                <div class="col-xs-12 col-sm-2 inline_mobile">
                <a href="<?php echo get_home_url() . '/gallery'; ?>"><?php garyu_translated_string('ギャラリー'); ?></a>
                </div>
                <div class="col-xs-12 col-sm-4 inline_mobile last">
                <a href="<?php echo get_home_url() . '/contact'; ?>"><?php garyu_translated_string('お問い合わせ'); ?></a>
                </div>
            </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 align_footer1" onclick="openLang()">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/language-white@4x.png">
            <span><?php garyu_translated_string('LANGUAGE'); ?></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/arrow-down-white.png" alt=""></span>
        </div>
        </div>
    </div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/action.js"></script>