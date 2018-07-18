<?php
function garyu_custom_menu_page_removing() {
	if (strpos($_SERVER['REQUEST_URI'], 'admin-post.php') === false) {
		remove_menu_page( 'index.php' );
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'upload.php' );
		remove_menu_page( 'edit.php?post_type=page' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'plugins.php' );
		remove_menu_page( 'themes.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'edit.php?post_type=acf' );
		remove_menu_page( 'admin.php?page=mlang' );
		remove_menu_page( 'options-general.php' );
	}
}
add_action( 'admin_init', 'garyu_custom_menu_page_removing', 999 );
add_action( 'init', function() {
	if ( defined('PLL_ADMIN') && PLL_ADMIN ) {
		remove_action( 'admin_menu', array( PLL(), 'add_menus' ) );
	}
} );

function garyu_remove_toolbar_node($wp_admin_bar) {
	$wp_admin_bar->remove_node('new-content');
	$wp_admin_bar->remove_node('updates');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('view');
	$wp_admin_bar->remove_menu('edit-profile');
	$wp_admin_bar->remove_menu('user-info');
	$wp_admin_bar->remove_menu('languages');
}
add_action('admin_bar_menu', 'garyu_remove_toolbar_node', 999);

add_filter('screen_options_show_screen', '__return_false');

function garyu_hide_update_notice() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
	
add_action( 'admin_notices', 'garyu_hide_update_notice', 1 );

add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
add_filter( 'update_footer', '__return_empty_string', 11 );

add_action('admin_menu', 'garyu_add_intro_history_update_link_menu');

function garyu_add_intro_history_update_link_menu() {
	global $submenu;
	$intro_post_id = garyu_get_post_id_by_lang(HOMEPAGE_INTRO_POST_ID);
	$homepage_menu_url = 'edit.php?post_type='.GARYU_HOMEPAGE_POST_TYPE;
    $intro_edit_link = get_site_url() . '/wp-admin/post.php?post='.$intro_post_id.'&action=edit';
	$submenu[$homepage_menu_url][] = array( __('Update Intro', 'garyu'), 'edit_posts', $intro_edit_link );
	$history_post_id = garyu_get_post_id_by_lang(HOMEPAGE_HISTORY_POST_ID);
	$history_edit_link = get_site_url() . '/wp-admin/post.php?post='.$history_post_id.'&action=edit';
	$submenu[$homepage_menu_url][] = array( __('Update History', 'garyu'), 'edit_posts', $history_edit_link );
	$contact_complete_post_id = garyu_get_post_id_by_lang(HOMEPAGE_CONTACT_COMPLETE_POST_ID);
	$contact_complete_edit_link = get_site_url() . '/wp-admin/post.php?post='.$contact_complete_post_id.'&action=edit';
	$submenu[$homepage_menu_url][] = array( __('Update complete contact notify', 'garyu'), 'edit_posts', $contact_complete_edit_link );
}

add_action('admin_menu', 'garyu_add_mail_update_link_menu');

function garyu_add_mail_update_link_menu() {
	global $submenu;
	$mail_to_admin_post_id = GARYU_MAIL_TO_ADMIN_POST_ID;
	$mail_menu_url = 'edit.php?post_type='.GARYU_MAIL_POST_TYPE;
    $mail_to_admin_edit_link = get_site_url() . '/wp-admin/post.php?post='.$mail_to_admin_post_id.'&action=edit';
	$submenu[$mail_menu_url][] = array( __('Mail to Admin', 'garyu'), 'edit_posts', $mail_to_admin_edit_link );
	$mail_to_user_post_id = GARYU_MAIL_TO_USER_POST_ID;
	$mail_to_user_edit_link = get_site_url() . '/wp-admin/post.php?post='.$mail_to_user_post_id.'&action=edit';
	$submenu[$mail_menu_url][] = array( __('Mail to User', 'garyu'), 'edit_posts', $mail_to_user_edit_link );
}

function garyu_hide_post_permalink() {
    return '';
}
add_filter( 'get_sample_permalink_html', 'garyu_hide_post_permalink' );

add_filter( 'contextual_help', 'garyu_remove_help', 999, 3 );
function garyu_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}

add_action('admin_head', 'garyu_custom_admin_style');
function garyu_custom_admin_style() {
  echo "<link rel='stylesheet' href='".get_template_directory_uri() . '/assets/css/garyu_admin.css'."'/>";
}


function garyu_custom_admin_js() {
    echo '<script type="text/javascript" src="'. get_template_directory_uri() . '/assets/js/garyu_admin.js' . '"></script>';
}
add_action('admin_footer', 'garyu_custom_admin_js');


add_filter( 'post_row_actions', 'garyu_remove_trash_post_row_actions', 10, 1 );
function garyu_remove_trash_post_row_actions( $actions )
{
	$post_type = get_post_type();
    if(in_array($post_type, GARYU_NOT_ALLOW_DELETE_AND_CREATE_POST_TYPES))
        unset( $actions['trash'] );
     return $actions;
}

