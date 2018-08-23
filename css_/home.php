<?php Header ("Content-type: text/css"); ?>

/* ------------------------------------------------------------
* PROJECT :
* FILENAME : home.css (as PHP)
* ------------------------------------------------------------
* LAST UPDATED : 14 May 2010
* ------------------------------------------------------------
* AUTHOR(S) : Kevin Scholl (kevin@ksscholl.com)
* ------------------------------------------------------------
* NOTE(S) : Unique styles for home page
* ------------------------------------------------------------ */

<?php include "options.php"; ?>

div.introAd {
   position: relative;
   display: block;
   margin: 0 0 0 0;
   border: 1px solid #fff;
   background: #fff;
   padding: 0 0 0 0;
   width: 627px;
   }
div.introAd p {
   position: absolute;
   left: 0px;
   bottom: 0px;
   margin: 0;
   border: 10px solid #333;
   border-top-width: 8px;
   border-bottom-width: 8px;
   background: #333;
   padding: 5px 10px;
   width: 598px;
   font: bold 10px/16px Verdana,Arial, Helvetica, sans-serif;
   color: #BCBCBC;
   text-align: left;
   z-index: 99;
   -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=85)";
   filter: alpha(opacity=85);
   opacity: 0.85;
   }

div.introAd p a {
   text-decoration: none;
   color: #BCBCBC;
   }

div.introAd p a:hover {
   color: #BCBCBC;
   }


a.introAd {
display: block;
margin: 0 0 0 0;
border: 1px solid #CCC;
background: #F8F8F8;
padding: 0;
width: 627px;
font: normal 30px/248px Georgia, "Times New Roman", Times, serif;
color: #999;
text-align: center;
text-decoration: none;
}

div.introAd img {
display: block;
margin: 0 0 0 0;
padding: 0;
}
.ping {
margin: 0 0 0 10px;
padding: 0;
}
p#introCaption {
float: left;
color: #666;
font: normal 10px/18px Verdana,Arial, Helvetica, sans-serif;
}
p#introCtrl a {
margin: 0 5px;
font-size: 11px;
}
span#introPager a.activeSlide {
font-weight: bold;
color: #666;
text-decoration: none;
}
div.article {
padding: 0 10px;
}
div.article div.pad {
margin: 0;
padding: 0 10px 5px 10px;
}
div.article div.pad h3,
div.article div.pad p,
div.article div.pad ol,
div.article div.pad ul {
background: #FFF;
}
div.callout {
margin: 0 !important;
border: 1px solid #ACC3C3;
background: #E6EDED;
padding: 14px 14px 15px;
}
div#main div.callout h3 {
margin: 0 0 10px 0;
padding: 0;
font: normal 18px/20px Arial, Helvetica, sans-serif;
color: #466078;
}
div#main div.callout h3 span {
float: right;
margin: 0;
padding: 0;
font: bold 11px/20px Arial, Helvetica, sans-serif;
color: #333;
}
div#main div.callout h4 {
margin: 0 0 5px 0;
padding: 0;
font: bold 13px/20px Arial, Helvetica, sans-serif;
color: #333;
text-transform: uppercase;
}



/* ------------------------------------------------------------
* SUPPORT CONTENT
* ------------------------------------------------------------ */


.tip {
font: bold 10px/15px Arial, Helvetica, sans-serif;
color: #C0C0C0;
}

.tip br {
font: bold 10px/9px Arial, Helvetica, sans-serif;
color: #C0C0C0;
}

#summarycontent {
padding: 15px 80px 0px 30px;
}


.tablist {
background: transparent url(/images/bullet_list1.png) left center no-repeat;
}

.taborange {
background: transparent url(/images/bullet_tabor.png) left center no-repeat;
}
.tabpurple {
background: transparent url(/images/bullet_tabpu.png) left center no-repeat;
}
.tabgreen {
background: transparent url(/images/bullet_tabgr.png) left center no-repeat;
}

