<html>
<head>
    <title><?php garyu_translated_string('Garyu Trading'); ?></title>
    <?php include_once dirname(__FILE__). "/asset_header.php"; ?>
</head>
<body>
<?php include_once dirname(__FILE__). "/lang_popup.php"; ?>
<div class="header <?php if(!is_front_page()) echo 'head'; ?>">
    <div class="navbar" id="nav">
        <div class="container" style="padding:0;">
            <div class="col3 logo">		
            <img id="img_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/svg/LOGONormal.svg" >
        <div class="bit_map" >
            <img id="img_text" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/svg/BitmapNormal.svg">
            <img id="img_flag" src="<?php echo get_template_directory_uri(); ?>/assets/images/top/svg/BitmapNormal_1.svg">
        </div>
                            
    </div>
        <?php include_once dirname(__FILE__). "/menu.php"; ?>
                <div class="menu">
                    <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 menu_ipad" style="padding-right: 0">
                        <a class="language color" onclick="openLang()" id="icon_lang">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/language-white@4x.png" class="img_res" id="img_res">
                            <span class="color">Language</span>
                            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/arrow-down-white.png" id="img_arrow"></span>
                            
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 " style="padding-right: 0" >
                        <a class="openbtn" onclick="openNav()" id="icon_menu"></a>
                    </div>
                </div>
            </div>
    </div>

    <div class="text_header">
        <div class="text"><h1><?php garyu_translated_string('ハンガリーと日本の架け橋へ'); ?></h1></div>　
    </div>
</div>