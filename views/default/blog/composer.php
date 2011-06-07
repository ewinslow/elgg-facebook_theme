<?php
elgg_load_library('elgg:blog');
$body_vars = blog_prepare_form_vars();
echo elgg_view_form('blog/save', array(), $body_vars);