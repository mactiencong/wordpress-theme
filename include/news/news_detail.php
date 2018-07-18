<?php 
$news = garyu_get_news_detail();
?>
<?php if($news) { ?>
<div class="new_detail">
	<div class="contain">
		<h2><?php garyu_esc_html($news->post_title); ?></h2>
		<div class="content_child">
			<?php garyu_post_content($news->post_content); ?>
		</div>
		<div class="align_button">
			<a href="<?php echo home_url() . '/news'; ?>" class="btn btn-form"><?php garyu_translated_string('ニュース一覧へ'); ?></a>
		</div>
	</div>
</div>
<?php } ?>