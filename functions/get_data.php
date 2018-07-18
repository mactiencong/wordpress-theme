<?php
function garyu_get_post_id_by_lang($post_id){
	return defined('PLL_ADMIN')? pll_get_post($post_id, get_locale()):$post_id;
}
function garyu_get_post($post_type='post', $id=null){
	$post_id = $id? $id: get_the_ID();
	$tranlate_post_id = garyu_get_post_id_by_lang($post_id);
	if(!$tranlate_post_id) return null;
	$post = get_post($tranlate_post_id);
	$is_invalid_post = $post && $post->post_type === $post_type;
	if(!$is_invalid_post) return null;
	$post->custom_fields = get_fields($post->ID);
	return $post;
}
function garyu_get_news_detail(){
	return garyu_get_post(GARYU_NEWS_POST_TYPE, get_the_ID());
}
function garyu_get_all_posts_by_category($post_type='post', $category_id){
	$filter = array(
		'post_type' => $post_type,
		'lang' => get_locale(),
		'numberposts'=>-1,
		'nopaging' => true,
		'tax_query'=> array(
			array(
				'taxonomy'=> garyu_get_category_key($post_type),
				'field' => 'term_id',
				'terms' =>  $category_id
			)
		)
	);
	$posts = get_posts($filter);
	foreach($posts as &$post){
		$post->custom_fields = get_fields($post->ID);
	}
	return $posts;
}
function garyu_get_gallery_categories(){
	return garyu_get_categories_by_post_type(GARYU_GALLERY_POST_TYPE);
}

function garyu_get_company_categories(){
	return garyu_get_categories_by_post_type(GARYU_COMPANY_POST_TYPE);
}

function garyu_get_categories_by_post_type($post_type){
	$category_list = get_terms(garyu_get_category_key($post_type));
	foreach($category_list as &$category){
		$category = garyu_get_category_by_lang($category->term_id);
	}
	return $category_list;
}
function garyu_get_galleries_by_category($category_id){
	return garyu_get_all_posts_by_category(GARYU_GALLERY_POST_TYPE, $category_id);
}
function garyu_get_companies_by_category($category_id){
	return garyu_get_all_posts_by_category(GARYU_COMPANY_POST_TYPE, $category_id);
}
function garyu_get_gallery(){
	return garyu_get_post(GARYU_GALLERY_POST_TYPE);
}
function garyu_get_company(){
	return garyu_get_post(GARYU_COMPANY_POST_TYPE);
}
function garyu_get_category_by_lang($category_id){
	return defined('PLL_ADMIN')?get_term(pll_get_term($category_id, get_locale())):$category_id;
}

function garyu_register_menu() {
	register_nav_menu('garyu_menu',__( 'Menu' ));
}
add_action( 'init', 'garyu_register_menu' );

function garyu_get_menus(){
	return get_terms(array('taxonomy'=>'nav_menu','hide_empty' => false));
}

function garyu_get_partners(){
	$posts = get_posts(array(
		'post_type' => GARYU_PARTNER_COMPANY_POST_TYPE,
		'lang' => get_locale(),
		'numberposts'=>-1,
		'nopaging' => true
	));
	foreach($posts as &$post){
		$post->custom_fields = get_fields($post->ID);
	}
	return $posts;
}

function garyu_get_homepage_complete_contact_notify(){
	return garyu_get_post(GARYU_HOMEPAGE_POST_TYPE, HOMEPAGE_CONTACT_COMPLETE_POST_ID);
}

function garyu_get_homepage_intro(){
	return garyu_get_post(GARYU_HOMEPAGE_POST_TYPE, HOMEPAGE_INTRO_POST_ID);
}

function garyu_get_homepage_history(){
	return garyu_get_post(GARYU_HOMEPAGE_POST_TYPE, HOMEPAGE_HISTORY_POST_ID);
}

function garyu_get_news($page=null, $posts_per_page=null){
	$page = $page?$page:garyu_get_page_query();
	return get_posts(array(
		'post_type' => GARYU_NEWS_POST_TYPE,
		'lang' => get_locale(),
		'offset' => $page - 1,
		'posts_per_page'=>$posts_per_page?$posts_per_page:GARYU_NEWS_PER_PAGE
	));
}

function garyu_post_content(&$content){
	_e(wpautop($content, true));
}

function garyu_news_next_page_link(&$news_list, $next_page=null){
	if(garyu_has_next_page($news_list)){
		if($next_page===null) $next_page = garyu_get_page_query()+1;
	} else {
		$next_page=-1;
	}
	garyu_news_page_link($next_page);
}

function garyu_has_next_page(&$news_list){
	return count($news_list)>=GARYU_NEWS_PER_PAGE;
}

function garyu_news_previous_page_link(){
	$current_page = garyu_get_page_query();
	$previous_page = $current_page === 1? $current_page: $current_page -1;
	garyu_news_page_link($previous_page);
}

function garyu_news_page_link($page){
	if($page<=0) _e('#');
	else _e(add_query_arg(array('pg'=>$page), home_url() . '/news'));
}

function garyu_get_page_query(){
	$page = isset($_GET['pg'])?intval($_GET['pg']):1;
	return $page<=0? 1: $page;
}

function garyu_e($string){
	_e($string, 'garyu');
}

function garyu_get_mail_to_admin(){
	return get_post(GARYU_MAIL_TO_ADMIN_POST_ID);
}

function garyu_get_mail_to_user(){
	return get_post(GARYU_MAIL_TO_USER_POST_ID);
}