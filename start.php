<?php

function facebook_theme_init() {
	elgg_register_page_handler('groups', 'facebook_theme_groups_page_handler');
	elgg_register_page_handler('profile', 'facebook_theme_profile_page_handler');
	
	elgg_register_plugin_hook_handler('register', 'menu:river', 'facebook_theme_river_menu_handler');
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'facebook_theme_owner_block_menu_handler');
	
	elgg_extend_view('css/elgg', 'facebook_theme/css');
	
	elgg_extend_view('page/elements/topbar', 'search/search_box');
	
	elgg_unregister_menu_item('topbar', 'elgg_logo');

	$site = elgg_get_site_entity();
	elgg_register_menu_item('topbar', array(
		'name' => 'logo',
		'href' => '/',
		'text' => "<h1 id=\"facebook-topbar-logo\">$site->name</h1>",
		'priority' => 1,
	));
}

function facebook_theme_owner_block_menu_handler($hook, $type, $items, $params) {
	$owner = elgg_get_page_owner_entity();
	
	if ($owner instanceof ElggUser) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'profile', 
			'text' => elgg_echo('profile'), 
			'href' => "profile/$owner->username",
			'priority' => 1,
		));
	}
	
	return $items;
	
}

function facebook_theme_river_menu_handler($hook, $type, $items, $params) {
	$item = $params['item'];

	$menu_item = array(
		'name' => 'source',
		'text' => elgg_view_friendly_time($item->getPostedTime()),
		'priority' => 1,
	);

	if ($item->action_type == 'create' && $item->object_guid) {
		$menu_item['href'] = get_entity_url($item->object_guid);
	}

	$items[] = ElggMenuItem::factory($menu_item);
	return $items;
}


/**
 * Profile page handler
 *
 * @param array $page Array of page elements, forwarded by the page handling mechanism
 */
function facebook_theme_profile_page_handler($page) {
	global $CONFIG;

	if (isset($page[0])) {
		$username = $page[0];
		$user = get_user_by_username($username);
		elgg_set_page_owner_guid($user->guid);
	}

	// short circuit if invalid or banned username
	if (!$user || ($user->isBanned() && !elgg_is_admin_logged_in())) {
		register_error(elgg_echo('profile:notfound'));
		forward();
	}

	$action = NULL;
	if (isset($page[1])) {
		$action = $page[1];
	}

	switch ($action) {
		case 'edit':
			// use for the core profile edit page
			require $CONFIG->path . 'pages/profile/edit.php';
			return;
			break;

		default:
			$body = elgg_view_layout('two_sidebar', array(
				'title' => $user->name,
				'content' => elgg_view('profile/details'),
			));
			break;
	}

	echo elgg_view_page($title, $body);
}

elgg_register_event_handler('init', 'system', 'facebook_theme_init');