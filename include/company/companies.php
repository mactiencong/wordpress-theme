<?php
$category_list = garyu_get_company_categories();
?>
<div class="product">
    <div class="container">
    <?php foreach($category_list as $category){ 
        include dirname(__FILE__). "/by_category.php";
     } ?>
    </div>
</div>