<?php
$category_list = garyu_get_gallery_categories();
$category_list_count = count($category_list);
?>
<div class="content">
    <div class="container">
        <?php for($category_index=0; $category_index<$category_list_count; $category_index++) {
            $category = &$category_list[$category_index];
            $gallery_list = garyu_get_galleries_by_category($category->term_id);
            $gallery_list_count = count($gallery_list);
            if($category_index & 1) {
                include dirname(__FILE__). "/gallery_block_first.php";
            } else {
                include dirname(__FILE__). "/gallery_block_second.php";
            }
        } ?>
    </div>
</div>