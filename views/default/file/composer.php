<?php
elgg_load_library('elgg:file');
$form_vars = array(
	'enctype' => 'multipart/form-data', 
);
$body_vars = file_prepare_form_vars();

echo elgg_view_form('file/upload', $form_vars, $body_vars);