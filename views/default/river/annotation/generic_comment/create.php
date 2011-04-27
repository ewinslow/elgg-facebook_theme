<?php
/**
 * Post comment river view
 */
$object = $vars['item']->getObjectEntity();
$subject = $vars['item']->getSubjectEntity();
$comment = $vars['item']->getAnnotation();

$subject_link = elgg_view('output/url', array(
	'text' => $subject->name,
	'href' => $subject->getURL(),
	'encode_text' => true,
	'class' => 'elgg-river-subject',
));

$url = $object->getURL();
$title = $object->title;
if (!$title) {
	$title = elgg_echo('untitled');
}

$object_link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $title,
));

$type = $object->getType();
$subtype = $object->getSubtype();

$type_string = elgg_echo("river:commented:$type:$subtype");

echo elgg_view('river/elements/body', array(
	'summary' => "$subject_link " . elgg_echo('river:generic_comment', array($type_string, $object_link)),
	'content' => elgg_get_excerpt($comment->value),
	'attachments' => elgg_view("$type/$subtype/river", array('entity' => $object)),
));