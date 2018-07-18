<div id="contact_step_one">
    <div class="form-group">
    <div class="col-md-1 col-lg-1">
        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label">			
    <label for=""><span><?php garyu_translated_string('必須'); ?></span> <?php garyu_translated_string('お名前'); ?></label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label">
    <input type="text" required name="name" class="form-control" id="garyu_contact_name" data-value-missing='<?php garyu_translated_string('Name is required'); ?>' >
    </div>

    </div>
    <div class="form-group">
        <div class="col-md-1 col-lg-1">
        
    </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label padding_label">	
        <label for=""><?php garyu_translated_string('ふりがな'); ?></label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label">
        <input type="text" name="name_furigana" class="form-control" id="garyu_contact_name_furigana" >
    </div>
        
    </div>
    <div class="form-group">
        <div class="col-md-1 col-lg-1">
        
    </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label padding_label">
        <label for=""><span><?php garyu_translated_string('必須'); ?></span>  <?php garyu_translated_string('メールアド'); ?></label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label">			
        <input required type="email" name="email" class="form-control" id="garyu_contact_email" data-value-missing='<?php garyu_translated_string('Email is invalid'); ?>' >
    </div>

    </div>
    <div class="form-group">
        <div class="col-md-1 col-lg-1">
        
    </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label padding_label">

        <label for=""><?php garyu_translated_string('会社名'); ?></label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label">

        <input type="text" name="company" class="form-control" id="garyu_contact_company" >
        </div>
    </div>
        <div class="form-group">
            <div class="col-md-1 col-lg-1">
        
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label padding_label"><label for=""><?php garyu_translated_string('部雪'); ?></label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label">

                <input type="text" name="department" class="form-control" id="garyu_contact_department" >
                </div>
    </div>
        <div class="form-group">
            <div class="col-md-1 col-lg-1">
        
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label padding_label">

            <label for=""><span><?php garyu_translated_string('必須'); ?></span> <?php garyu_translated_string('電話番号'); ?></label>
            </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label">

        <input type="text" required name="phone" class="form-control" id="garyu_contact_phone" >
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-1 col-lg-1">
        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 align_label padding_label">
            <label for=""><span><?php garyu_translated_string('必須'); ?></span> <?php garyu_translated_string('コンテンツ'); ?></label>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 align_label" style="padding-bottom: 20px;">
        <textarea required name="content" style="margin-top: 0px; margin-bottom: 0px; height: 230px;" id="garyu_contact_content" class="form-control"></textarea>
        </div>
    </div>
</div>