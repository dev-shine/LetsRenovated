<?php Header ("Content-type: text/css"); ?>

/* ------------------------------------------------------------
 * PROJECT        :
 * FILENAME       : tables.css (as PHP)
 * ------------------------------------------------------------
 * LAST UPDATED   : 21 Mar 2010
 * ------------------------------------------------------------
 * AUTHOR(S)      : Kevin Scholl (kevin@ksscholl.com)
 * ------------------------------------------------------------
 * NOTE(S)        :
 * ------------------------------------------------------------ */

<?php include "options.php"; ?>

/* ------------------------------------------------------------
 * DATA GRIDS
 * ------------------------------------------------------------ */

.dataGrid {
  margin: 0 0 10px 0;
  border-top: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
	border-spacing: 0;
  background: <?php echo $DGRID_BG ?>;
  padding: 0;
  width: 100%;
  }
.dataGrid caption {
  margin: 0 0 10px 0;
  padding: 0;
	font: bold 14px/20px <?php echo $BASE_FONT_FAMILY ?> !important;
	color: <?php echo $DGRID_TH_BRDR_COLOR ?>;
	text-align: left;
  }

.dataGrid tr.alt {
  background: <?php echo $DGRID_ROW_ALT ?>;
  }
.dataGrid td.highlight {
  background: <?php echo $DGRID_CELL_HIGHLIGHT ?> !important;
  }

.dataGrid th,
.dataGrid tfoot td {
  background: <?php echo $DGRID_TH_BG_COLOR . " " . $DGRID_TH_BG_IMG . " " . $DGRID_TH_BG_POS ?> repeat-x;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px <?php echo $DGRID_CELL_PAD_VERT + 1 ?>px;
  font: bold 10px/13px Verdana, <?php echo $BASE_FONT_FAMILY ?>;
  color: #111;
  text-align: center;
  vertical-align: middle;
  }
.dataGrid thead th {
  border: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-top: 0;
  }
.dataGrid tfoot th,
.dataGrid tfoot td {
  border: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 0;
  }
.dataGrid th a:link,
.dataGrid th a:visited,
.dataGrid tfoot td a:link,
.dataGrid tfoot td a:visited {
  color: #000;
  }
.dataGrid th a:hover,
.dataGrid tfoot td a:hover {
  color: <?php echo $LINK_HOVER ?>;
  }
.dataGrid th a:active,
.dataGrid tfoot td a:active {
  color: <?php echo $LINK_ACTIVE ?>;
  }

.dataGrid td {
  border-bottom: 1px solid <?php echo $DGRID_TD_BRDR_COLOR ?>;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px;
  font: normal <?php echo $BASE_FONT_SIZE ?>px/<?php echo $BASE_LINE_HEIGHT + 1?>px Arial, Helvetica, sans-serif;
  color: <?php echo $DGRID_FONT_COLOR ?>;
  text-align: center;
  vertical-align: top;
  }
.dataGrid tr.lastRow td {
  border-bottom: 0;
  padding-bottom: <?php echo $DGRID_CELL_PAD_VERT ?>px;
  }

p.dataGridRecordCount,
p.fieldsetRecordCount {
	margin: -10px 0 10px;
	border: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
	border-top: 0;
	background: <?php echo $DGRID_REC_CNT_BG ?> url(/images/bg_hash.png);
	padding: 3px 7px;
	font: normal <?php echo $BASE_FONT_SIZE - 1 ?>px/24px <?php echo $BASE_FONT_FAMILY ?>;
	color: <?php echo $BASE_FONT_COLOR ?>;
	}
p.fieldsetRecordCount {
	margin: 0;
	border: 0;
	border-top: 1px dashed #BBB;
	padding: 3px 10px;
	}
p.dataGridRecordCount span,
p.fieldsetRecordCount span {
  padding: 0 5px;
  color: #999;
	}
