<?php
include_once 'functions/constant.php';
include_once 'functions/language.php';
include_once 'functions/post_type.php';
include_once 'functions/modify_screen.php';
include_once 'functions/get_data.php';
include_once 'functions/contact.php';

const DEFAULT_ADMIN_PAGE = 'edit.php?post_type=company&lang='.DEFAULT_LOCALE;
function garyu_load_index(){
    wp_redirect(admin_url(DEFAULT_ADMIN_PAGE), 301);
    exit;
}
add_action('load-index.php', 'garyu_load_index', 10, 2);

function garyu_login_redirect( $redirect_to, $request, $user ){
    return admin_url(DEFAULT_ADMIN_PAGE);
}
add_filter('login_redirect','garyu_login_redirect', 10, 3);

add_action('wp_trash_post', 'garyu_restrict_post_deletion');
function garyu_restrict_post_deletion($post_id) {
    $post_type = get_post_type($post_id);
    if( in_array($post_type, GARYU_NOT_ALLOW_DELETE_AND_CREATE_POST_TYPES)) {
      wp_die(__('The post you were trying to delete is protected.'));
    }
}

function garyu_modify_user_roles(){
    remove_role( 'subscriber' );
    remove_role( 'author' );
    remove_role( 'contributor' );
}
add_action('init', 'garyu_modify_user_roles', 1);

add_filter('redirect_post_location', 'garyu_redirect_to_list_after_update_post', 10, 2);

function garyu_redirect_to_list_after_update_post($location, $post_id)
{
    $post_type = get_post_type( $post_id );
    if (in_array($post_type, GARYU_POST_TYPES)){
        $list_post_url = 'edit.php?post_type='.$post_type.'&lang='.DEFAULT_LOCALE;
        return admin_url($list_post_url);
    }
    return $location;
}