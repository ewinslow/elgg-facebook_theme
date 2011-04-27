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