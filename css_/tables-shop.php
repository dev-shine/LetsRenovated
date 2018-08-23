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

<? include "options.php"; ?>

/* ------------------------------------------------------------
 * DATA GRIDS
 * ------------------------------------------------------------ */

.dataGrid {
  margin: 0px 0 10px 0px;
  border-top: 1px solid <?=$DGRID_TH_BRDR_COLOR ?>;
  border-bottom: 1px solid <?=$DGRID_TH_BRDR_COLOR ?>;
	border-spacing: 0;
  background: <?=$DGRID_BG ?>;
  padding: 0;
  width: 100%;
  }
.dataGrid caption {
  margin: 0 0 10px 0;
  padding: 0;
	font: bold 14px/20px <?=$BASE_FONT_FAMILY ?> !important;
	color: <?=$DGRID_TH_BRDR_COLOR ?>;
	text-align: left;
  }

.dataGrid tr.alt {
  background: <?=$DGRID_ROW_ALT ?>;
  }
.dataGrid tr.over,
.dataGrid td.over {
  background: <?=$DGRID_ROW_HOVER ?>;
  }

.dataGrid tr.novwhite,
.dataGrid td.novwhite {
  background: #fff;
  }

.dataGrid tr.novblue,
.dataGrid td.novblue {
  background: #F5F7FC;
  }

.dataGrid tr.novblue2,
.dataGrid td.novblue2 {
  background: #FFF;
  height: 10px;
  padding: 1px;
  }

.dataGrid td.highlight {
  background: <?=$DGRID_CELL_HIGHLIGHT ?> !important;
  }

.dataGrid th,
.dataGrid tfoot td {
  background: <?=$DGRID_TH_BG_COLOR . " " . $DGRID_TH_BG_IMG . " " . $DGRID_TH_BG_POS ?> repeat-x;
  padding: <?=$DGRID_CELL_PAD_VERT - 1 ?>px <?=$DGRID_CELL_PAD_VERT ?>px <?=$DGRID_CELL_PAD_VERT + 1 ?>px;
  padding-left: 9px;
  font: bold 12px/13px Verdana, <?=$BASE_FONT_FAMILY ?>;
  color: #111;
  text-align: left;
  vertical-align: middle;
  }
.dataGrid thead th {
  border: 1px solid <?=$DGRID_TH_BRDR_COLOR ?>;
  }
.dataGrid tfoot th,
.dataGrid tfoot td {
  border: 1px solid <?=$DGRID_TH_BRDR_COLOR ?>;
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
  color: <?=$LINK_HOVER ?>;
  }
.dataGrid th a:active,
.dataGrid tfoot td a:active {
  color: <?=$LINK_ACTIVE ?>;
  }

.dataGrid td {
  border-bottom: 1px solid <?=$DGRID_TD_BRDR_COLOR ?>;
  border-left: 0px solid <?=$DGRID_TD_BRDR_COLOR ?>;
  border-right: 0px solid <?=$DGRID_TD_BRDR_COLOR ?>;
  padding: <?=$DGRID_CELL_PAD_VERT - 1 ?>px <?=$DGRID_CELL_PAD_VERT ?>px;
  font: normal <?=$BASE_FONT_SIZE ?>px/<?=$BASE_LINE_HEIGHT + 1?>px <?=$BASE_FONT_FAMILY ?>;
  color: <?=$DGRID_FONT_COLOR ?>;
  text-align: left;
  vertical-align: top;
  padding-left: 10px;
  }
.dataGrid tr.lastRow td {
  border-bottom: 0;
  padding-bottom: <?=$DGRID_CELL_PAD_VERT ?>px;
  }

p.dataGridRecordCount,
p.fieldsetRecordCount {
	margin: -10px 0 10px;
	border: 1px solid <?=$DGRID_TH_BRDR_COLOR ?>;
	border-top: 0;
	background: <?=$DGRID_REC_CNT_BG ?> url(/images/bg_hash.png);
	padding: 3px 7px;
	font: normal <?=$BASE_FONT_SIZE - 1 ?>px/24px <?=$BASE_FONT_FAMILY ?>;
	color: <?=$BASE_FONT_COLOR ?>;
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
	font-size: <?=$BASE_FONT_SIZE - 1 ?>px;
	vertical-align: baseline;
	}

.dataGrid td a {
	text-decoration: none;
	color: #73879D;
}

.dataGrid td a:hover {
	text-decoration: none;
	color: #A1AFBD;
}

/* ------------------------------------------------------------
 * COLUMN MANAGER (for DATA GRIDS)
 * ------------------------------------------------------------ */

.colManager {
	margin: 0 0 10px 0;
	border: 1px solid <?=$SYSTEM_BRDR ?>;
	border-right: 0;
	border-left: 0;
	background: <?=$SYSTEM_BG ?> url(/images/bg_bars.png) left center repeat-x;
	padding: 4px 10px 5px;
	font: normal 11px/20px <?=$BASE_FONT_FAMILY ?>;
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
 * COMMON
 * ------------------------------------------------------------ */

.calendar tr.sectional th,
.datastepGrid tr.sectional th,
.dataGrid tr.sectional th {
  background-color: #99B2E5;
	text-transform: uppercase;
	}
	.calendar tr.sectional th span,
	.datastepGrid tr.sectional th span,
	.dataGrid tr.sectional th span {
		padding: 0 10px;
		opacity: .25;
		}

td.new     { color: <?=$SYSTEM_BRDR ?>;  }
td.warning { color: <?=$WARNING_BRDR ?>; }
td.error   { color: <?=$ERROR_BRDR ?>;   }


td.alignLeft   { text-align: left;   }
td.alignCenter { text-align: center; }
td.alignRight  { text-align: right;  }
