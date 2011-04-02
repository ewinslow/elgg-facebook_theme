<?php

function facebook_theme_init() {
	elgg_register_page_handler('groups', 'facebook_theme_groups_page_handler');
	elgg_register_plugin_hook_handler('register', 'menu:river', 'facebook_theme_river_menu_handler');
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



elgg_register_event_handler('init', 'system', 'facebook_theme_init');