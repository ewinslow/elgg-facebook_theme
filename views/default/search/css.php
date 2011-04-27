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
	margin-left: 205px;
	position: relative;
	margin-top: 4px;
}

.elgg-search .search-input {
	width: 350px;
	padding-left: 20px;
	border: 1px solid #3B5998;
	background: white url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat 2px -718px;
	outline: none;
	font-size: 11px;
	height: 22px;
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
