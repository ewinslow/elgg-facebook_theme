<?php
/**
 * Group creation river view.
 */

$object = $vars['item']->getObjectEntity();
$subject = $vars['item']->getSubjectEntity();

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-actor-name',
	'encode_text' => true,
));

$group_link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $object->name,
	'encode_text' => true,
));

echo elgg_view('river/elements/body', array(
	'summary' => "$subject_link " . elgg_echo('groups:river:create') . " $group_link",
	'attachments' => elgg_view('group/default/river', array('entity' => $object)),
));