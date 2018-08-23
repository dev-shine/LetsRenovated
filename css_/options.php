<?php

# ------------------------------------------------------------
# PROJECT        :
# FILENAME       : options.php
# ------------------------------------------------------------
# LAST UPDATED   : 21 Mar 2010
#  ------------------------------------------------------------
# AUTHOR(S)      : Kevin Scholl (kevin@ksscholl.com)
# ------------------------------------------------------------
# NOTE(S)        : framework variables
# ------------------------------------------------------------

# define sticky footer
$HAS_STICKY_FOOTER    =  0;  # 0 = false / 1 = true
$HT_STICKY_FOOTER     =  0;  # height of sticky footer, in pixels
$XPAD_STICKY_FOOTER   =  0;  # extra padding for app bar, in pixels

# define default page values
$PAGE_BG              = "#465F78 url(/images/bg_page-bl.png) top center repeat-x";
$PAGE_BG_SAY          = "#465F78 url(/images/bg_page-say.png) top center repeat-x";
$BASE_FONT_FAMILY     = "Verdana, Arial, Helvetica, sans-serif";
$BASE_FONT_SIZE       =  12;
$BASE_FONT_COLOR      = "#444";
$BASE_LINE_HEIGHT     =  19;
$BASE_PRIMARY_LOGO    = "";

# define footer page values
$BASE_FONT_FOOTER     = "Arial, Helvetica, sans-serif";

# define link color scheme
$LINK_LINK            = "#5A8787";
$LINK_VISITED         = "#5A8787";
$LINK_HOVER           = "#8CB9B9";
$LINK_ACTIVE          = "#C93";

# define flex
$IS_FLEX_GRID         =  0;  # 0 = false / 1 = true
$WIN_GUTTER           =  20;
$COL_LEFT_WIDTH       =  320;
$COL_RIGHT_WIDTH      =  250;

# define grids
$GRID_BG              = "transparent";
$GRID_WIDTH           =  142;
$GRID_GUTTER          =  10;

# define columns
$COL_COUNT            =  6;
$COL_BG               = "";
$COL_BG_WH            = "";
$COL_BG_GL            = "transparent url(/images/bg_side_col-gallery.png) top left repeat-y";
$COL_WIDTH            =  $GRID_WIDTH + (2 * $GRID_GUTTER);

# define column group
$GROUP_BRDR_WIDTH		  =  1;
$GROUP_BRDR_COLOR		  = "#CCC";
$GROUP_BG				  = "#FFF";
$GROUP_GUTTER			  =  10;

# ------------------------------------------------------------
# PROJECT SPECIFIC VARIABLES BEGIN HERE
# ------------------------------------------------------------

# define message block color schemes
$ERROR_BRDR           = "#C33";
$ERROR_BG             = "#F7E1E1"; #ERROR_BRDR at 15% over white
$SYSTEM_BRDR          = "#093";
$SYSTEM_BG            = "#D9F0E1"; #SYSTEM_BRDR at 15% over white
$WARNING_BRDR         = "#F93";
$WARNING_TOOL_BRDR    = "#D25400";
$WARNING_BG           = "#FFF0E1"; #WARNING_BRDR at 15% over white

# define masthead
$MSTHD_BRDR_COLOR_TOP = "#000";    #match a primary color of client logo
$MSTHD_BRDR_COLOR_BOT = "#9BADBD";    #match a primary color of client logo
$MSTHD_BG_COLOR       = "#436570";    #same as MSTHD_BRDR_COLOR, or separation color
$MSTHD_COLOR          = "#97A4A3"; #25% white over MSTHD_BG_COLOR
$MSTHD_SPAN_COLOR     = "#FC6"; #75% white over MSTHD_BG_COLOR
$MSTHD_FONT_FAMILY    = "Verdana, Arial, Helvetica, sans-serif";
$MSTHD_FONT_SIZE      =  10;
$MSTHD_LINE_HEIGHT    =  15;

# define data grid
$DGRID_BG             = "#FFF";
$DGRID_ROW_ALT        = "#F5F7FC"; #DGRID_TH_BRDR_COLOR at 5% over white
$DINFO_ROW_ALT        = "#F2F3F4"; #DGRID_TH_BRDR_COLOR at 5% over white
$DGRID_ROW_HOVER      = "#FFF5EA"; #LINK_HOVER color at 10% over white
$DINFO_ROW_HOVER      = "#FFF5EA"; #LINK_HOVER color at 10% over white
$DGRID_TH_BRDR_COLOR  = "#99B2E5"; #DGRID_TH_BRDR_COLOR at 50% transparency over white
$DGRID_TH_BG_COLOR    = "#C1D1F0"; #DGRID_TH_BRDR_COLOR at 30% transparency over white, except silver --> #D6D6D6
$DGRID_TH_BG_COLOR_IE = "#E1E8F7"; #DGRID_TH_BRDR_COLOR at 15% transparency over white
$DINFO_TH_BG_COLOR    = "#D3D8DE"; #DINFO_TH_BRDR_COLOR at 30% transparency over white, except silver --> #D6D6D6
$DINFO_TH_BG_COLOR_IE = "#E1E8F7"; #DINFO_TH_BRDR_COLOR at 15% transparency over white
$DGRID_TH_BG_IMG      = "url(/images/bg_bars.png)";
$DGRID_TH_BG_POS      = "left center";
$DGRID_TD_BRDR_COLOR  = "#E1E8F7"; #DGRID_TH_BRDR_COLOR at 15% over white
$DGRID_REC_CNT_BG     = "#E5F5EA"; #DGRID_TH_BRDR_COLOR at 10% over white
$DGRID_CELL_PAD_VERT  =  5;
$DGRID_CELL_PAD_HOR   =  10;
$DGRID_CELL_HIGHLIGHT = "#FFF0E1"; #highlight color at 15% over white
$DGRID_FONT_COLOR     = "#333";

# tabs and headers
$BG_CURRENT_TAB       = "#5A8787";
$BG_MODULETITLE       = "#DDD";

?>