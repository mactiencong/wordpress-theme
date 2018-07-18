<?php $is_complate_step = isset($GARYU_CONTACT_STEP) && $GARYU_CONTACT_STEP==='complete'; ?>
<div class="status">
    <div class="container">
    <div>
        <div class="col-md-1 col-lg-1">
            
        </div>
            <div class="col30 step1">
        <div id="step1" class="step <?php if(!$is_complate_step) echo 'active'; ?>" >
                <span><b><?php garyu_translated_string('Step 01'); ?></b></span>
                <span> <?php garyu_translated_string('項目の入力'); ?></span>
            </div>
        </div>
            <div class="arrow_img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/ShapeNormal.png" >
            </div>
        <div class="col30 step2">
        <div id="step2" class="step">
            <span><b><?php garyu_translated_string('Step 02'); ?></b></span>
            <span> <?php garyu_translated_string('入力内容の'); ?></span>
        </div>
        </div>
        <div class="arrow_img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/ShapeNormal.png">				
        </div>
        <div class="col30 step3">
            <div id="step3" class="step <?php if($is_complate_step) echo 'active'; ?>">
                <span><b><?php garyu_translated_string('Step03'); ?></b></span>
                    <span><?php garyu_translated_string('発送'); ?></span>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="form_style">
<div class="container">
<div id="contact_form_invalid_message" style="display:none;" class="alert alert-danger">
  <strong><?php garyu_translated_string('Your input is invalid. Please enter a valid input'); ?></strong>
</div>
<form id="garyu_contact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" role="form">
    <input type="hidden" name="action" value="garyu_contact">

<?php
    if($is_complate_step){
        include_once dirname(__FILE__). "/step_three.php";
    }else {
        include_once dirname(__FILE__). "/step_one.php";
        include_once dirname(__FILE__). "/step_two.php";
    }
?>

<div class="align_button">
    <button id="garyu_contact_confirm" data-iscomplete=<?php echo $is_complate_step?"1":"0"; ?> type="button" class="btn btn-form">
        <?php if($is_complate_step) garyu_translated_string('C確認画面に進む'); 
            else garyu_translated_string('S確認画面に進む'); ?>
    </button>
    <button style="display:none;" id="garyu_contact_back" type="button" class="garyu_contact_back btn"><?php garyu_translated_string('前の画面に戻る'); ?></button>
</div>
</form>
</div>
</div>