<?php $notify = garyu_get_homepage_complete_contact_notify(); ?>
<div class="form_style3">
	<div class="contain">
			<h2><?php garyu_esc_html($notify->post_title); ?></h2>
		<div class="content_child3">
		<?php garyu_post_content($notify->post_content); ?>
		</div>
	</div>
</div>