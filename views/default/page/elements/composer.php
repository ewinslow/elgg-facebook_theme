<div class="elgg-composer">
	<h4>Share:</h4>
	<?php 
		echo elgg_view_menu('composer', array(
			'entity' => elgg_get_page_owner_entity(),
			'class' => 'elgg-menu-hz',
			'sort_by' => 'priority',
		));
		
		echo elgg_view('composer/forms');
	
	?>
</div>
<script>$('.elgg-composer').tabs();</script>