<?php
$news_list = garyu_get_news();
?>
<div class="new_list">
    <div class="contain">
        <div class="line_one">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_home">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/home.png">
                <span class="add_home"> <?php garyu_translated_string('ホーム'); ?> </span>
                <span>  /  </span> <span><?php garyu_translated_string('ニュース'); ?></span>
            </div>
        </div>
        <?php foreach($news_list as &$news) {
            include dirname(__FILE__). "/news_item.php";
        } ?>
        <div class="line_one_paging">
            <ul>
                <li><a href="<?php garyu_news_previous_page_link($news_list); ?>"><< <?php garyu_translated_string('前へ'); ?></a></li>
        <span class="number_line">
            <li <?php if(garyu_get_page_query()==1) {echo 'class="active"';} ?>><a href="<?php garyu_news_next_page_link($news_list, 1) ?>" >1</a></li>
            <li <?php if(garyu_get_page_query()==2) {echo 'class="active"';} ?>><a href="<?php garyu_news_next_page_link($news_list, 2); ?>" >2</a></li>
            <li <?php if(garyu_get_page_query()==3) {echo 'class="active"';} ?>><a href="<?php garyu_news_next_page_link($news_list, 3); ?>" >3</a></li>
        </span>
                <li><a href="<?php garyu_news_next_page_link($news_list); ?>"><?php garyu_translated_string('次へ'); ?> >></a></li>
            </ul>
        </div>
    </div>
    </div>