<?php Header ("Content-type: text/css"); ?>

/* ------------------------------------------------------------
* PROJECT :
* FILENAME : default.css (as PHP)
* ------------------------------------------------------------
* LAST UPDATED : 21 Mar 2010
* ------------------------------------------------------------
* AUTHOR(S) : Kevin Scholl (kevin@ksscholl.com)
* ------------------------------------------------------------
* NOTE(S) :
* ------------------------------------------------------------ */

<?php include "options.php"; ?>

/* ------------------------------------------------------------
* BASIC DECLARATIONS
* ------------------------------------------------------------ */

html { overflow-y: scroll; }

<?php
if ($HAS_STICKY_FOOTER == 1) {

echo "html,\n";
echo "body {\n";
echo " height: 100%;\n";
echo " }\n";

echo "#container {\n";
echo " position: relative;\n";
echo " min-height: 100%;\n";
echo " }\n";

}
?>

body {
margin: 0;
background: <?=$PAGE_BG ?>;
padding: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/<?= $BASE_LINE_HEIGHT ?>px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

body.sayimprove {
margin: 0;
background: <?=$PAGE_BG_SAY ?>;
padding: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/<?=$BASE_LINE_HEIGHT ?>px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

body.chart {
margin: 0;
background: <?=$PAGE_BG_CHART ?>;
padding: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/<?=$BASE_LINE_HEIGHT ?>px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

body.alliance {
margin: 0;
background: <?=$PAGE_BG_ALLIANCE ?>;
padding: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/<?=$BASE_LINE_HEIGHT ?>px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

body.frame {
margin: 0;
background: <?=$PAGE_BG_FRAME ?>;
padding: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/<?=$BASE_LINE_HEIGHT ?>px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

body.whiteframe {
margin: 0;
background: <?=$PAGE_BG_WHITEFRAME ?>;
padding: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/<?=$BASE_LINE_HEIGHT ?>px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

/* ------------------------------------------------------------
* LINKS
* ------------------------------------------------------------ */

a:link { color: <?=$LINK_LINK ?>; }
a:visited { color: <?=$LINK_VISITED ?>; }
a:hover { color: <?=$LINK_HOVER ?>; }
a:active { color: <?=$LINK_ACTIVE ?>; }

a.actionLink { font-weight: bold; }

a.linkClose {
background: transparent url(/images/icon_close.png) left center no-repeat;
padding: 0 0 0 20px;
}

/* ------------------------------------------------------------
* MASTHEAD
* ------------------------------------------------------------ */

#advertisement {
margin: 0;
border-bottom: 1px dotted #5A8787;
background: #436570 url(/images/bg_advertisement.png) center center repeat-x;
padding: 0;
}
#advertisement div {
text-align: center;
}

/* ------------------------------------------------------------
* MASTHEAD
* ------------------------------------------------------------ */

#masthead {
margin: 0;
border-bottom: 1px solid <?=$MSTHD_BRDR_COLOR_BOT ?>;
background: <?=$MSTHD_BG_COLOR ?>;
padding: 0;
}
#masthead h2,
#masthead p {
margin: 0;
border: 0;
background: transparent;
padding: 0;
font: normal <?=$MSTHD_FONT_SIZE ?>px/<?=$MSTHD_LINE_HEIGHT + 5 ?>px <?=$MSTHD_FONT_FAMILY ?>;
color: <?=$MSTHD_COLOR ?>; /* 75% white over background */
text-align: right;
vertical-align: middle;
}
#masthead h2 {
font-weight: bold;
text-align: left;
}
#masthead span {
color: <?=$MSTHD_SPAN_COLOR ?>;
}
#masthead select {
float: right;
margin: 0;
background-color: #D3DFE4;
padding: 1px;
font: normal <?=$BASE_FONT_SIZE -1 ?>px <?=$BASE_FONT_FAMILY ?>;
color: #555;
vertical-align: middle;
}

/* ------------------------------------------------------------
* HEADER
* ------------------------------------------------------------ */

#header {
margin: 0;
border-bottom: 1px solid <?=$MSTHD_BRDR_COLOR_TOP ?>;
background: #466079 url(/images/bg_header.png) center center repeat-x;
padding: 0;
}
#header h1.primary,
#header h1.secondary {
margin: 0;
border: 0;
background: transparent url(/images/<?=$BASE_PRIMARY_LOGO ?>) left center no-repeat;
padding: 0;
<?php
if ($IS_FLEX_GRID != 1) {
echo " width: " . (($COL_COUNT/2 * $GRID_WIDTH) + (2 * ($COL_COUNT/2 - 1) * $GRID_GUTTER)) . "px;\n";
}
?>
font: normal 30px/60px "Arial Narrow", <?=$BASE_FONT_FAMILY ?>;
height: 60px;
}
#header h1,
#header h2 {
margin: 1px 0 0 0;
border: 0;
background: transparent;
padding: 0;
font: normal 30px Georgia, "Times New Roman", Times, serif;
color: #FFF;
}
#header h1 {
padding: 7px 0 0 0;
}
#header h1 span {
color: #FC6;
}
#header h1 a {
color: #fff;
text-decoration: none;
}

