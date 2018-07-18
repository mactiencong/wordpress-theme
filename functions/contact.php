<?php
add_action( 'admin_post_nopriv_garyu_contact', 'garyu_contact' );
add_action( 'admin_post_garyu_contact', 'garyu_contact' );
function garyu_contact(){
    garyu_send_mail_to_admin();
    garyu_send_mail_to_user();
    wp_redirect( home_url(). '/contact_complete' );
    exit;
}

function garyu_send_mail_to_admin(){
    $mail_to_admin = garyu_build_mail_content_to_admin();
    return garyu_send_mail(GARYU_ADMIN_MAIL, $mail_to_admin);
}

function garyu_send_mail_to_user(){
    $user_mail = $_POST['email'];
    $mail_to_user = garyu_build_mail_content_to_user();
    return garyu_send_mail($user_mail, $mail_to_user);
}

function garyu_build_mail_content_to_admin(){
    $mail_to_admin = garyu_get_mail_to_admin();
    return garyu_build_mail($mail_to_admin);
}

function garyu_build_mail_content_to_user(){
    $mail_to_user = garyu_get_mail_to_user();
    return garyu_build_mail($mail_to_user);
}

function garyu_build_mail(&$mail_post){
    return array(
        'subject'=>garyu_build_mail_content($mail_post->post_title),
        'content'=>garyu_build_mail_content(wpautop($mail_post->post_content))
    );
}

function garyu_send_mail($to, &$mail){
    $headers = array('Content-Type: text/html; charset=UTF-8');
    return wp_mail($to, $mail['subject'], $mail['content'], $headers);
}

const CONTACT_REPLACE_FIELDS = array('name', 'name_furigana', 'email', 'company', 'phone', 'department', 'content');
function garyu_build_mail_content($content){
    foreach(CONTACT_REPLACE_FIELDS as &$field){
        $str_replace_search[] = "@{$field}";
        $str_replace_replace[] = garyu_get_data_contact($field);
    }
    return str_replace($str_replace_search, $str_replace_replace, $content);
}

function garyu_get_data_contact($field_name){
    return isset($_POST[$field_name])? $_POST[$field_name]: '';
}