p.dataGridRecordCount input,
p.fieldsetRecordCount input,
p.dataGridRecordCount select,
p.fieldsetRecordCount select {
  margin: 0 2px;
	font-size: <?php echo $BASE_FONT_SIZE - 1 ?>px;
	vertical-align: baseline;
	}

/* ------------------------------------------------------------
 * CALENDAR
 * ------------------------------------------------------------ */

.calendar {
  margin: 0 0 10px 0;
  border-top: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-left: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  background: <?php echo $DGRID_BG ?>;
  padding: 0;
  width: 100%;
  }

.calendar tr.over,
.calendar td.over {
  background: <?php echo $DGRID_ROW_HOVER ?>;
  }
.calendar td.highlight {
  background: <?php echo $DGRID_CELL_HIGHLIGHT ?> !important;
  }

.calendar th {
  border-right: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  background: <?php echo $DGRID_TH_BG_COLOR . " " . $DGRID_TH_BG_IMG . " " . $DGRID_TH_BG_POS ?> repeat-x;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px <?php echo $DGRID_CELL_PAD_VERT + 1 ?>px;
  font: bold 10px/13px Verdana, <?php echo $BASE_FONT_FAMILY ?>;
  color: #111;
  text-align: center;
  vertical-align: middle;
  }
.calendar th a:link,
.calendar th a:visited {
  color: #000;
  }
.calendar th a:hover {
  color: <?php echo $LINK_HOVER ?>;
  }
.calendar th a:active {
  color: <?php echo $LINK_ACTIVE ?>;
  }

.calendar td {
  border-right: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px;
	height: 85px;
  font: normal <?php echo $BASE_FONT_SIZE - 1?>px/<?php echo $BASE_LINE_HEIGHT + 1?>px <?php echo $BASE_FONT_FAMILY ?>;
  color: <?php echo $DGRID_FONT_COLOR ?>;
  text-align: left;
  vertical-align: top;
  }
.calendar td.disabled {
  background: #EEE url(/images/bg_hash.png);
  color: #999;
  }
.calendar td span.date {
  display: block;
  margin: -<?php echo $DGRID_CELL_PAD_VERT - 1 ?>px -<?php echo $DGRID_CELL_PAD_VERT ?>px <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px;
  border-bottom: 1px solid <?php echo $DGRID_TD_BRDR_COLOR ?>;
  background: <?php echo $DGRID_ROW_ALT ?>;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px;
  font: bold <?php echo $BASE_FONT_SIZE - 1?>px/<?php echo $BASE_LINE_HEIGHT + 1?>px <?php echo $BASE_FONT_FAMILY ?>;
  color: <?php echo $DGRID_FONT_COLOR ?>;
  }

/* ------------------------------------------------------------
 * COLUMN MANAGER (for DATA GRIDS)
 * ------------------------------------------------------------ */

.colManager {
	margin: 0 0 10px 0;
	border: 1px solid <?php echo $SYSTEM_BRDR ?>;
	border-right: 0;
	border-left: 0;
	background: <?php echo $SYSTEM_BG ?> url(/images/bg_bars.png) left center repeat-x;
	padding: 4px 10px 5px;
	font: normal 11px/20px <?php echo $BASE_FONT_FAMILY ?>;
	color: #666;
	}
.colManager span {
	white-space: nowrap;
	}
.colManager span input {
	margin: -1px 5px 0 10px;
	padding: 0;
	vertical-align: middle;
	}

/* ------------------------------------------------------------
 * INFORMATION TABLES
 * ------------------------------------------------------------ */

.infoTable {
  margin: 0 0 10px 0;
  border-bottom: 1px solid <?php echo $DGRID_TD_BRDR_COLOR ?>;
  background: <?php echo $DGRID_BG ?>;
	width: 100%;
  }

.infoTable th {
  border-top: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  background: <?php echo $DGRID_TH_BG_COLOR . " " . $DGRID_TH_BG_IMG . " " . $DGRID_TH_BG_POS ?> repeat-x;
  padding: <?php echo $DGRID_CELL_PAD_VERT ?>px <?php echo $DGRID_CELL_PAD_HOR ?>px;
  font: bold 11px/13px <?php echo $BASE_FONT_FAMILY ?>;
  color: #111;
  text-align: left;
  vertical-align: middle;
  }
