<?php
$news_list = garyu_get_news(1, 3); 
?>
<div class="his">
    <div class="container contain_his">
        <h2 style="text-align: center;"><?php garyu_translated_string('ニュース') ?></h2>
        <?php
        foreach($news_list as &$news){
            include dirname(__FILE__). "/news_item.php";
        }
        ?>
        <div class="but">
            <a href="news/" class="btn btn-default"><?php garyu_translated_string('ニュース一覧へ') ?></a>
        </div>

    </div>
</div>