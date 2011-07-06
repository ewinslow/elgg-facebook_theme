<?php
/**
 * Messageboard comment river view
 */

$object = $vars['item']->getAnnotation();

echo elgg_view('river/item', array(
	'item' => $vars['item'],
	'summary' => false,
	'content' => elgg_get_excerpt($object->value),
));