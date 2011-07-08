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

#facebook-header-logo a {
	color: white;
	text-decoration:none;
	font-size: 2.5em;
}

.elgg-form-small input,
.elgg-form-small textarea {
	font-size: 11px;
}

.elgg-image-block-small > .elgg-image {
	margin-right: 5px;
}


/* NEW PAGE COMPONENT: COMPOSER */

.ui-tabs-hide {
	display:none;
}

.elgg-composer {
	border-top: 1px solid #CCC;
	padding-top: 6px;
	margin-top: 7px;
}

.elgg-composer > h4 {
	height: 22px;
	display: inline-block;
	vertical-align: baseline;
	color: gray;
}

.elgg-composer > .ui-tabs-panel {
	margin-top: 5px;
	border: 1px solid #B4BBCD;
	padding: 10px;
}

.messageboard-input {
	margin-bottom: 5px;
}

.elgg-attachment-description {
	margin-top: 5px;
}

#thewire-form-composer #thewire-textarea {
	margin-top:0;
}

.messageboard-input {
	height: 60px;
}

#facebook-header-login {
	right: 0;
	position: absolute;
	bottom: 15px;
}

#facebook-header-login label {
	color:white;
	font-weight: normal;
	padding: 2px 2px 4px;
	display: block;
}

#facebook-header-login input[type="submit"] + label {
	color: #98A9CA;
	position:absolute;
	left: 0;
	bottom: -3px;
	cursor: pointer;
}

#facebook-header-login div {
	display: inline-block;
	padding-right: 10px;
	margin-bottom: 3px;
}

#facebook-header-login .elgg-input-text,
#facebook-header-login .elgg-input-password {
	padding: 3px 3px 4px;
	color: black;
	width: 150px;
	border-color: #1D2A5B;
	margin:0;
	font-size:11px;
}

#facebook-header-login .elgg-menu {
	margin-left: 166px;
}

#facebook-header-login .elgg-menu > li > a {
	color: #98A9CA;
}

#facebook-header-login .elgg-menu > li > a:hover {
	text-decoration: underline;
}

input[type="checkbox"] {
	vertical-align:bottom;
}