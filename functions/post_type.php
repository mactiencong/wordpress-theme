<?php
function garyu_get_posttype() {
	return array(
		GARYU_GALLERY_POST_TYPE => 'Gallery',
		GARYU_COMPANY_POST_TYPE => 'Company',
		GARYU_HOMEPAGE_POST_TYPE => 'Homepage',
		GARYU_PARTNER_COMPANY_POST_TYPE => 'Partner',
		GARYU_NEWS_POST_TYPE => 'News',
		GARYU_MAIL_POST_TYPE => 'Mail Content'
	);
}

function garyu_register_post_type($key, $name){
	$post_type_data = array(
		'labels' => array(
			'name' => __( $name ),
			'singular_name' => __( $name )
		),
		'public'  => true,
		'show_ui' => true
	);
	if(in_array($key, GARYU_NOT_ALLOW_DELETE_AND_CREATE_POST_TYPES)) {
		$post_type_data['capability_type'] = 'post';
		$post_type_data['capabilities'] = array(
			'create_posts' => 'do_not_allow'
		);
		$post_type_data['map_meta_cap'] = true;
	}
	register_post_type( $key, $post_type_data);
}

function garyu_register_taxonomy_for_post_type($key){
	$category_key = garyu_get_category_key($key);
	register_taxonomy( $category_key, array($key), array(
        'label' => 'Categories', 
        'singular_label' => 'Category', 
		'rewrite' => array( 'slug' => $category_key, 'with_front'=> false ),
		'hierarchical' => true,
		'public'  => true,
		'show_ui' => true
        )
    );
    register_taxonomy_for_object_type( 'categories', $key );
}

function garyu_get_category_key($post_type){
	return $post_type.'_categories';
}

function garyu_create_posttype() {
	$posttypes = garyu_get_posttype();
	foreach($posttypes as $key=>$name){
		garyu_register_post_type($key, $name);
		if($key === GARYU_GALLERY_POST_TYPE || $key === GARYU_COMPANY_POST_TYPE){
            garyu_register_taxonomy_for_post_type($key);
        }
	}
}
add_action( 'init', 'garyu_create_posttype' );