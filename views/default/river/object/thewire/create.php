<?php
/**
 * TheWire river view.
 */

$object = $vars['item']->getObjectEntity();
$subject = $vars['item']->getSubjectEntity();


$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-actor-name',
));

$excerpt = strip_tags($object->description);

echo elgg_view('river/elements/body', array(
	'summary' => $subject_link,
	'content' => elgg_view('output/longtext', array('value' => thewire_filter($excerpt))),
));