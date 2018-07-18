<?php
const GARYU_LANG_SESSION = 'garyu_locale';
function garyu_get_lang_session(){
    garyu_start_session();
    return isset($_SESSION[GARYU_LANG_SESSION])?$_SESSION[GARYU_LANG_SESSION]: null;
}
function garyu_set_lang_session($lang){
    garyu_start_session();
    $_SESSION[GARYU_LANG_SESSION] = $lang;
}
function garyu_start_session(){
    return (session_status() == PHP_SESSION_NONE) && session_start();
}
function garyu_theme_setup(){
    load_theme_textdomain('garyu', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'garyu_theme_setup' );
add_filter('locale', 'garyu_get_locale');
function garyu_get_locale() {
    return garyu_get_lang_session();
}

function garyu_change_language(){
    $language = isset($_GET['lang'])?$_GET['lang']:null;
    if($language===null) $language = garyu_get_lang_session();
    if(!in_array($language, SUPPORT_LOCALES)) {
        $language = DEFAULT_LOCALE;
    }
    garyu_set_lang_session($language);
	return $language;
}

add_action('garyu_change_language', 'garyu_change_language');

do_action('garyu_change_language');


function garyu_esc_html($string){
	echo esc_html($string);
}

function garyu_translated_string($string){
	echo nl2br(esc_html__($string, 'garyu'));
}

function garyu_append_lang_menu($lang){
    return add_query_arg('lang', $lang, garyu_get_full_current_url());
}

function garyu_get_full_current_url(){
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}