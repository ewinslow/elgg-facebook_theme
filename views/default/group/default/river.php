<?php

$group = $vars['entity'];

$image = elgg_view_entity_icon($group, 'small');

$body = '<h4>';
$body .= elgg_view('output/url', array(
	'href' => $group->getURL(), 
	'text' => $group->name, 
	'encode_text' => true,
));
$body .= '</h4>';
$body .= '<div class="elgg-subtext">' . elgg_view('output/text', array('value' => $group->briefdescription)) . '</div>';

echo elgg_view_image_block($image, $body);
