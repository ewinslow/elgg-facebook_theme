<?php
/**
 * Reply river view
 */
$subject = $vars['item']->getSubjectEntity();
$object = $vars['item']->getObjectEntity();
$reply = $vars['item']->getAnnotation();

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'encode_text' => TRUE,
	'class' => 'elgg-river-subject',
));

$object_link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $object->title,
	'class' => 'elgg-river-object',
));

echo elgg_view('river/elements/body', array(
	'summary' => $subject_link . ' ' . elgg_echo('groups:river:reply') . ' ' . $object_link,
	'content' => elgg_view('output/longtext', array('value' => $reply->value)),
));