.boxlist {
background: transparent url(/images/bullet_box.png) left center no-repeat;
}

.classifiedlist {
background: transparent url(/images/bullet_classified.png) left center no-repeat;
}

.classifiedlist2 {
background: transparent url(/images/bullet_classified2.png) left center no-repeat;
}

.homelist {
background: transparent url(/images/bullet_home.png) left center no-repeat;
}

.howtolist {
background: transparent url(/images/bullet_howto.png) left center no-repeat;
}

.howtolistinside {
background: transparent url(/images/bullet_howto2.png) 25px center no-repeat;
}

.howtolistinside3 {
background: transparent url(/images/bullet_howto3.png) 55px center no-repeat;
}

.insidelist {
background: transparent url(/images/bullet_blank.png) left center no-repeat;
padding-left: 40px;
}

.contractorlist {
background: transparent url(/images/bullet_contractor.png) left center no-repeat;
}

.quicklist {
background: transparent url(/images/bullet_quick.png) left center no-repeat;
}

.tipslist {
background: transparent url(/images/bullet_tips.png) left center no-repeat;
}

.idealist {
background: transparent url(/images/bullet_idea.png) 25px center no-repeat;
}

.idealistmain {
background: transparent url(/images/bullet_idea_main.png) left center no-repeat;
}

.shoplist {
background: transparent url(/images/bullet_shop.png) left center no-repeat;
}

.shoplist2 {
background: transparent url(/images/bullet_shop.png) 25px center no-repeat;
}

.shopcenter {
background: transparent url(/images/bullet_shopcenter.png) left center no-repeat;
}

.shopcenterinside {
background: transparent url(/images/bullet_shopcenterin.png) 25px center no-repeat;
}

.shopcenterinside2 {
background: transparent url(/images/bullet_shopcenterin2.png) 55px center no-repeat;
font-size: 11px;
}

.shopcenterinside2 a {
font-size: 11px;
}

.shopcenterinside3 {
background: transparent url(/images/bullet_shopcenterin3.png) 75px center no-repeat;
font-size: 11px;
}

.shopcenterinside3 a {
font-size: 11px;
}

.plans {
background: transparent url(/images/bullet_plans.png) left center no-repeat;
}

.tools {
background: transparent url(/images/bullet_tools.png) left center no-repeat;
}

.searchlist {
background: transparent url(/images/bullet_list2.png) left center no-repeat;
}

.switchlist {
background: transparent url(/images/bullet_switch.png) left center no-repeat;
}

.toollist {
background: transparent url(/images/bullet_tool.png) left center no-repeat;
}

.timelist {
background: transparent url(/images/bullet_time.png) left center no-repeat;
}

.blanklist {
background: transparent url(/images/bullet_blank.png) left center no-repeat;
color: #fff;
height: 5px;
}

.pdflist {
background: transparent url(/images/bullet_listpdf.png) left center no-repeat;
}

.financelist {
background: transparent url(/images/bullet_list3.png) left center no-repeat;
}

.printlist {
background: transparent url(/images/bullet_print.png) left center no-repeat;
}

.wkst {
background: transparent url(/images/bullet_wkst.png) left center no-repeat;
}

.financemoney {
background: transparent url(/images/bullet_finmoney.png) left center no-repeat;
}


.articleblog {
text-decoration: none;
color: #333333;
}

.headerintro {
font: normal 10px/18px Arial, Helvetica, sans-serif;
color: #ccc;
padding: 0px 80px 10px 80px;
text-align: center;
}


/* ------------------------------------------------------------
* MAINABOUT CONTENT
* ------------------------------------------------------------ */


div#mainabout {
background-color: #fff;
min-height: 300px;
margin-top: 40px;
}

.roundedpic{
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}

body .alignpicleft{
float:left;
margin:5px 15px 4px 0px;
padding:3px;
display: block;
border:1px solid #E1E1E1;
}
