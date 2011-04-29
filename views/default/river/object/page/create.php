<?php
/**
 * Page river view.
 */

$object = $vars['item']->getObjectEntity();
$subject = $vars['item']->getSubjectEntity();

$group_string = '';
$container = $object->getContainerEntity();
if ($container instanceof ElggGroup) {
	$group_link = elgg_view('output/url', array(
		'href' => $container->getURL(),
		'text' => $container->name,
	));
	$group_string = elgg_echo('river:ingroup', array($group_link));
}

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-river-subject',
));

$text = elgg_echo('pages:river:create');

echo elgg_view('river/elements/body', array(
	'summary' => "$subject_link $text $group_string",
	'attachments' => elgg_view('object/page/river', array('entity' => $object)),
));