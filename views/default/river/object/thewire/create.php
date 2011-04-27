<?php
/**
 * TheWire river view.
 */

$object = $vars['item']->getObjectEntity();
$subject = $vars['item']->getSubjectEntity();


echo '<h3 class="elgg-river-summary">' . elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-actor-name',
)) . '</h3>';

$excerpt = strip_tags($object->description);
echo elgg_view('output/longtext', array('value' => thewire_filter($excerpt), 'class' => 'elgg-river-content'));