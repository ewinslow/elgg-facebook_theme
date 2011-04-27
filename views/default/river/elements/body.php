<?php
/**
 * Body of river item
 *
 * @uses $vars['summary']
 * @uses $vars['content']
 * @uses $vars['attachments']
 */

$summary = '';
$content = false;
$attachments = false;

extract($vars, EXTR_IF_EXISTS);

echo "<h3 class=\"elgg-river-summary\">$summary</h3>";

if ($content) {
	echo "<div class=\"elgg-river-content\">$content</div>";
}

if ($attachments) {
	echo "<div class=\"elgg-river-attachments\">$attachments</div>";
}