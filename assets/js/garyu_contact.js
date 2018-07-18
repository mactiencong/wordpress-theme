var garyu_current_step = 1
var garyu_contact_fields = ['garyu_contact_name','garyu_contact_name_furigana','garyu_contact_email',
                        'garyu_contact_company', 'garyu_contact_department', 'garyu_contact_phone',
                        'garyu_contact_content']

function garyu_contact_confirm_on_click(){
    let is_complete = document.getElementById("garyu_contact_confirm").dataset.iscomplete
    if(is_complete==='1') window.location.href = window.location.origin
    else garyu_contact_next_step()
}
function garyu_contact_next_step(){
    if(garyu_current_step===1){
        garyu_step_one()
    }
    else if(garyu_current_step===2){
        garyu_step_two()
        garyu_reset()
    }
}

function garyu_contact_go_back(){
    if(garyu_current_step===2){
        garyu_current_step--
        garyu_contact_back_step_one()
        garyu_hide_back_button()
    }
}

function garyu_step_one(){
    garyu_fill_input_content_to_step_two()
    if(garyu_validate_contact_form()){
        garyu_contact_next_step_two()
        garyu_current_step ++
        garyu_show_back_button()
    }
}

function garyu_show_back_button(){
    document.getElementById('garyu_contact_back').style.display = 'inline-block'
}

function garyu_hide_back_button(){
    document.getElementById('garyu_contact_back').style.display = 'hidden'
}

function garyu_validate_contact_form(){
    let garyu_contact_form = document.getElementById("garyu_contact")
    let is_valid = garyu_contact_form && garyu_contact_form.checkValidity()? true: false
    garyu_form_set_form_style(is_valid)
    return is_valid
}

function garyu_form_set_form_style(is_valid){
    if(is_valid){
        garyu_form_set_form_style_valid()
    } else {
        garyu_form_set_form_style_invalid()
    }
}

function garyu_form_set_form_style_invalid(){
    document.getElementById("contact_form_invalid_message").style.display='block'
    document.styleSheets[0].insertRule('textarea:invalid, input:invalid { border: 1px solid red; }', 0);
}

function garyu_form_set_form_style_valid(){
    document.getElementById("contact_form_invalid_message").style.display='none'
}

function garyu_step_two(){
    if(garyu_validate_contact_form()){
        document.getElementById("garyu_contact").submit()
    }
}

function garyu_contact_next_step_two(){
    document.getElementById('contact_step_two').style.display = 'block'
    document.getElementById('step2').classList.add('active')
    document.getElementById('contact_step_one').style.display = 'none'
    document.getElementById('step1').classList.remove('active')
}

function garyu_contact_back_step_one(){
    document.getElementById('contact_step_two').style.display = 'none'
    document.getElementById('step2').classList.remove('active')
    document.getElementById('contact_step_one').style.display = 'block'
    document.getElementById('step1').classList.add('active')
}

function garyu_fill_input_content_to_step_two(){
    let input_data = garyu_get_input_value()
    garyu_contact_fields.forEach(function(field){
        let step_two_field = "step_two_" + field
        let step_two_element = document.getElementById(step_two_field)
        if(step_two_element) step_two_element.innerHTML = input_data[field]
    })
}

function garyu_get_input_value(){
    let input_data = []
    garyu_contact_fields.forEach(function(field){
        let input_element = document.getElementById(field)
        input_data[field] = input_element?input_element.value:''
    })
    return input_data
}

function garyu_reset(){
    garyu_current_step = 1
}

(function(){
    document.getElementById("garyu_contact_confirm").onclick = garyu_contact_confirm_on_click
    document.getElementById("garyu_contact_back").onclick = garyu_contact_go_back
})()