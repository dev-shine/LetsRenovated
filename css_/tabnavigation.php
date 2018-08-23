<?php Header ("Content-type: text/css"); ?>

/* ------------------------------------------------------------
* PROJECT :
* FILENAME : tabnavigation.css (as PHP)
* ------------------------------------------------------------
* LAST UPDATED : 21 Mar 2010
* ------------------------------------------------------------
* AUTHOR(S) : Kevin Scholl (kevin@ksscholl.com)
* ------------------------------------------------------------ */

<? include "options.php"; ?>

/* ------------------------------------------------------------
* TAB-BASED NAVIGATION
* ------------------------------------------------------------ */

ul.tabBar,
ul.tabBar ul {
position: relative;
display: block;
margin: 0;
padding: 0;
list-style: none;
z-index: 992;
}
ul.tabSideBar {
z-index: 990;
}
ul.tabBar ul {
position: absolute;
display: none;
border: 0;
background: #5A8787;
padding: 10px;
z-index: 993;
}

ul.tabBar li {
position: relative;
float: left;
margin: 0;
padding: 0;
font: bold 13px/19px Verdana,Arial, Helvetica, sans-serif;
color: #666;
text-transform: lowercase;
}
ul.tabSideBar li {
font: bold 12px/15px Arial, Helvetica, sans-serif;
text-transform: none;
}
ul.tabBar ul li {
float: none;
font: normal 11px/15px Verdana,Arial, Helvetica, sans-serif;
color: #FFF;
}
ul.tabBar li a,
ul.tabSideBar li a {
display: block;
margin: 0 1px 0 0;
background: #436570;
padding: 8px 20px 7px;
color: #BCD3D3;
text-decoration: none;
white-space: nowrap
}
ul.tabSideBar li a {
margin: 0 1px -1px 0;
border: 1px solid #99b2cc;
background: #e1e8f0;
padding: 7px 10px 6px;
color: #468;
}
ul.tabBar li a:hover {
background: #5A8787 url(/images/bg_tab_hover.png) bottom center repeat-x;
}
ul.tabSideBar li a:hover {
background: #FFF;
}

ul.tabBar li a span.hasChildren {
position: absolute;
top: 9px;
right: 4px;
margin: 0;
border: 0;
background: transparent url(/images/icon_subnav_bullet.png) 0 0 no-repeat;
padding: 0;
width: 13px;
height: 6px;
line-height: 6px;
z-index: 994;
}
ul.tabBar li a:hover span.hasChildren {
background: transparent url(/images/icon_subnav_bullet_hover.png) 0 0 no-repeat;
}
ul.tabBar ul li a {
margin: 0 0 1px 0;
border: 0;
background: #6F9999;
padding: 5px 10px;
zoom: 1;
}
ul.tabBar ul li a.sectHdr {
background: #4B7777;
font: bold 11px/15px Verdana,Arial, Helvetica, sans-serif;
text-transform: uppercase;
}
ul.tabBar ul li a:hover {
background: #6F9999;
color: #FC6;
}
ul.tabBar ul li a.sectHdr:hover {
background: #4B7777;
}

ul.tabBar:after,
ul.tabSideBar:after {
clear: both;
content: ".";
display: block;
height: 0;
visibility: hidden;
}

ul.tabBar li a.current {
background: #5A8787;
}
ul.tabSideBar li a.current {
border-bottom: 1px solid #FFF;
background: #FFF;
color: #666;
}

/* ------------------------------------------------------------
* SUPPORT OPTIONS
* ------------------------------------------------------------ */

div.moreOptions {
float: right;
position: relative;
margin: 0;
padding: 5px 0 0 0;
font: normal 10px/16px Verdana, Arial, Helvetica, sans-serif;
color: #666;
z-index: 99;
}
div.moreOptions span {
padding: 0 2px;
color: #CCC;
}
div.moreOptions a {
margin: 0;
padding: 2px 0;
}
div.moreOptions a.linkContact,
div.moreOptions a.linkHome,
div.moreOptions a.linkPrint,
div.moreOptions a.linkRSS,
div.moreOptions a.linkSecurity,
div.moreOptions a.linkSiteMap,
div.moreOptions a.linkOptions {
background: transparent url(/images/icons_utility.png) 0 0 no-repeat;
padding: 2px 0 2px 21px;
font-weight: bold;
text-decoration: none;
}
div.moreOptions a.linkContact {
background-position: 0 0;
}
div.moreOptions a.linkHome {
background-position: 0 -30px;
}
div.moreOptions a.linkPrint {
background-position: 0 -60px;
}
div.moreOptions a.linkRSS {
background-position: 0 -90px;
}
div.moreOptions a.linkSecurity {
background-position: 0 -120px;
}
div.moreOptions a.linkSiteMap {
background-position: 0 -150px;
}
div.moreOptions a.linkOptions {
background-position: 0 -180px;
}