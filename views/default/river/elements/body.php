<?php
/**
 * Body of river item
 *
 * @uses $vars['item']
 */

$item = $vars['item'];
$subject = $item->getSubjectEntity();

$header = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
));

$body = elgg_view($item->getView(), array('item' => $item));

$footer = elgg_view('river/elements/footer', $vars);

echo elgg_view('page/components/module', array(
	'header' => $header,
	'body' => $body,
	'footer' => $footer,
	'show_inner' => false,
));