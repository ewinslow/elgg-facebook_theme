<?php
// turn this into a core function
global $autofeed;
$autofeed = true;

$group = elgg_get_page_owner_entity();
if (!$group instanceof ElggGroup) {
	forward('groups/all');
}

elgg_push_breadcrumb($group->name);

$content = elgg_view('groups/profile/layout', array('entity' => $group));
if (group_gatekeeper(false)) {
	$sidebar = elgg_view('groups/sidebar/members', array('entity' => $group));
} else {
	$sidebar = '';
}

$body = elgg_view_layout('content', array(
	'content' => $content,
	'sidebar' => $sidebar,
	'title' => $group->name,
	'buttons' => elgg_view('groups/profile/buttons', array('entity' => $group)),
	'filter' => '',
));

echo elgg_view_page($group->name, $body);