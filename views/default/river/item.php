<?php
/**
 * Layout of a river item
 *
 * @uses $vars['item'] ElggRiverItem
 */

$item = $vars['item'];

$body = elgg_view($item->getView(), $vars);
$controls = elgg_view('river/elements/controls', $vars);
$footer = elgg_view('river/elements/footer', $vars);

if ($footer) {
	$footer = "<div class=\"elgg-river-conversation elgg-nub elgg-nub-tl\">$footer</div>";
}

echo elgg_view('page/components/image_block', array(
	'image' => elgg_view('river/elements/image', $vars),
	'body' => $body . $controls . $footer,
	'class' => 'elgg-river-item',
));