<?php Header ("Content-type: text/css"); ?>

/* ------------------------------------------------------------
* PROJECT :
* FILENAME : forms.css (as PHP)
* ------------------------------------------------------------
* LAST UPDATED : 21 Mar 2010
' ------------------------------------------------------------
' AUTHOR(S) : Kevin Scholl (kevin@ksscholl.com)
* ------------------------------------------------------------ */

<? include "options.php"; ?>

/* ------------------------------------------------------------
* REDEFINE HTML TAGS FOR 2-COLUMN FORMS
* ------------------------------------------------------------ */

form {
margin: 0;
padding: 0;
}

fieldset {
position: relative;
<?
if ($IS_FLEX_GRID != 1) {
echo " clear: both;\n";
}
?>
margin: 0 0 10px 0;
border: 1px solid #ACC3C3;
background: #FFF;
padding: 0;
}
fieldset.suggestions {
border: 1px solid #DBDBB7;
background: #F5F5EB;
width: 270px;
}
fieldset p.suggestions {
padding: 0px 0px 25px 10px;
}
fieldset.tools {
border: 1px solid #DBDBB7;
background: #fafafa;
width: 220px;
margin: 0px 0px 25px 10px;
}
fieldset.contractorform {
float: right;
border: 1px solid #DBDBB7;
background: #fafafa;
width: 170px;
margin: 5px 35px 0px 0px;
}
fieldset.contractor {
border: 1px solid #DBDBB7;
background: #F5F5EB;
width: 450px;
}

@media print {
fieldset.searchFilter,
span.toggleDisplay {
display: none;
}
}

fieldset div.pad {
margin: 0;
border: 0;
background: transparent;
padding: 10px;
}

fieldset.tools div.pad {
margin: 0;
border: 0;
background: transparent;
padding: 5px 9px 5px 9px;
}

fieldset.tools div.padtest {
padding-top: 50px;
}
fieldset h3 {
margin: 0 0 10px 0;
padding: 0;
font: bold <?=$BASE_FONT_SIZE + 4 ?>px/1.0 arial,helvetica,sans-serif;
color: #36C;
}
fieldset h4 {
margin: 0;
padding: 0;
font: bold <?=$BASE_FONT_SIZE + 2 ?>px/20px arial,helvetica,sans-serif;
color: <?=$WARNING_BRDR ?>;
}
.toolh {
margin: 0;
padding: 0;
font: bold 11px/20px arial,helvetica,sans-serif;
color: <?=$WARNING_TOOL_BRDR ?>;
}
fieldset p {
margin: 0 0 10px 0;
padding: 0;
font: normal <?=$BASE_FONT_SIZE - 1 ?>px/18px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
vertical-align: top;
}
fieldset p.moduleTitle {
margin: 0;
border: 0;
background: <?=$BG_MODULETITLE ?> url(/images/bg_bars.png) left center repeat-x;
padding: 8px 10px;
font: normal <?=$BASE_FONT_SIZE - 1 ?>px/15px Verdana, <?=$BASE_FONT_FAMILY ?>;
color: #666;
vertical-align: middle;
}
fieldset p span.urgent {
font-weight: bold;
color: #C33;
}

fieldset p.moduleTitle span {
font: bold 100% <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
text-transform: normal;
}
fieldset p.moduleTitle span.toggleDisplay {
float: right;
font: normal <?=$BASE_FONT_SIZE - 1 ?>px/15px <?=$BASE_FONT_FAMILY ?>;
text-transform: none;
}
fieldset p.moduleTitle span.toggleDisplay a.cancelClose,
fieldset p.moduleTitle span.toggleDisplay a.panelHide,
fieldset p.moduleTitle span.toggleDisplay a.panelShow {
background: transparent url(/images/icon_close.png) right center no-repeat;
padding: 5px 20px 5px 0;
font-weight: bold;
text-decoration: none;
}
fieldset p.moduleTitle span.toggleDisplay a.panelHide {
background-image: url(/images/icon_panel_hide.gif);
}
fieldset p.moduleTitle span.toggleDisplay a.panelShow {
background-image: url(/images/icon_panel_show.gif);
}
fieldset p.moduleTitle select,
fieldset p.recordCount select {
margin: 0 2px;
vertical-align: baseline;
}

fieldset ol {
margin: 10px 10px 0 10px;
border-top: 1px solid #E6E6E6;
padding: 0 0 10px 0;
list-style: none;
}
fieldset ol.actionBtns {
border-top: 1px solid <?=$SYSTEM_BRDR ?>;
}
fieldset ol.actionBtns li {
border-bottom: 1px solid <?=$SYSTEM_BRDR ?>;
background: <?=$SYSTEM_BG ?> url(/images/bg_bars.png) center center repeat-x;
font-size: <?=$BASE_FONT_SIZE - 1 ?>px;
color: #BCB;
}
fieldset ol li {
margin: 0;
border-bottom: 1px solid #E6E6E6;
padding: 3px 0 3px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 10 ?>px; /* 230 */
font: normal <?=$BASE_FONT_SIZE ?>px/19px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
}
fieldset ol.news li {
padding: 5px 0;
line-height: 16px;
}

