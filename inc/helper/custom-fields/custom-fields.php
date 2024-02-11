<?php
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_6581832f6f7ff',
	'title' => '[Post] Changelog',
	'fields' => array(
		array(
			'key' => 'field_6581832f266ce',
			'label' => 'Recent Version',
			'name' => 'recent_version',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'changelog',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );

	acf_add_local_field_group( array(
	'key' => 'group_631846f69da38',
	'title' => '[Product] Item',
	'fields' => array(
		array(
			'key' => 'field_631846f61209b',
			'label' => 'Name',
			'name' => 'product_name',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6318471c1209d',
			'label' => 'Slug',
			'name' => 'product_slug',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'docs',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 1,
) );
} );

add_action( 'init', function() {
	register_post_type( 'changelog', array(
	'labels' => array(
		'name' => 'Changelog',
		'singular_name' => 'Changelog',
		'menu_name' => 'Changelog',
		'all_items' => 'All Changelog',
		'edit_item' => 'Edit Changelog',
		'view_item' => 'View Changelog',
		'view_items' => 'View Changelog',
		'add_new_item' => 'Add New Changelog',
		'new_item' => 'New Changelog',
		'parent_item_colon' => 'Parent Changelog:',
		'search_items' => 'Search Changelog',
		'not_found' => 'No changelog found',
		'not_found_in_trash' => 'No changelog found in Trash',
		'archives' => 'Changelog Archives',
		'attributes' => 'Changelog Attributes',
		'insert_into_item' => 'Insert into changelog',
		'uploaded_to_this_item' => 'Uploaded to this changelog',
		'filter_items_list' => 'Filter changelog list',
		'filter_by_date' => 'Filter changelog by date',
		'items_list_navigation' => 'Changelog list navigation',
		'items_list' => 'Changelog list',
		'item_published' => 'Changelog published.',
		'item_published_privately' => 'Changelog published privately.',
		'item_reverted_to_draft' => 'Changelog reverted to draft.',
		'item_scheduled' => 'Changelog scheduled.',
		'item_updated' => 'Changelog updated.',
		'item_link' => 'Changelog Link',
		'item_link_description' => 'A link to a changelog.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-calendar-alt',
	'supports' => array(
		0 => 'title',
		1 => 'editor',
		2 => 'thumbnail',
	),
	'has_archive' => 'changelog',
	'rewrite' => array(
		'feeds' => false,
	),
	'delete_with_user' => false,
) );

	register_post_type( 'knowbase', array(
	'labels' => array(
		'name' => 'Knowbase',
		'singular_name' => 'Knowbase',
		'menu_name' => 'Knowbase',
		'all_items' => 'All Knowbase',
		'edit_item' => 'Edit Knowbase',
		'view_item' => 'View Knowbase',
		'view_items' => 'View Knowbase',
		'add_new_item' => 'Add New Knowbase',
		'new_item' => 'New Knowbase',
		'parent_item_colon' => 'Parent Knowbase:',
		'search_items' => 'Search Knowbase',
		'not_found' => 'No knowbase found',
		'not_found_in_trash' => 'No knowbase found in Trash',
		'archives' => 'Knowbase Archives',
		'attributes' => 'Knowbase Attributes',
		'insert_into_item' => 'Insert into knowbase',
		'uploaded_to_this_item' => 'Uploaded to this knowbase',
		'filter_items_list' => 'Filter knowbase list',
		'filter_by_date' => 'Filter knowbase by date',
		'items_list_navigation' => 'Knowbase list navigation',
		'items_list' => 'Knowbase list',
		'item_published' => 'Knowbase published.',
		'item_published_privately' => 'Knowbase published privately.',
		'item_reverted_to_draft' => 'Knowbase reverted to draft.',
		'item_scheduled' => 'Knowbase scheduled.',
		'item_updated' => 'Knowbase updated.',
		'item_link' => 'Knowbase Link',
		'item_link_description' => 'A link to a knowbase.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-list-view',
	'supports' => array(
		0 => 'title',
		1 => 'editor',
	),
	'has_archive' => 'knowbase',
	'rewrite' => array(
		'feeds' => false,
	),
	'delete_with_user' => false,
) );
} );

add_action( 'init', function() {
	register_taxonomy( 'knowbase_category', array(
	0 => 'knowbase',
), array(
	'labels' => array(
		'name' => 'Category',
		'singular_name' => 'Category',
		'menu_name' => 'Category',
		'all_items' => 'All Category',
		'edit_item' => 'Edit Category',
		'view_item' => 'View Category',
		'update_item' => 'Update Category',
		'add_new_item' => 'Add New Category',
		'new_item_name' => 'New Category Name',
		'search_items' => 'Search Category',
		'popular_items' => 'Popular Category',
		'separate_items_with_commas' => 'Separate category with commas',
		'add_or_remove_items' => 'Add or remove category',
		'choose_from_most_used' => 'Choose from the most used category',
		'not_found' => 'No category found',
		'no_terms' => 'No category',
		'items_list_navigation' => 'Category list navigation',
		'items_list' => 'Category list',
		'back_to_items' => '← Go to category',
		'item_link' => 'Category Link',
		'item_link_description' => 'A link to a category',
	),
	'public' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
) );
} );