#header h2 {
margin: 5px 0 0 20px;
font: normal 18px/20px Georgia, "Times New Roman", Times, serif;
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.5;
letter-spacing: .01em;
}
#header img {
display: inline;
vertical-align: middle;
}

#headerframe {
margin: 0;
border-bottom: 1px solid <?=$MSTHD_BRDR_COLOR_TOP ?>;
background: #466079 url(/images/bg_header.png) center bottom repeat-x;
padding: 0;
}

#headerframesearch {
margin: 0;
border-bottom: 1px solid <?=$MSTHD_BRDR_COLOR_TOP ?>;
background: #466079 url(/images/bg_header.png) center bottom repeat-x;
padding: 0;
}

#headerframesearch span {
font: bold 10px verdana, arial, helvetica, sans-serif;
padding-left: 128px;
color: #91A5B7;
}

/* ------------------------------------------------------------
* WRAPPERS
* ------------------------------------------------------------ */



/* ------------------------------------------------------------
* NAVIGATION
* ------------------------------------------------------------ */

#navigation {
margin: 0;
border-bottom: 5px solid #5A8787;
background: #2C4258;
padding: 5px 0 0 0;
}

/* ------------------------------------------------------------
* BREADCRUMB
* ------------------------------------------------------------ */

#breadcrumb {
margin: 0;
border: 0;
background: transparent url(/images/bg_breadcrumb-bl.png) center bottom no-repeat;
padding: 1px 0 14px 0;
}
#breadcrumb div.colgroup div {
padding: 3px 10px;
vertical-align: middle;
}
#breadcrumb p {
margin: 0;
padding: 0;
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
#breadcrumb p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=33)";
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=33);
opacity: 0.33;
}
#breadcrumb p a.toolsForms {
display: inline-block;
background: transparent url(/images/icon_tools.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumb p a.breakFrame {
display: inline-block;
background: transparent url(/images/icon_break.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumb p a.moneyOptimize {
display: inline-block;
background: transparent url(/images/icon_money.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumb p a {
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
text-decoration: none;
}
#breadcrumb p a:hover {
color: #668079;
}
#breadcrumb p input {
border: 1px solid #5A8787;
}

/* ------------------------------------------------------------
* CONTENT
* ------------------------------------------------------------ */

#content {
position: relative;
margin: 0;
border: 0;
background: transparent url(/images/bg_content-bl.png) center top repeat-y;
<?
if ($HAS_STICKY_FOOTER == 1)
echo " padding: 0 0 " . (($HT_STICKY_FOOTER + $XPAD_STICKY_FOOTER) + 15) . "px 0;\n";
else
echo " padding: 0;\n";
?>
}

#contentframe {
position: relative;
margin: 0;
border: 0;
background: transparent url(/images/bg_content-bl-wh.png) center top repeat-y;
<?
if ($HAS_STICKY_FOOTER == 1)
echo " padding: 0 0 " . (($HT_STICKY_FOOTER + $XPAD_STICKY_FOOTER) + 15) . "px 0;\n";
else
echo " padding: 0;\n";
?>
}

#contentguide {
position: relative;
margin: 0;
border: 0;
<?
if ($HAS_STICKY_FOOTER == 1)
echo " padding: 0 0 " . (($HT_STICKY_FOOTER + $XPAD_STICKY_FOOTER) + 15) . "px 0;\n";
else
echo " padding: 0;\n";
?>
}

div.colgroup {
clear: both;
/* position: relative; */
margin: 0 auto;
border: 0;
background: transparent;
<?
if ($IS_FLEX_GRID == 1)
echo " padding: 0 " . $WIN_GUTTER . "px;\n";
else {
echo " padding: 0;\n";
echo " width: " . ($COL_COUNT * $COL_WIDTH) . "px;\n";
}
?>
height: 1%;
overflow: visible;
z-index: 1;
}



#introside {
margin: 50px 15px 15px 20px;
font: normal 11px/24px <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}


