<?php
/**
 * Body of river item
 *
 * @uses $vars['item']
 */

$item = $vars['item'];
$subject = $item->getSubjectEntity();

echo elgg_view($item->getView(), array('item' => $item));