fieldset ol li.radioCheck {
padding: 3px 0 3px <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) + 10 ?>px; /* 250 */
}
fieldset ol li span.msgLevelError,
fieldset ol li span.msgLevelFatal,
fieldset ol li span.msgLevelWarn {
display: block;
margin: 5px 0 2px 0;
font: bold 10px/10px Verdana, <?=$BASE_FONT_FAMILY ?>;
}
fieldset ol li span.dollarsign {
padding: 0 1px;
font: bold 13px/13px "times new roman",times,serif;
color: #00A429;
}
fieldset ol li span.counter {
display: block;
font-size: <?=$BASE_FONT_SIZE - 1 ?>px;
color: #999;
}
fieldset ol li span.example {
font-size: <?=$BASE_FONT_SIZE - 1 ?>px;
color: #999;
}
fieldset ol li span.leadtxt {
display: block;
margin: 2px 0 5px 0;
font-size: <?=$BASE_FONT_SIZE - 1 ?>px;
line-height: 15px;
}
fieldset ol li th,
fieldset ol li td {
padding-right: 10px;
vertical-align: top;
}
fieldset ol li th {
text-align: left;
}

fieldset ol.login {
border-top: 0;
}
fieldset ol.login li {
border-bottom: 0;
}

fieldset ol li label {
float: left;
margin: 1px 0 0 -<?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 10 ?>px; /* -230 */
background: transparent;
padding-right: 15px;
width: <?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2))) - 30 ?>px; /* 210 */
font: bold <?=$BASE_FONT_SIZE ?>px/19px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
text-align: right;
}
fieldset ol.actionBtns li label {
margin-top: 3px;
font-weight: normal;
font-size: <?=$BASE_FONT_SIZE - 1 ?>px;
}
fieldset ol li.radioCheck label {
margin: 0 0 0 -<?=(($COL_COUNT / 4) * ($GRID_WIDTH + ($GRID_GUTTER * 2)) + 10) ?>px; /* -250 */
}
fieldset ol li label.required,
fieldset ol li label.valid {
background: transparent url(/images/icon_required.gif) right center no-repeat;
}
fieldset ol li label.valid {
background-image: url(/images/icon_valid.gif);
}

fieldset ol li img {
margin: 1px 0 0 0;
padding: 0;
vertical-align: text-top;
}

/* ------------------------------------------------------------
* FORM FIELDS
* ------------------------------------------------------------ */

input,
select,
textarea {
padding: 2px 3px 1px 3px;
font: normal <?=$BASE_FONT_SIZE ?>px <?=$BASE_FONT_FAMILY ?>;
color: #999;
}
select {
padding: 1px;
}
input.actionBtn,
input.pageBtn {
padding: 2px 4px;
font: bold 11px <?=$BASE_FONT_FAMILY ?>;
color: #333;
text-transform: uppercase;
letter-spacing: normal;
vertical-align: middle;
}
input.pageBtn {
padding: 0 2px;
text-transform: none;
}
input.radioBtn,
input.checkBox {
margin: -2px 1px 0 0;
padding: 0;
vertical-align: middle;
}
li.radioCheck input.radioBtn,
li.radioCheck input.checkBox {
margin-left: -20px;
margin-right: 4px;
}

fieldset ol li img {
vertical-align: top;
}

fieldset ul {
margin: 10px 10px 0 30px;
padding: 0 0 10px 0;
list-style-type: none;
}

fieldset ul li {
margin: 0;
font: normal <?=$BASE_FONT_SIZE ?>px/16px <?=$BASE_FONT_FAMILY ?>;
color: <?=$BASE_FONT_COLOR ?>;
background: transparent url(/images/bg_bullet_square.png) -10px 6px no-repeat;
padding: 0 0 0 20px;
}

/* ------------------------------------------------------------
* ERROR/FATAL/WARNING
* ------------------------------------------------------------ */

p.msgLevelError {
color: #C33;
}
p.msgLevelWarn {
color: #F93;
}
.errorRow {
background: #FAEAEA;
}
.warningRow {
background: #FFF3E5;
}

/* ------------------------------------------------------------
* FLOAT CLEARING
* ------------------------------------------------------------ */

fieldset ol li:after {
clear: both;
content: ".";
display: block;
height: 0;
visibility: hidden;
}