div#main h2 {
margin: 5px 0 15px 0;
font: bold 16px/26px <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
div#main h3 {
margin: 0 0 20px 0;
padding: 0;
font: normal 25px/30px Georgia, "Times New Roman", Times, serif;
color: #C93;
}
div#main h3 span.date {
margin: 10px 0 0px 0;
padding: 0;
font: bold 11px/10px verdana,arial,helvetica,sans-serif;
color: #C93;
}
div#main h4 {
margin: 35px 0 10px 0;
font: bold 14px/26px <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
div#main div.topic h2 {
cursor: pointer;
background: transparent url(/images/icon-topic-form-gallery.jpg) left top no-repeat;
font: bold 16px/26px verdana,arial,helvetica,sans-serif;
color: #2C4258;
padding: 8px 0px 0px 50px;
height: 45px;
margin-left: -18px;
}
div#main div.topic h4 {
cursor: pointer;
background: transparent url(/images/icon-topic-form.gif) left top no-repeat;
padding: 8px 0px 0px 50px;
height: 45px;
margin-left: -18px;
}
div#main h5 {
margin: 0 0 20px 0;
padding: 0;
font: bold 10px/12px <?=$BASE_FONT_FAMILY ?>;
}
div#main div.topic h5 {
cursor: pointer;
}
div#main fieldset.suggestions h4,
div#main fieldset.tools h4 {
font: bold 14px/16px Georgia, "Times New Roman", Times, serif;
color: #6F6C69;
}
div#main h4.sidebar {
margin: -5px 0 0 0;
padding: 0;
font: normal 20px/30px Georgia, "Times New Roman", Times, serif;
color: #7A7C65;
}
div#main p {
margin: 0 50px 10px 0;
padding: 0;
}
div#main table.dataGrid p {
margin: 0 10px 10px 0;
}
div#main div.topic p {
margin: 0 50px 20px 0;
padding: 0;
}
div#main td.tdguide p {
margin: 10px 0 10px 0;
}
div#main p.small {
font-weight: bold;
font-size: <?=$BASE_FONT_SIZE - 2 ?>px;
}
div#main p.small span {
padding: 0 5px;
color: #BBB;
}

div#main span.intromark {
margin: 0 0 0 -5px;
padding: 0 5px;
font: bold 12px arial,helvetica,sans-serif;
color: #7C8FA3;
text-transform: uppercase;
letter-spacing: .25em;
vertical-align: top; }

div#main span.intromarklg {
margin: 0 0 10px 0px;
padding: 5px 0px;
font: bold 13px verdana,arial,helvetica,sans-serif;
color: #7C8FA3;
text-transform: uppercase;
letter-spacing: .20em;
vertical-align: top; }

div#main div.intropad span.intropara {
padding: 0 80px 0 0;
display:block;
}

div#main fieldset.suggestions p {
position: relative;
border-top: 2px dotted #e3e3c7;
padding: 10px 0 0 70px;
min-height: 60px;
}
div#main fieldset.suggestions img {
position: absolute;
top: 10px;
left: 0px;
margin: 0;
padding: 0;
z-index: 99;
}
div#main fieldset.suggestions p a {
font-weight: bold;
}

div#main div.topic fieldset.suggestions {
margin: 40px;
}
div#main div.topic fieldset.suggestions h5 {
font: bold 14px/16px Georgia, "Times New Roman", Times, serif;
color: #6F6C69;
margin: 10px 10px;
}
div#main div.topic fieldset.suggestions p {
position: relative;
border-top: 2px dotted #e3e3c7;
padding: 10px 0 0 80px;
min-height: 60px;
font: normal 11px/16px verdana,arial,helvetica,sans-serif;
}
div#main div.topic fieldset.suggestions img {
position: absolute;
top: 10px;
left: 10px;
margin: 0;
padding: 0;
z-index: 99;
}
div#main div.topic fieldset.suggestions p a {
font-weight: bold;
}

div#main fieldset.tools ul {
position: relative;
margin: 0 0 0 0px;
border-top: 1px dotted #e3e3c7;
padding: 10px 10px 5px 0px;
list-style-type: none;
}
div#main fieldset.tools ul li a {
font-size: 10px;
text-decoration: none;
color: #275078;
}
div#main fieldset.tools ul li a:hover {
text-decoration: underline;
}

div#main fieldset.contractorform ul {
position: relative;
margin: 0 0 0 0px;
border-top: 1px dotted #e3e3c7;
padding: 10px 5px 5px 0px;
list-style-type: none;
}
div#main fieldset.contractorform li a {
font-size: 10px;
text-decoration: none;
color: #275078;
}
div#main fieldset.contractorform li a:hover {
text-decoration: underline;
}

