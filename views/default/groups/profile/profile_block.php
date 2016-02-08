<?php
/**
 * Group profile
 *
 * Icon and profile fields
 *
 * @uses $vars['group']
 */

if (!isset($vars['entity']) || !$vars['entity']) {
	echo elgg_echo('groups:notfound');
	return true;
}

$group = $vars['entity'];
$owner = $group->getOwnerEntity();

$profile_fields = elgg_get_config('group');

?>
<div class="groups-profile clearfix">
	<div class="groups-profile-fields elgg-body">
		<p>
			<b><?php echo elgg_echo("groups:owner"); ?>: </b>
			<?php
				echo elgg_view('output/url', array(
					'text' => $owner->name,
					'value' => $owner->getURL(),
				));
			?>
		</p>
		<p>
		<?php
			echo elgg_echo('groups:members') . ": " . $group->getMembers(array('count' => true));
		?>
		</p>
<?php
if (is_array($profile_fields) && count($profile_fields) > 0) {

	$even_odd = 'odd';
	foreach ($profile_fields as $key => $valtype) {
		// do not show the name
		if ($key == 'name') {
			continue;
		}

		$value = $group->$key;
		if (empty($value)) {
			continue;
		}

		$options = array('value' => $group->$key);
		if ($valtype == 'tags') {
			$options['tag_names'] = $key;
		}

		echo "<p class=\"{$even_odd}\">";
		echo "<b>";
		echo elgg_echo("groups:$key");
		echo ": </b>";
		echo elgg_view("output/$valtype", $options);
		echo "</p>";

		$even_odd = ($even_odd == 'even') ? 'odd' : 'even';
	}
}
?>
	</div>
</div>
