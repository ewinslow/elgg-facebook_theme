<?php

$link = $vars['entity'];

echo "<h4>";
echo elgg_view('output/url', array(
	'text' => $link->title,
	'href' => $link->getURL(),
	'encode_text' => true,
));
echo "</h4>";

echo filter_tags(elgg_view('output/url', array('href' => $link->address, 'rel' => 'nofollow', 'class' => 'elgg-subtext')));
