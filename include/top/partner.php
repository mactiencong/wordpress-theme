<?php 
$partner_list = garyu_get_partners();
?>
<div class="back">
		<div class="partner">
		<div class="container">
			
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 part_mobile title" >
					<?php garyu_translated_string('パートナー会社') ?>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 part_mobile">
					<?php foreach($partner_list as &$partner){ ?>
					<div class="line part_mobile">
						<div>
							<?php garyu_esc_html($partner->post_title) ?>
						</div>
						<p><?php garyu_esc_html($partner->custom_fields['website_url']) ?></p>
					</div>
					<?php } ?>
				</div>
		</div>
		

	</div>