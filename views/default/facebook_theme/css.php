<?php 
/**
 * Fixes/tweaks
 */

?>
.elgg-icon {vertical-align:middle}
dl, dt, dd {margin:0;padding:0}

/* PROFILE */
.elgg-profile {
	display:block;
}

.elgg-profile > dt {
	float: left;
	width: 120px;
	font-weight:bold;
	color: #999;
	padding: 10px 0;
}
	
.elgg-profile > dd {
	padding: 10px 0 10px 120px;
}

.elgg-profile > dd ~ dd {
	border-top: 1px solid #E9E9E9;
}

.elgg-profile > dd + dd {
	padding-left: 0;
	margin-left: 120px;
}

img {max-width:100%}

#groups-tools > .elgg-module {
	width: 229px;
}

#facebook-topbar-logo {
	margin-top: -4px;
	font-size: 20px;
	color: white;
	text-shadow: 0px 0px 1px lightBlue;
	width: 100px;
	text-align:center;
}

/* Image-less triangle.  Woot. */
.elgg-nub {position:relative}

.elgg-nub:before {
	width: 0px;
	height: 0px;
	font-size: 0px;
	line-height: 0px;
	display: block;
	clear: both;
	content: " ";
	position: absolute;
}

.elgg-nub-tl {
	padding-top: 5px;
}

.elgg-nub-tl:before {
	border-left: 5px solid transparent;
	border-right: 5px solid transparent;
	border-bottom: 5px solid #EDEFF4;
	top: 0px;
}

.elgg-nub-tl:before {
	left: 15px;
}

.elgg-river-participation,
li.elgg-river-participation {
	background-color: #EDEFF4;
	border-bottom: 1px solid #E5EAF1;
	margin-bottom: 2px;
	padding: 4px;
}

.elgg-actor-name {
	font-weight: bold;
}

.elgg-form-small input,
.elgg-form-small textarea {
	font-size: 11px;
}

.elgg-river-summary {
	font-weight: normal;
	font-size: 11px;
	color: gray;
}

.elgg-river-attachments {
	border-left: 2px solid #CCC;
	margin: 8px 0 5px 0;
	padding-left: 5px;
	color: #777;
}