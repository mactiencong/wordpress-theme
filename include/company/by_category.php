<?php
$company_list = garyu_get_companies_by_category($category->term_id);
?>
<div class="top">
    <h2><?php echo $category->name; ?></h2>
    <?php foreach($company_list as &$company) {
        include dirname(__FILE__). "/company.php";
    } ?>
</div>