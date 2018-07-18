<h2><?php garyu_esc_html($category->name); ?></h2>
<div class="row">
        <?php if($gallery_list_count>0) {
            $gallery = &$gallery_list[0];
            $class = 'gallery-img-first';
        ?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pad_right">
            <?php include dirname(__FILE__). "/gallery_item.php"; ?>
        </div>
        <?php } ?>
        <?php if($gallery_list_count>1) { 
            $gallery = &$gallery_list[1];
            $class = 'gallery-img-second';
        ?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad_left">
            <?php include dirname(__FILE__). "/gallery_item.php"; ?>
        </div>
        <?php } ?>
        <?php if($gallery_list_count>2) { ?>
            <?php for($gallery_index=2; $gallery_index<$gallery_list_count; $gallery_index++) { 
                $gallery = &$gallery_list[$gallery_index];
                $class = 'gallery-img-child';
            ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                    <?php include dirname(__FILE__). "/gallery_item.php"; ?>
                </div>
            <?php } ?>
        <?php } ?>
</div>