div.topic,
div.topicCtrl {
border-top: 1px dotted #ccc;
padding: 20px 10px 15px 30px !important;
height: 1%;
}
div.topicCtrl {
padding: 10px !important;
}
div.topicBottom {
border-top: 0px dotted #ccc;
padding: 12px 10px 15px 30px !important;
background: transparent url(/images/bg_topic_bottom_bkgd.gif) left top no-repeat;
}
ol {
margin: 10px 10px 10px 20px;
padding: 0 20px;
}
ul {
margin: 20px 10px 20px 0px;
padding: 0 20px;
list-style: none;
}

ul.otherLinks {
margin: 0 20px 0 0;
}

ul.blocklist span {
margin: 0 7px 0 0;
font-size: 11px;
}
ol,
ul.topicsList {
margin: -15px 10px 30px 10px;
border-top: 0px dotted #CCC;
border-bottom: 0px dotted #CCC;
padding: 0px 30px;
font: normal 11px/19px verdana,arial,helvetica,sans-serif;
}
ol.contentList {
margin: 15px 0px;
font: normal 12px/19px verdana,arial,helvetica,sans-serif;
}
ul.sectionNav {
margin: 10px 10px 10px 25px !important;
border-top: 1px dotted #EEE;
border-bottom: 0;
padding: 0;
list-style: none;
}
ul.space {
border-top: 0px dotted #EEE;
border-bottom: 0;
padding: 0;
list-style: none;
height: 1px;
}
ul.space li {
background: none;
}

ol li,
ul li {
display: list-item;
margin: 0;
padding: 0;
}
ul li {
background: transparent url(/images/bg_bullet_square.png) -10px 6px no-repeat;
padding: 0 0 0 20px;
}
ul.sectionNav li {
position: relative;
margin: 0;
border-bottom: 1px dotted #EEE;
padding: 5px 0 5px 0;
font: normal 13px/15px <?=$BASE_FONT_FAMILY ?>;
}
ul.sectionNav li.insidelist {
position: relative;
margin: 0;
border-bottom: 1px dotted #EEE;
padding: 5px 0 5px 30px;
font: normal 13px/15px <?=$BASE_FONT_FAMILY ?>;
}
ul.sectionNav li.insidecalc {
position: relative;
margin: 0;
border-bottom: 1px dotted #EEE;
padding: 5px 0 5px 30px;
font: normal 13px/15px <?=$BASE_FONT_FAMILY ?>;
}
ul.sectionNav li a {
display: block;
text-decoration: none;
padding-left: 20px;
}

ul.contractorNav {
margin: 10px 10px 10px 25px !important;
border-top: 1px dotted #EEE;
border-bottom: 0;
padding: 0;
list-style: none;
}
ul.contractorNav li {
margin: 0;
border-bottom: 1px dotted #EEE;
padding: 3px 0 3px 0;
font: normal 13px/15px <?=$BASE_FONT_FAMILY ?>;
}
ul.contractorNav li a {
text-decoration: none;
padding-left: 20px;
}

ul.contractorNav li {
background: none;
}

ul.topicNav li {
margin: 0;
font: normal 11px/18px <?=$BASE_FONT_FAMILY ?>;
}

ul.ordinal li span {
position: absolute;
top: 2px;
left: -13px;
margin: 0;
border: 0;
background: transparent;
padding: 0;
width: 26px;
height: 26px;
z-index: 99;
}


div#main div.topic ol li,
div#main div.topic ul li {
margin: 15px 0px;
}

#calendarlist li a {
font: normal 10px verdana, Arial, Helvetica, sans-serif;
color: #777;
text-decoration: none;
}

#calendarlist li a span {
font: normal 12px verdana, Arial, Helvetica, sans-serif;
color: #5A8787;
padding-right: 8px;
text-decoration: underline;
}

#calendarlist li a:hover span {
color: #8CB9B9;
}

#introcontent {
padding-left: 20px;
}

