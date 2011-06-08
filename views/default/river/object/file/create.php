<?php
/**
 * New bookmarks river entry
 *
 * @package Bookmarks
 */

$subject = $vars['item']->getSubjectEntity();
$object = $vars['item']->getObjectEntity();

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'encode_text' => true,
	'class' => 'elgg-river-subject',
));

$text = elgg_echo('file:river:create');

$group_string = '';
$target = $object->getContainerEntity();
if ($target instanceof ElggGroup) {
	$group_link = elgg_view('output/url', array(
		'href' => $target->getURL(),
		'text' => $target->name,
	));
	$group_string = elgg_echo('river:ingroup', array($group_link));
}

echo elgg_view('river/elements/body', array(
	'summary' => "$subject_link $text",
	'attachments' => elgg_view('object/file/river', array('entity' => $object)),
));