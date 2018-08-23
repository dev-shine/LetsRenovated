<?php Header ("Content-type: text/css"); ?>

/* ------------------------------------------------------------
 * PROJECT        :
 * FILENAME       : treenav.css (as PHP)
 * ------------------------------------------------------------
 * LAST UPDATED   : 21 Mar 2010
'  ------------------------------------------------------------
'  AUTHOR(S)      : Kevin Scholl (kevin@ksscholl.com)
 * ------------------------------------------------------------
 * NOTE(S)        :
 * ------------------------------------------------------------ */

<!-- # include virtual="/css/options.asp" -->

/* ------------------------------------------------------------
 * TREE VIEW NAVIGATION
 * ------------------------------------------------------------ */

ul,
ul li {
	zoom: 1; /* to invoke hasLayout in IE browsers */
	}

ul.tvn {
  display: block;
  margin: 0 1px 20px 2px;
	border: 1px solid #ACC3C3;
	background: #FFF;
	padding: 10px;
  list-style: none;
  }
ul.tvn ul {
  display: block;
  margin: 0;
	background: transparent;
	padding: 4px 0 0 0;
  list-style: none;
  }

ul.tvn li {
  position: relative;
  margin: 0;
	border: 0;
	background: transparent url() 2px 6px no-repeat;
	padding: 4px 0 4px 22px;
	font: normal 13px/18px Verdana,Arial, Helvetica, sans-serif;
  }
ul.tvn li li {
	background: transparent url() 0px 6px no-repeat;
	padding: 2px 0 2px 20px;
	font: normal 12px/21px Verdana,Arial, Helvetica, sans-serif;
  }
ul.tvn li li.inside {
	background: transparent url() 20px 6px no-repeat;
	padding: 2px 0 2px 40px;
  }

div.treeNavControl {
	position: absolute;
	top: 4px;
	left: 0;
	margin: 0;
	border: 0;
	background: transparent url(/images/icon_folder_closed.png) center center no-repeat;
	padding: 0;
	width: 18px;
	height: 18px;
	z-index: 89;
  }
div.treeNavControl { cursor: pointer; }

div.treeNavControlAll {
	margin: 0 10px;
	padding: 0;
  }
div.treeNavControlAll p {
	margin: 0 0 5px 0;
	padding: 0;
	font: bold 10px/15px Verdana, Arial, Helvetica, sans-serif;
	color: #CCC;
  }

/* ------------------------------------------------------------
 * HIDDEN SIDEBAR NAV
 * ------------------------------------------------------------ */

#sideNavList {
  display: none;
  position: absolute !important;
	top: -6px;
	left: -6px;
	margin: 0;
	background: #FFF;
	width: 248px;
	z-index: 9999;
  }