<?php
if ($IS_FLEX_GRID == 1) {

echo <<<CSS1
div.grid111,
div.grid100,
div.grid010,
div.grid001,
div.grid110,
div.grid011 {
border: 0;
CSS1;
echo " background: " . $GRID_BG . ";\n";
echo " padding: " . $GRID_GUTTER . "px 0;\n";
echo <<<CSS2
}

div.grid111 {
margin: 0;
}

div.grid100 {
float: left;
margin: 0;
CSS2;
echo " width: " . $COL_LEFT_WIDTH . "px;\n";
echo <<<CSS3
}
div.grid010 {
CSS3;
echo " margin: 0 " . ($COL_RIGHT_WIDTH + ($GRID_GUTTER * 2)) . "px 0 " . ($COL_LEFT_WIDTH + ($GRID_GUTTER * 2)) . "px;\n";
echo <<<CSS4
}
div.grid001 {
float: right;
margin: 0;
CSS4;
echo " width: " . $COL_RIGHT_WIDTH . "px;\n";
echo <<<CSS5
}
div#masthead div.grid100,
div#masthead div.grid001,
div#header div.grid100,
div#header div.grid001 {
width: 45%;
}

div.grid110 {
CSS5;
echo " margin: 0 " . ($COL_RIGHT_WIDTH + ($GRID_GUTTER * 2)) . "px 0 0;\n";
echo " }\n";
echo "div.grid011 {\n";
echo " margin: 0 0 0 " . ($COL_LEFT_WIDTH + ($GRID_GUTTER * 2)) . "px;\n";
echo " }\n";

}
else {

echo "div.withBorder {\n";
echo "	margin: 20px auto;\n";
echo "	border: " . $GROUP_BRDR_WIDTH . "px solid " . $GROUP_BRDR_COLOR . ";\n";
echo "	background: " . $GROUP_BG . ";\n";
echo "	padding: " . ($GROUP_GUTTER - 10 - $GROUP_BRDR_WIDTH) . "px;\n";
echo "	}\n";

# dynamically build the column division styles
for ($i = 1; $i <= $COL_COUNT; $i++) {
echo "div.colspan" . $i . " {\n";
echo " float: left;\n";
echo " margin: 0;\n";
echo " border: 0;\n";
echo " background: " . $COL_BG . ";\n";
echo " padding: 0;\n";
echo " width: " . ($i * $COL_WIDTH) . "px;\n";
echo " }\n";
}

# dynamically build the column (gallery) division styles
for ($i = 1; $i <= $COL_COUNT; $i++) {
echo "div.colspan-gl" . $i . " {\n";
echo " float: left;\n";
echo " margin: 0;\n";
echo " border: 0;\n";
echo " background: " . $COL_BG_GL . ";\n";
echo " padding: 0;\n";
echo " width: " . ($i * $COL_WIDTH) . "px;\n";
echo " }\n";
}

# dynamically build the column (frame) division styles
for ($i = 1; $i <= $COL_COUNT; $i++) {
echo "div.colspan-wh" . $i . " {\n";
echo " float: left;\n";
echo " margin: 0;\n";
echo " border: 0;\n";
echo " background: " . $COL_BG_WH . ";\n";
echo " padding: 0;\n";
echo " width: " . ($i * $COL_WIDTH) . "px;\n";
echo " }\n";
}

# dynamically build the grid styles
for ($j = 1; $j <= $COL_COUNT; $j++) {
echo "div.grid" . $j . " {\n";
echo " float: left;\n";
echo " margin: 0;\n";
echo " border: 0;\n";
echo " background: " . $GRID_BG . ";\n";
echo " padding: " . $GRID_GUTTER . "px " . $GRID_GUTTER . "px;\n";
echo " width: " . (($j * $GRID_WIDTH) + (2 * ($j - 1) * $GRID_GUTTER)) . "px;\n";
echo " }\n";
}

}
?>

div.pad {
margin: 0;
padding: 0 10px 10px 10px;
}

/* ------------------------------------------------------------
* INTRO PAD
* ------------------------------------------------------------ */

div.articlepad {
margin-top: 20px;
border-top: 1px dotted #888;
}

div.intropad {
margin: 0;
padding: 0 15px 10px 15px;
font: normal 12px/20px verdana,arial,helvetica,sans-serif;
color: #64788E;
}

div.intropad ol {
margin: 10px 60px 0 20px;
border-top: 1px solid #E6E6E6;
padding: 0 0 10px 0;
list-style: none;
}

