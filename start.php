<?php

function facebook_theme_init() {
	elgg_register_page_handler('groups', 'facebook_theme_groups_page_handler');
	elgg_register_page_handler('profile', 'facebook_theme_profile_page_handler');
	
	//setup menus
	elgg_register_plugin_hook_handler('register', 'menu:river', 'facebook_theme_river_menu_handler');
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'facebook_theme_owner_block_menu_handler');
	elgg_register_plugin_hook_handler('register', 'menu:wall', 'facebook_theme_wall_menu_handler');
	
	elgg_unregister_plugin_hook_handler('register', 'menu:river', 'likes_river_menu_setup');
	
	elgg_register_plugin_hook_handler('profile:fields', 'group', 'facebook_theme_group_profile_fields', 1);
	elgg_register_plugin_hook_handler('view', 'all', 'developers_view_handler');
	
	elgg_extend_view('css/elgg', 'facebook_theme/css');
	
	elgg_extend_view('river/elements/footer', 'likes/river_footer', 1);
	
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

function facebook_theme_wall_menu_handler($hook, $type, $items, $params) {
	$entity = $params['entity'];
	
	if (false && $entity->canWriteToContainer(0, 'object', 'thewire')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'thewire',
			'href' => "/thewire/add/$entity->guid",
			'text' => "Status",
			'priority' => 1,
		));
	}
	
	if ($entity->canAnnotate(0, 'messageboard')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'messageboard',
			'href' => "#messageboard-form-add-wall",
			'text' => "Post",
			'priority' => 2,
		));
	}
	
	if ($entity->canWriteToContainer(0, 'object', 'bookmarks')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'bookmarks',
			'href' => "#bookmarks-form-save-wall",
			'text' => "Link",
			'priority' => 200,
		));
	}
	
	if ($entity->canWriteToContainer(0, 'object', 'blog')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'blog',
			'href' => "#blog-form-save-wall",
			'text' => "Blog",
			'priority' => 200,
		));
	}
	
	return $items;
}

function developers_view_handler($hook, $type, $result, $params) {
	$viewtype = $params['viewtype'];
	
	if ($viewtype == 'default') {
		$view = $params['view'];
		
		if (strpos($view, 'js/') !== 0 && strpos($view, 'css') !== 0) {
			$location = elgg_get_view_location($view, $viewtype);
			$result = "<!-- START $view ($location) -->$result<!-- END $view -->";
		}
	}
	
	return $result;
}

function facebook_theme_group_profile_fields($hook, $type, $fields, $params) {
	return array(
		'briefdescription' => 'text',
		'description' => 'longtext',
		'interests' => 'tags',
	);
}

function facebook_theme_owner_block_menu_handler($hook, $type, $items, $params) {
	$owner = elgg_get_page_owner_entity();
	
	if ($owner instanceof ElggEntity) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'info', 
			'text' => elgg_echo('Info'), 
			'href' => $owner->getURL(),
			'priority' => 2,
		));
	}
	
	if ($owner instanceof ElggUser) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'activity',
			'text' => elgg_echo('profile:activity'),
			'href' => "/profile/$owner->username/activity",
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
		'href' => false,
	);

	if ($item->action_type == 'create' && $item->object_guid) {
		$menu_item['href'] = get_entity_url($item->object_guid);
	}

	$items[] = ElggMenuItem::factory($menu_item);

	$object = $item->getObjectEntity();
	if (!elgg_in_context('widgets') && !$item->annotation_id && $object instanceof ElggEntity) {
		if ($object->canAnnotate(0, 'likes')) {
			if (!elgg_annotation_exists($object->getGUID(), 'likes')) {
				// user has not liked this yet
				$options = array(
					'name' => 'like',
					'href' => "action/likes/add?guid={$object->getGUID()}",
					'text' => elgg_echo('likes:likethis'),
					'is_action' => true,
					'priority' => 100,
				);
			} else {
				// user has liked this
				$likes = elgg_get_annotations(array(
					'guid' => $object->getGUID(),
					'annotation_name' => 'likes',
					'annotation_owner_guid' => elgg_get_logged_in_user_guid()
				));
				$options = array(
					'name' => 'like',
					'href' => "action/likes/delete?annotation_id={$likes[0]->id}",
					'text' => elgg_echo('likes:remove'),
					'is_action' => true,
					'priority' => 100,
				);
			}
			
			$items[] = ElggMenuItem::factory($options);
		}
	}

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
			
		case 'activity':
			require dirname(__FILE__) . '/pages/profile/activity.php';
			return;

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