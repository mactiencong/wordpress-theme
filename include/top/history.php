<?php
$history = garyu_get_homepage_history();
?>
<div class="relav">
		<div class="container">
			<div class="img_his">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pad_zero">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/histoire.jpg" >
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 relav_mobile">
					<h2><?php garyu_esc_html($history->post_title) ?></h2>
					<?php garyu_post_content($history->post_content) ?>
				</div>
				
			</div>
			
		</div>
	</div>