div.intropad ol li {
margin: 0;
border-bottom: 1px solid #E6E6E6;
padding: 2px 0 2px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 10 ?>px; /* 230 */
font: normal <?=$BASE_FONT_SIZE ?>px/24px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

div.intropad ol li.noline {
margin-left: 40px;
border-bottom: 1px solid #E6E6E6;
padding: 2px 0 2px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 50 ?>px; /* 230 */
font: normal <?=$BASE_FONT_SIZE ?>px/24px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
background: transparent url(/images/icon-list-product.gif) left center no-repeat;
}

div.intropad ol li.noimageline {
margin-left: 120px;
border-bottom: 1px solid #E6E6E6;
padding: 2px 0 2px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 50 ?>px; /* 230 */
font: normal <?=$BASE_FONT_SIZE ?>px/24px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

div.intropad ol li.noimageline a {
margin-left: -80px;
}

div.intropad ol li.navigationline {
margin-left: 40px;
border-bottom: 0px solid #E6E6E6;
padding: 2px 0 2px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 50 ?>px; /* 230 */
font: normal 11px/18px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
background: transparent url(/images/icon-list-product.gif) left center no-repeat;
}

div.intropad ol li.nonavigationline {
margin-left: 40px;
border-bottom: 0px solid #E6E6E6;
padding: 2px 0 2px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 50 ?>px; /* 230 */
font: normal 11px/18px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}

div.intropad ol li.space {
height: 30px;
border-bottom: 1px solid #E6E6E6;
}


div.intropad ol a {
text-decoration: none;
color: #7C8FA3;
}

div.intropad ol a:hover {
text-decoration: none;
color: #A1AFBD;
}


/* ------------------------------------------------------------
* MESSAGE BLOCKS
* ------------------------------------------------------------ */

ul.screenMsgs {
position: relative;
margin: 0 0 10px 0;
padding: 0;
}

ul.screenMsgs li.errorMsg,
ul.screenMsgs li.systemMsg,
ul.screenMsgs li.warningMsg {
position: relative;
margin: 0 0 10px 0;
border-width: 2px;
border-style: solid;
background: transparent url(/images/bg_hash.png);
padding: 6px 10px;
font: bold 11px/16px <?=$BASE_FONT_FAMILY ?>;
text-align: left;
list-style: none;
}
ul.screenMsgs li.errorMsg {
border-color: <?=$ERROR_BRDR ?>;
background-color: <?=$ERROR_BG ?>;
color: <?=$ERROR_BRDR ?>;
}
ul.screenMsgs li.systemMsg {
border-color: <?=$SYSTEM_BRDR ?>;
background-color:<?=$SYSTEM_BG ?>;
color: <?=$SYSTEM_BRDR ?>;
}
ul.screenMsgs li.warningMsg {
border-color: <?=$WARNING_BRDR ?>;
background-color: <?=$WARNING_BG ?>;
color: <?=$WARNING_BRDR ?>;
}

ul.screenMsgs li.errorMsg span.msgIcon,
ul.screenMsgs li.systemMsg span.msgIcon,
ul.screenMsgs li.warningMsg span.msgIcon {
position: absolute;
left: 6px;
top: 6px;
margin: 0;
border: 0;
background-image: url(/images/icons_status.png);
background-position: 0 0;
background-repeat: no-repeat;
padding: 0;
width: 16px;
height: 16px;
}
ul.screenMsgs li.errorMsg span.msgIcon {
background-position: 0 -50px;
}
ul.screenMsgs li.systemMsg span.msgIcon {
background-position: 0 0;
}
ul.screenMsgs li.warningMsg span.msgIcon {
background-position: 0 -150px;
}

.msgLevelError {
color: <?=$ERROR_BRDR ?>;
}
.msgLevelFatal {
color: #633;
}
.msgLevelSystem {
color: <?=$SYSTEM_BRDR ?>;
}
.msgLevelWarn {
color: <?=$WARNING_BRDR ?>;
}


/* ------------------------------------------------------------
* CONTENT-GALLERY
* ------------------------------------------------------------ */

#contentgallery {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-bl-gallery.png) center bottom repeat-y;
padding: 0;
}

#tablegallery {
margin: 15px 0 0px 0;
width: 100%;
}

div#contentgallery h4 {
margin: 0;
padding: 16px 0px 17px 0px;
font: normal 25px Georgia, "Times New Roman", Times, serif;
color: #C93;
}


/* ------------------------------------------------------------
* FOOTER-SPACE
* ------------------------------------------------------------ */

#footerspace {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-bl-footer.png) center bottom repeat-y;
padding: 0 0 0px 0;
}
#footerspace p {
margin: 0;
padding: 5px 0 0 0;
font: bold 16px/15px Georgia, "Times New Roman", Times, serif;
color: #666;
text-align: center;
letter-spacing: .05em;
}
#footerspace p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.50;
}


/* ------------------------------------------------------------
* FOOTER-HOME
* ------------------------------------------------------------ */

#footerhome {
margin: 0;
border: 0;
padding: 0 0 0px 0;
}
#footerhome p {
margin: 0;
padding: 5px 0 0 0;
font: bold 16px/15px Georgia, "Times New Roman", Times, serif;
color: #666;
text-align: center;
letter-spacing: .05em;
}
#footerhome p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.50;
}


