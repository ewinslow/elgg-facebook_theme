<?php
/**
 * Elgg Search css
 * 
 */
?>

/**********************************
Search plugin
***********************************/
.elgg-page-header .elgg-search {
	bottom: 5px;
	height: 23px;
	position: absolute;
	right: 0;
}

.elgg-page-topbar .elgg-search {
	margin: 4px 0 4px 205px;
	position: relative;
}

.elgg-search {
	width: 330px;
	background: white url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 335px -700px;
	border: 1px solid #3B5998;
	height: 20px;
	padding: 0 23px 0 0;
}
.elgg-search .search-input {
	padding: 1px 0 1px 3px;
	margin: 2px 0 2px 2px;
	outline: none;
	font-size: 11px;
	border: 0;
	border-right: 1px solid #e9e9e9;
}

.elgg-search input[type=submit] {
	display: none;
}

.elgg-search .search-input:focus {
	background-position: 2px -700px;
}

.search-list li {
	padding: 5px 0 0;
}
.search-heading-category {
	margin-top: 20px;
	color: #666666;
}

.search-highlight {
	background-color: #bbdaf7;
}
.search-highlight-color1 {
	background-color: #bbdaf7;
}
.search-highlight-color2 {
	background-color: #A0FFFF;
}
.search-highlight-color3 {
	background-color: #FDFFC3;
}
.search-highlight-color4 {
	background-color: #ccc;
}
.search-highlight-color5 {
	background-color: #4690d6;
}
