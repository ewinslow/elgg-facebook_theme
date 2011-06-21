<?php

$item = $vars['item'];

$object = $vars['item']->getObjectEntity();

if ($item->action_type == 'create' && $object->canAnnotate(0, 'group_topic_post')) {
	// inline comment form
	$form_vars = array('id' => "groups-reply-{$object->getGUID()}", 'class' => 'elgg-form-small elgg-river-participation');
	$body_vars = array('entity' => $object, 'inline' => true);
	echo elgg_view_form('discussion/reply/save', $form_vars, $body_vars);
}