/* ------------------------------------------------------------
* FOOTER-RATE
* ------------------------------------------------------------ */

#footerrate {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-bl-footer.png) center bottom repeat-y;
padding: 0 0 20px 0;
}
#footerrate p {
margin: 0;
padding: 5px 0 0 0;
font: normal 11px/15px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
#footerrate p a {
text-decoration: underline;
color: #888;
}
#footerrate p a:hover {
text-decoration: underline;
color: #8CB9B9;
}
#footerrate p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.50;
}


#galleryrate p {
margin: 0;
padding: 5px 0 0 0;
text-align: right;
font: normal 11px/15px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
#galleryrate p a {
text-decoration: underline;
color: #888;
}
#galleryrate p a:hover {
text-decoration: underline;
color: #8CB9B9;
}

/* ------------------------------------------------------------
* FOOTER-NETWORK
* ------------------------------------------------------------ */

#footernetwork {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-bl-footer.png) center bottom repeat-y;
padding: 0 0 20px 0;
}
#footernetwork p {
margin: 0;
padding: 5px 0 0 0;
font: normal 11px/18px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
#footernetwork p.header {
margin: 0;
padding: 5px 0 0 0;
font: bold 12px/18px verdana,arial,helvetica,sans-serif;
color: #666;
}
#footernetwork p a {
text-decoration: underline;
color: #888;
padding-left: 20px;
}
#footernetwork p a.tag1 {
background: transparent url(/images/icon-network-tab1.gif) 0px 0px no-repeat;
}
#footernetwork p a.tag2 {
background: transparent url(/images/icon-network-tab2.gif) 0px 0px no-repeat;
}
#footernetwork p a.tag3 {
background: transparent url(/images/icon-network-tab3.gif) 0px 0px no-repeat;
}
#footernetwork p a.tag4 {
background: transparent url(/images/icon-network-tab4.gif) 0px 0px no-repeat;
}
#footernetwork p a.tag5 {
background: transparent url(/images/icon-network-tab5.gif) 0px 0px no-repeat;
}
#footernetwork p a.tag6 {
background: transparent url(/images/icon-network-tab6.gif) 0px 0px no-repeat;
}
#footernetwork p a:hover {
text-decoration: underline;
color: #8CB9B9;
}
#footernetwork p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.50;
}

/* ------------------------------------------------------------
* FOOTER
* ------------------------------------------------------------ */

#footer {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-bl.png) center bottom no-repeat;
padding: 0px 0 20px 0;
height: 110px;
}
#footer p {
margin: 8px 0;
padding: 17px 0 0 0;
font: normal 11px/15px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
.footerlead {
padding: 0px 0 0 0;
font: normal 11px/15px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
#footer p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.50;
}


/* ------------------------------------------------------------
* FOOTERCHART
* ------------------------------------------------------------ */

#footerchart {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-chart.png) center bottom repeat-x;
padding: 0px 0 20px 0;
height: 110px;
}
#footerchart p {
margin: 8px 0;
padding: 17px 0 0 0;
font: normal 11px/15px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
.footerlead {
padding: 0px 0 0 0;
font: normal 11px/15px <?=$BASE_FONT_FOOTER ?>;
color: #666;
}
#footerchart p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
filter: alpha(opacity=50);
opacity: 0.50;
}

/* ------------------------------------------------------------
* FLOAT CLEARING
* ------------------------------------------------------------ */

div#masthead:after,
div#header:after,
div#content:after,
div#contentframe:after,
div.colgroup:after {
clear: both;
content: ".";
display: block;
height: 0;
visibility: hidden;
}






/* ------------------------------------------------------------
* IFRAME
* ------------------------------------------------------------ */

#footeriframe {
margin: 0;
border: 0;
background: transparent url(/images/bg_content-bl.png) center bottom repeat-y;
padding: 0 0 20px 0;
}

#frame {
position: relative;
margin: -14px 0 0 0;
border: 0;
background: #fff;
}

#framerespond {
position: relative;
margin: -14px 0 0 0;
border: 0;
padding-top: 20px;
background: #fff;
}

/* ------------------------------------------------------------
* BREADFRAMECHART
* ------------------------------------------------------------ */

