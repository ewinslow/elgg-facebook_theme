<?php
/**
 * Post comment river view
 */
$subject = $vars['item']->getSubjectEntity();
$target = $vars['item']->getObjectEntity();
$object = $vars['item']->getAnnotation();

$subject_link = elgg_view('output/url', array(
	'text' => $subject->name,
	'href' => $subject->getURL(),
	'encode_text' => true,
	'class' => 'elgg-river-subject',
));


$target_link = elgg_view('output/url', array(
	'href' => $target->getURL(),
	'text' => $target->name,
	'class' => 'elgg-river-target',
));

echo elgg_view('river/elements/body', array(
	'summary' => elgg_echo('river:to', array($subject_link, $target_link)),
	'content' => elgg_get_excerpt($object->value),
));