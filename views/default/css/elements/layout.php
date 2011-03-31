<?php
/**
 * Page Layout
 *
 * Contains CSS for the page shell and page layout
 *
 * Default layout: 990px wide, centered. Used in default page shell
 *
 */
?>

/* ***************************************
	PAGE LAYOUT
*************************************** */
/***** DEFAULT LAYOUT ******/
.elgg-page-default .elgg-page-header > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	height: 90px;
}
.elgg-page-default .elgg-page-body > .elgg-inner {
	width: 990px;
	margin: 0 auto;
}

.elgg-page-footer {
	width: 990px;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	padding-left: 200px;
}

/***** TOPBAR ******/
.elgg-page-topbar {
	background: #3B5998;
	min-width: 998px;
	position: relative;
	height: 41px;
	z-index: 9000;
}

.elgg-page-topbar > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	padding-top: 11px;
	position:relative;
}

.elgg-page-topbar > .elgg-inner:before {
	position: absolute;
	display: block;
	background: #627AAD;
	height: 30px;
	bottom: 0;
	right: 0;
	left: 200px;
	border: 1px solid #1D4088;
	content: " ";
	width: auto;
	border-bottom: 0;
	top: 10px;
}

/***** PAGE MESSAGES ******/
.elgg-system-messages {
	position: fixed;
	top: 24px;
	right: 20px;
	max-width: 500px;
	z-index: 1000;
}
.elgg-system-messages li {
	margin-top: 10px;
}
.elgg-system-messages li p {
	margin: 0;
}

/***** PAGE HEADER ******/
.elgg-page-header {
	position: relative;
	background: #4690D6 url(<?php echo elgg_get_site_url(); ?>_graphics/header_shadow.png) repeat-x bottom left;
}
.elgg-page-header > .elgg-inner {
	position: relative;
}

/***** PAGE BODY LAYOUT ******/
.elgg-layout {
	min-height: 360px;
}

.elgg-layout-one-column {
	padding: 10px 0;
}

.elgg-sidebar {
	position: relative;
	padding: 20px 0;
	float: left;
	width: 200px;
}
.elgg-sidebar-alt {
	position: relative;
	padding: 20px;
	float: right;
	width: 160px;
	margin: 0 0 0 10px;
}
.elgg-main {
	position: relative;
	min-height: 360px;
	padding: 10px;
	border: 1px solid #B3B3B3;
	border-top: 0;
}
.elgg-main > .elgg-head {
	padding-bottom: 3px;
	border-bottom: 1px solid #CCCCCC;
	margin-bottom: 10px;
}

/***** PAGE FOOTER ******/
.elgg-page-footer {
	position: relative;
	color: #999;
}
.elgg-page-footer a:hover {
	color: #666;
}