.infoTable th label.required {
	background: transparent url(/images/icons_status.png) right -100px no-repeat;
	padding: 0 16px 0 0;
  }

.infoTable td {
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_HOR ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px;
  font: normal 12px/16px <?php echo $BASE_FONT_FAMILY ?>;
  color: <?php echo $DGRID_FONT_COLOR ?>;
  text-align: left;
  vertical-align: top;
  }
.infoTable td img {
  float: left;
	display: block;
  margin: 0 5px 0 0;
	border: 0;
	background: transparent;
	padding: 0;
  }
.infoTable td span.example {
  display: block;
	margin: 5px 0 2px 0;
	color: #999;
  }

/* ------------------------------------------------------------
 * MULTIPLE COLUMN TABLES
 * ------------------------------------------------------------ */

.mColGrid {
  margin: 0 0 10px 0;
  border-top: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 1px solid <?php echo $DGRID_TH_BRDR_COLOR ?>;
	border-spacing: 0;
  background: <?php echo $DGRID_BG ?>;
  padding: 0;
  width: 100%;
  }
.mColGrid th,
.mColGrid td {
  border-bottom: 1px solid <?php echo $DGRID_TD_BRDR_COLOR ?>;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px;
  font: normal <?php echo $BASE_FONT_SIZE ?>px/<?php echo $BASE_LINE_HEIGHT + 1 ?>px <?php echo $BASE_FONT_FAMILY ?>;
  color: <?php echo $DGRID_FONT_COLOR ?>;
  text-align: left;
  vertical-align: middle;
  }
.mColGrid tr.lastRow th,
.mColGrid tr.lastRow td {
  border-bottom: 0;
  }
.mColGrid tr.alt {
  background: <?php echo $DGRID_ROW_ALT ?>;
  }
.mColGrid th {
  border-bottom-color: #FFF;
  background: <?php echo ($DGRID_TH_BG_COLOR . " " . $DGRID_TH_BG_IMG . " " . $DGRID_TH_BG_POS) ?> repeat-x;
  padding: <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px <?php echo $DGRID_CELL_PAD_VERT - 1 ?>px <?php echo $DGRID_CELL_PAD_VERT ?>px;
  font: bold <?php echo $BASE_FONT_SIZE - 1 ?>px/<?php echo $BASE_LINE_HEIGHT + 1 ?>px <?php echo $BASE_FONT_FAMILY ?>;
  color: #111;
  text-align: left;
  }
.mColGrid th label {
  display: block;
  }
.mColGrid th label.required {
  background: transparent url(/images/icon_required.png) right center no-repeat;
  padding-right: 13px;
  }
.mColGrid td label {
  vertical-align: absmiddle;
  }
.mColGrid input {
  padding: 1px 2px;
  font-size: <?php echo $BASE_FONT_SIZE - 1 ?>px;
  line-height: 1.0;
  vertical-align: absmiddle;
  }
.mColGrid select {
  padding: 0 !important;
  font-size: <?php echo $BASE_FONT_SIZE - 1 ?>px;
  line-height: 1.0;
  vertical-align: absmiddle;
  }

/* ------------------------------------------------------------
 * COMMON
 * ------------------------------------------------------------ */

.calendar tr.sectional th,
.dataGrid tr.sectional th {
  background-color: #99B2E5;
	text-transform: uppercase;
	}
	.calendar tr.sectional th span,
	.dataGrid tr.sectional th span {
		padding: 0 10px;
		opacity: .25;
		}

td.new     { color: <?php echo $SYSTEM_BRDR ?>;  }
td.warning { color: <?php echo $WARNING_BRDR ?>; }
td.error   { color: <?php echo $ERROR_BRDR ?>;   }


td.alignLeft   { text-align: left;   }
td.alignCenter { text-align: center; }
td.alignRight  { text-align: right;  }
