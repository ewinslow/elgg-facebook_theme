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
	'class' => 'elgg-actor-name',
));

$link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $object->title,
	'encode_text' => true,
));

$group_string = '';
$target = $object->getContainerEntity();
if ($target instanceof ElggGroup) {
	$group_link = elgg_view('output/url', array(
		'href' => $target->getURL(),
		'text' => $target->name,
	));
	$group_string = elgg_echo('river:ingroup', array($group_link));
}

echo "<h3 class=\"elgg-river-summary\">$subject_link</h3>";
echo elgg_view('output/longtext', array('value' => $object->description, 'class' => 'elgg-river-content'));
echo '<div class="elgg-river-attachments">';
echo elgg_view('object/bookmarks/river', array('entity' => $object));
echo '</div>';
