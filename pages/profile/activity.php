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

$menu = "<div class=\"elgg-nav-wall\">";
$menu .= "<h4>Share:</h4>";
$menu .= elgg_view_menu('wall', array(
	'entity' => elgg_get_page_owner_entity(),
	'class' => 'elgg-menu-hz',
	'sort_by' => 'priority',
));
$menu .= elgg_view_form('thewire/add', array('id' => 'thewire-form-add-wall'));
$menu .= elgg_view_form('messageboard/add', array('id' => 'messageboard-form-add-wall'));
$menu .= elgg_view_form('blog/save', array('id' => 'blog-form-save-wall'));
$menu .= elgg_view_form('bookmarks/save', array('id' => 'bookmarks-form-save-wall'));
$menu .= "</div>";
$menu .=<<<JQUERY
	<script>$('.elgg-nav-wall').tabs();</script>
JQUERY;
$activity = elgg_list_river(array(
	'joins' => array("JOIN {$db_prefix}entities e ON e.guid = rv.object_guid"),
	'wheres' => array("e.container_guid = $user->guid")
));

if (!$activity) {
	$activity = elgg_view('output/longtext', array('value' => elgg_echo('profile:activity:none')));
}

$params = array(
	'content' => $menu . $activity,
	'title' => $title,
	'buttons' => '',
	'filter' => '',
);
$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