function garyu_hide_add_new() {
	global $submenu;
	unset($submenu['users.php'][15]);
	unset($submenu['edit.php?post_type='.GARYU_GALLERY_POST_TYPE][10]);
	unset($submenu['edit.php?post_type='.GARYU_COMPANY_POST_TYPE][10]);
	unset($submenu['edit.php?post_type='.GARYU_HOMEPAGE_POST_TYPE][10]);
	unset($submenu['edit.php?post_type='.GARYU_NEWS_POST_TYPE][10]);
	unset($submenu['edit.php?post_type='.GARYU_PARTNER_COMPANY_POST_TYPE][10]);
}
add_action('admin_menu', 'garyu_hide_add_new');

add_action( 'admin_bar_menu', 'garyu_change_top_site_link', 999 );

function garyu_change_top_site_link( $wp_admin_bar ) {
    $all_toolbar_nodes = $wp_admin_bar->get_nodes();
	foreach ( $all_toolbar_nodes as $node ) {
        if($node->id === 'site-name')
        {
            $args = $node;
            $args->href .= 'wp-admin';
			$wp_admin_bar->add_node( $args );
        }
	}
}	

const LANG_COLUMN_NAME = 'current_lang';
function garyu_manage_posts_columns(){
	foreach(GARYU_POST_TYPES as $post_type){
		add_filter('manage_'.$post_type.'_posts_columns', 'garyu_add_current_language_posts_columns');
	}
}
garyu_manage_posts_columns();

function garyu_add_current_language_posts_columns( $defaults ) {
	$columns[LANG_COLUMN_NAME] = __('Language', 'garyu');
	return array_slice($defaults, 0, 1, true) +
    array(LANG_COLUMN_NAME => '') +
    array_slice($defaults, 1, count($defaults) - 1, true);
}

function garyu_manage_posts_custom_column(){
	foreach(GARYU_POST_TYPES as $post_type){
		add_action( 'manage_'.$post_type.'_posts_custom_column', 'garyu_add_current_language_flag_column_list_post', 10, 2 );
	}
}
garyu_manage_posts_custom_column();

function garyu_add_current_language_flag_column_list_post( $column_name, $post_id ) {
    if($column_name===LANG_COLUMN_NAME){
		echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69SsDEvj37x+ERGbAwZ9//wACiAUoysXFBST///8P0QOm//+HU0jgxYsXAAHEAlP0H8HYt+//4SP/f//6b2b238sLrpqRkRFoCUAAsaCrXrv2/8KF///8+f/r9//Dh/8/ffI/OQWiAeJCgABigrseJPT27f/Vq////v3/1y8oWrzk/+PHcEv+/PkDEEBMEM/B3fj/40eo0t9g8suX/w8f/odZAVQMEEAsQAzj/2cQFf3PxARWCrYEaBXQLCkpqB/+/wcqBgggJrjxQPX/hYX/+/v///kLqhpIBgf/l5ODhxiQBAggFriToDoTEv5zcf3ftQuk2s7uf0wM3MdAAPQDQAAxvn37lo+PDy4KZUDcycj4/z9CBojv3r0LEEAgG969eweLSBDEBSCWAAQYACaTbJ/kuok9AAAAAElFTkSuQmCC" title="日本語" alt="日本語">';
	}
}

function garyu_remove_edit_from_bulk_actions_all_post_type(){
	foreach(GARYU_POST_TYPES as $post_type){
		add_filter( 'bulk_actions-edit-'.$post_type, 'garyu_remove_edit_from_bulk_actions' );
	}
	foreach(GARYU_NOT_ALLOW_DELETE_AND_CREATE_POST_TYPES as &$post_type){
		add_filter( 'bulk_actions-edit-'.$post_type, 'garyu_remove_action_from_bulk_actions' );
	}
}
function garyu_remove_action_from_bulk_actions($actions){
	unset( $actions[ 'trash' ] );
	unset( $actions[ 'edit' ] );
	return $actions;
}
function garyu_remove_edit_from_bulk_actions( $actions ){
	unset( $actions[ 'edit' ] );
	return $actions;
}
garyu_remove_edit_from_bulk_actions_all_post_type();

function garyu_mail_content_notice(){
	$screen = get_current_screen();
	$is_edit_mail_screen = $screen->parent_base === 'edit' && $screen->post_type===GARYU_MAIL_POST_TYPE && $screen->id===GARYU_MAIL_POST_TYPE;
	if($is_edit_mail_screen){
		echo '<p>Support replace some tags:</p>
			  <p><em>@name</em> will be replaced by <em>name</em> of contacted user</p>
			  <p><em>@email</em> will be replaced by <em>email</em> of contacted user</p>
			  <p><em>@company</em> will be replaced by <em>company name</em> of contacted user</p>
			  <p><em>@phone</em> will be replaced by <em>phone number</em> of contacted user</p>
			  <p><em>@content</em> will be replaced by <em>content field</em> from contact form</p>
		';
	}
}
add_action('admin_notices','garyu_mail_content_notice');