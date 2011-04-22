<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* **************************
	BUTTONS
************************** */

.elgg-button + .elgg-button {
	margin-left: 4px;
}

/* Base */
.elgg-button:hover {
	text-decoration:none
}
.elgg-button {
	font-weight: bold;
	text-decoration: none;

	position:relative;
	width: auto;
	padding: 2px 4px;
	cursor: pointer;
	outline: none;
	display:inline-block;
	text-align: center;
	white-space: nowrap;

	-webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.10);
	-moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.10);
	box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.10);

	border: 1px solid #999;
	padding: 2px 6px;
}

.elgg-button:active {
	box-shadow: none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
}

.elgg-button.elgg-state-disabled {
	cursor: default;
	box-shadow: none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
}

/* Action: This button should convey a normal, inconsequential action, such as clicking a link */
.elgg-button-action,
.elgg-button-cancel {
	background: #EEE;
	border: 1px solid #999;
	border-bottom-color: #888;
	color: #333;
}

.elgg-button-action:hover,
.elgg-button-cancel:hover {
	color:#333
}

.elgg-button-action:active,
.elgg-button-cancel:active {
	background: #ddd;
	border-bottom-color:#999;
}

.elgg-button-action.elgg-state-disabled,
.elgg-button-cancel.elgg-state-disabled {
	color: #B8B8B8;
	background: #F2F2F2;
	border-color: #C8C8C8;
}

/* Submit: This button should convey, "you're about to take some definitive action" */
.elgg-button-submit {
	color: white;
	background: #5B74A8;
	border-color: #29447E #29447E #1A356E;
}

.elgg-button-submit:hover {
	color: white;
}

.elgg-button-submit:active {
	background:#4f6aa3;
	border-bottom-color:#29447e;
}

.elgg-button-submit.elgg-state-disabled {
	background: #ADBAD4;
	border-color: #94A2BF;
}


/* Delete: This button should convey "be careful before you click me" */
.elgg-button-delete {
	background-color: #444;
	border: 1px solid #333;
	color: #eee;
}
.elgg-button-delete:hover {
	color: #eee;
}
.elgg-button-delete:active {
	background: #111;
}

.elgg-button-delete.elgg-state-disabled {
	background: #999;
	border-color: #888;
}

.elgg-button-special {
	color:white;
	background: #69a74e;
	border-color: #3B6E22 #3B6E22 #2C5115
}

.elgg-button-special:hover {
	color:white;
}

.elgg-button-special:active {
	background:#609946;
	border-bottom-color:#3b6e22;
}

.elgg-button-special.elgg-state-disabled {
	background: #B4D3A7;
	border-color: #9DB791;
}

.elgg-button-dropdown {
	color: white;
	border:1px solid #71B9F7;
}

.elgg-button-dropdown:after {
	content: " \25BC ";
	font-size: smaller;
}

.elgg-button-dropdown:hover {
	background-color:#71B9F7;
}

.elgg-button-dropdown.elgg-state-active {
	background: #ccc;
	color: #333;
	border:1px solid #ccc;
}

.elgg-button-large {
	font-size: 13px;
}