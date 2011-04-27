<?php

$user = elgg_get_page_owner_entity();

if (!$user || !elgg_instanceof($user, 'user')) {
	register_error("Could not find the specified user");
	forward();
}

$title = elgg_echo('profile:activity');

elgg_push_breadcrumb($user->name, $user->getURL());
elgg_push_breadcrumb($title);

$db_prefix = elgg_get_config('dbprefix');

$content = elgg_list_river(array(
	'joins' => array("JOIN {$db_prefix}entities e ON e.guid = rv.object_guid"),
	'wheres' => array("e.container_guid = $user->guid")
));

if (!$content) {
	$content = elgg_view('output/longtext', array('value' => elgg_echo('profile:activity:none')));
}

$params = array(
	'content' => $content,
	'title' => $title,
	'buttons' => '',
	'filter' => '',
);
$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
