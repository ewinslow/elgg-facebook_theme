<?php
/**
 * Blog river view.
 */

$subject = $vars['item']->getSubjectEntity();
$object = $vars['item']->getObjectEntity();

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-river-subject',
));

$object_link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $object->name,
	'class' => 'elgg-river-object',
));

echo elgg_view('river/elements/body', array(
	'summary' => "$subject_link " . elgg_echo("friends:river:add", array($object_link)),
));