#breadframechart {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-shadow2.gif) center bottom repeat-x;
padding: 1px 0 20px 0;
}
#breadframechart div.colgroup div {
padding: 3px 10px;
vertical-align: middle;
}
#breadframechart p {
margin: 0;
padding: 0;
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
#breadframechart p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=33)";
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=33);
opacity: 0.33;
}
#breadframechart p a.toolsForms {
display: inline-block;
background: transparent url(/images/icon_tools.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadframechart p a.toolsFrame {
margin-right: 40px;
display: inline-block;
background: transparent url(/images/icon_frame.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadframechart p a {
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
text-decoration: none;
}
#breadframechart p a:hover {
color: #668079;
}

#breadframechart h3 {
margin: -8px 0 0 0;
padding: 0px;
font: bold 15px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #304141;
}

/* ------------------------------------------------------------
* BREADFRAME
* ------------------------------------------------------------ */

#breadframe {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-shadow-chart.gif) center bottom repeat-x;
padding: 1px 0 30px 0;
}
#breadframe div.colgroup div {
padding: 3px 10px;
vertical-align: middle;
}
#breadframe p {
margin: -5px 0 0 0;
padding: 0;
font: normal 10px/12px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
#breadframe p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=33)";
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=33);
opacity: 0.33;
}
#breadframe p a.toolsForms {
display: inline-block;
background: transparent url(/images/icon_tools.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadframe p a.toolsFrame {
margin-right: 40px;
display: inline-block;
background: transparent url(/images/icon_frame.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadframe p a {
font: normal 10px/12px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
text-decoration: none;
}
#breadframe p a:hover {
color: #668079;
}

#breadframe h3 {
margin: -10px 0 0 0;
padding: 0px;
font: bold 15px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #304141;
}

#breadframe p.linetext {
margin: -12px 75px 0px 0px;
padding: 0;
font: normal 10px/14px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}


/* ------------------------------------------------------------
* BREADCRUMBFRAME
* ------------------------------------------------------------ */

#breadcrumbframe {
margin: 0;
border: 0;
background: transparent url(/images/bg_footer-shadow.gif) center bottom repeat-x;
padding: 1px 0 20px 0;
}
#breadcrumbframe div.colgroup div {
padding: 3px 10px;
vertical-align: middle;
}
#breadcrumbframe p {
margin: 0;
padding: 0;
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
#breadcrumbframe p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=33)";
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=33);
opacity: 0.33;
}
#breadcrumbframe p a.toolsForms {
display: inline-block;
background: transparent url(/images/icon_tools.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumbframe p a.breakFrame {
display: inline-block;
background: transparent url(/images/icon_break.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumbframe p a.toolsFrame {
margin-right: 40px;
display: inline-block;
background: transparent url(/images/icon_frame.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumbframe p a.moneyOptimize {
display: inline-block;
background: transparent url(/images/icon_money.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadcrumbframe p a {
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
text-decoration: none;
}
#breadcrumbframe p a:hover {
color: #668079;
}

/* ------------------------------------------------------------
* BREADFULLFRAME
* ------------------------------------------------------------ */

#breadfullframe {
margin: 0;
border: 0;
background: transparent url(/images/bg_breadcrumb-wh.png) center bottom no-repeat;
padding: 1px 0 14px 0;
}
#breadfullframe div.colgroup div {
padding: 3px 10px;
vertical-align: middle;
}
#breadfullframe p {
margin: 0;
padding: 0;
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
}
#breadfullframe p span {
padding: 0 3px;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=33)";
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=33);
opacity: 0.33;
}
#breadfullframe p a.toolsForms {
display: inline-block;
background: transparent url(/images/icon_tools.png) left center no-repeat;
padding: 0 0 0 21px;
color: #FFF;
text-decoration: none;
}
#breadfullframe p a {
font: normal 10px/30px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #2C4258;
text-decoration: none;
}
#breadfullframe p a:hover {
color: #668079;
}

/* ------------------------------------------------------------
* MAINFRAME
* ------------------------------------------------------------ */

div#mainframe {
min-height: 300px;
margin; 0;
}
div#mainframe h3 {
margin: 0 0 10px 7px;
padding: 10px 0px 0px 0px;
font: normal 25px/30px Georgia, "Times New Roman", Times, serif;
color: #C93;
}
div#mainframe span.intromark {
margin: 0 0 0 3px;
padding: 0 5px;
font: bold 12px arial,helvetica,sans-serif;
color: #7C8FA3;
text-transform: uppercase;
letter-spacing: .25em;
vertical-align: top; }

div#mainframe p {
margin: 0 40px 10px 0;
padding: 0;
}

div#mainframe p.iframe {
margin: 0 5px 10px 5px;
padding: 0;
}

div#mainframe h4.sidebar {
margin: -5px 0 0 0;
padding: 0;
font: normal 20px/30px Georgia, "Times New Roman", Times, serif;
color: #7A7C65;
}
