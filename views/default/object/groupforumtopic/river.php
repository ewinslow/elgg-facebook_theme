<?php

$groupforumtopic = $vars['entity'];

$title = elgg_view('output/url', array(
	'text' => $groupforumtopic->title,
	'href' => $groupforumtopic->getURL(),
	'encode_text' => true,
));

$description = elgg_get_excerpt($groupforumtopic->description, 350);

echo elgg_view('river/elements/attachment', array(
	'title' => $title,
	'description' => $description,
));