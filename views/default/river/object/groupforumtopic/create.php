<?php
/**
 * Blog river view.
 */

$object = $vars['item']->getObjectEntity();
$subject = $vars['item']->getSubjectEntity();

$excerpt = strip_tags($object->excerpt);
$excerpt = elgg_get_excerpt($excerpt);

$link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $object->title,
));

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-river-subject',
));

$group_string = '';
$container = $object->getContainerEntity();
if ($container instanceof ElggGroup && elgg_get_page_owner_guid() != $container->guid) {
	$group_link = elgg_view('output/url', array(
		'href' => $container->getURL(),
		'text' => $container->name,
		'class' => 'elgg-river-target',
	));
	$group_string = " &#x00B7 $group_link";
}

echo elgg_view('river/elements/body', array(
	'summary' => "$subject_link $group_string",
	'content' => $excerpt,
	'attachments' => elgg_view('object/groupforumtopic/river', array('entity' => $object)),
));