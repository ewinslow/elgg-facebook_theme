<?php
/**
 * Layout of a river item
 *
 * @uses $vars['item'] ElggRiverItem
 */

$item = $vars['item'];

$body = elgg_view('river/elements/body', $vars);
$controls = elgg_view('river/elements/controls', $vars);
$conversation = elgg_view('river/elements/footer', $vars);

if (!empty($conversation)) {
	$conversation = '<div class="elgg-river-conversation elgg-nub elgg-nub-tl">' . $conversation . '</div>';
}

echo elgg_view('page/components/image_block', array(
	'image' => elgg_view('river/elements/image', $vars),
	'body' => $body . $controls . $conversation,
	'class' => 'elgg-river-item',
));