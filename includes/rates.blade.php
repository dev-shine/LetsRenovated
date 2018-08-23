

<!--@@-->
<script language="javascript">
var dispDate;

function clearMe(txtbox)
	{
	txtbox.value="";
	}
function getMyDate()
{
 	var mydate=new Date()

    var day=mydate.getDay()
    var month=mydate.getMonth()
    var daym=mydate.getDate()
    var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday",
                            "Friday","Saturday")
    var montharray=new Array("January","February","March","April","May","June",
                            "July","August","September","October","November","December")
    var daypostfix = new Array(1,21,31,2,22,3,23)
    var daypostfixvalue= new Array("st","st","st","nd","nd","rd","rd")
    var ext="th";

    for (key in daypostfix)
    {
    	if(daypostfix[key]==daym)
    	  {
    	    ext = daypostfixvalue[key];
    	    break;
    	  }
    }
    dispDate=  montharray[month] +" "+ daym+ ext ;
    return dispDate;
}
function changeTab(tabelem)
{
  if(tabelem=='refi')
   {
      document.getElementById("refidiv").className= "tshow";
      document.getElementById("purchasediv").className="thide";
   }
   if(tabelem=='purchase')
   {
       document.getElementById("refidiv").className="thide";
       document.getElementById("purchasediv").className="tshow";
   }
}
</script>
<style>

body {
	margin: 0;
	padding: 0;
}

.thide{
	display: none;
}
.tshow{
	display: block;
}
#refidiv{
width: 245px;
height:250px;
border:5px solid #DBEEF7;
}
#outercntr{
width:243px;
height:248px;
border:1px solid #B1DAEE;
background-color:#EAF5FB
}
#innercntr{
width:243px;
height:45px;
border-bottom:1px solid #B1DAEE
}
#refi_activetab{
width:120px;
height:18px;
float:left;
text-align:center;
font-weight:bold;
font-family:arial;
font-size:11px;
padding-top:3px;
color:#51657D;
cursor:pointer
}
#refi_inactivetab{
width:120px;
height:18px;
float:right;
border:1px solid #B1DAEE;
background-color:#E2E2E2;
text-align:center;
font-weight:bold;
font-family:arial;
font-size:11px;
padding-top:3px;
color:#51657D;
cursor:pointer
}
#datecntr{
float:right;
width:243px;
height:19px;
text-align:center;
padding-top:2px
}
.dateclass{
color:#51657D;
font-family:Arial;
font-size:11pt;
font-weight:bold;
}
#ratediv{
width:243px;
height:120px;
}
#ratetitle{
color:#666666;
float:left;
font-family:arial;
font-size:9pt;
font-weight:bold;
width:243px;
padding-top:6px;
height:20px
}
#prdcntr{
float:left;
height:95px;
padding-top:3px;
width:120px
}
.trstyle{
background-color: #FFFFFF;
}
.trstyle2{
background-color: #EAF5FB;
}
.tdstyle{
color:#003366;
font-family:Arial;
font-size:10pt;
font-weight:bold;
height:29px;
padding-left:5px
}
.anchorstyle{
display: block;
text-decoration: underline;
color:#003366
}
#iframecntr{
float:left;
height:95px;
width:122px;
padding-top:3px
}
#bottomcntr{
float:left;
height:86px;
width:243px
}
#frmcntr{
text-align:center;
width:243px;
color:#666666;
font-family:arial;
font-size:8pt;
font-weight:bold;
padding-top:5px
}
#frmtable{
width:243px;
float:left
}
#ziptxt{
float:left;
padding-left:10px;
padding-top:10px
}
.txtstyle{
width: 100px;
height: 14px;
font-size: 11px;
font-family:verdana;
text-align:center;
font-weight:bold;
background-color: #ECE9D8;
border-top:1px solid #4F4726;
border-left:1px solid #4F4726;
border-bottom:1px solid #ffffff;
border-right:1px solid #ffffff;
}
.buttonform{
font-size: 11px;
font-family:verdana;
text-align:center;
font-weight:bold;
}
#buttondiv{
float:left;
padding-left:12px;
padding-top:8px;
padding-bottom:8px;
}
#backlinkcntr{
padding-top:3px;
float:left;
padding-left:1px;
}
#purchasediv{
width: 245px;
height:250px;
border:5px solid #DBEEF7
}
#purchase_inactive{
width:120px;
height:20px;
float:left;
border:1px solid #B1DAEE;
background-color:#E2E2E2;
text-align:center;
font-weight:bold;
font-family:arial;
font-size:11px;
padding-top:3px;
color:#51657D;
cursor:pointer
}
#purchase_active{
width:120px;
height:20px;
float:right;
text-align:center;
font-weight:bold;
font-family:arial;
font-size:11px;
padding-top:3px;
color:#51657D;
cursor:pointer
}
#backcntr{
float:left;
font-size:8pt;
padding-left:5px;
padding-top:3px;
color:#B9BDBF
}
#bottomlinkcntr{
float:left;
font-size:8pt;
padding-left:5px;
padding-top:3px;
color:#B9BDBF
}
#linkcntr{
float:left;
color:#B9BDB
}
.backanchor{
text-decoration:none;
color:#B9BDBF;
}
#imgcntr{
float:left;
padding-top:2px;
}
#bigsidead {
	background: transparent url(../images/bg_big_side_ad.png) left top no-repeat;
	height: 280px;
	padding: 5px;
	}
</style>

<div id="bigsidead">
<div id="refidiv" class="tshow">
<div id="outercntr">
<div id="innercntr">
<div>
<div id="refi_activetab" onclick="changeTab('refi');">Refinance Rates</div>
<div id="refi_inactivetab" onclick="changeTab('purchase');">Purchase Rates</div>
</div>

<div id="datecntr"><span class="dateclass">Refinance Rates, <script>var d = getMyDate();
document.write(d);</script></span></div>
</div> <!-- topBorder -->

<div id="ratediv">
<div id="ratetitle">
<span >&nbsp;&nbsp;&nbsp;Product:&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Today
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Week </span>
</div>
<div id="prdcntr">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr class="trstyle"><td class="tdstyle"><a class="anchorstyle" href="http://www.letsrenovate.com/finance/financing-rates.html?loanPurpose=REFI&term=1&rpt=1&la=200000&rp=2" target="_parent">30 yr Fixed Rate</a></td></tr>
<tr class="trstyle2"><td class="tdstyle"><a class="anchorstyle" href="http://www.letsrenovate.com/finance/financing-rates.html?loanPurpose=REFI&term=2&rpt=2&la=200000&rp=2" target="_parent">15 yr Fixed Rate</a></td></tr>
<tr class="trstyle"><td class="tdstyle"><a class="anchorstyle" href="http://www.letsrenovate.com/finance/financing-rates.html?loanPurpose=REFI&term=7&rpt=7&la=200000&rp=2" target="_parent">5/1 ARM</a></td></tr>
</table>
</div><!-- left Table  -->
<div id="iframecntr">
<iframe src="http://guidetolenders.com/widget/include/_widget2.jsp?ratetype=REFI" frameborder="0" width="122" height="88" scrolling="no"></iframe>
</div>
</div> <!-- tablecontainer -->
<div id="bottomcntr">
<div id="frmcntr"><span>Compare rates in your area:</span>
<div id="frmtable">
<form name="frm" method="get" action="http://www.letsrenovate.com/finance/financing-rates.html" target="_parent">
<input type="hidden" name="loanPurpose" value="REFI">
<input type="hidden" name="la" value="200000">
<input type="hidden" name="rp" value="2">
<div id="ziptxt"><input type="text" class="txtstyle" value="-- Zip Code --" name="zipcode" onClick="clearMe(this);"></div>
<div id="buttondiv"><input name="Submit" type="Submit" class="buttonform"
			value="View Rates" src="http://guidetolenders.com/widget/images/button.jpg" width="100" height="30" vspace="3" /></div>
</form>
</div><!-- buttonzipcntr -->
<div id="backlinkcntr">
<div id="bottomlinkcntr">
<div id="linkcntr"><a href="http://www.money-rates.com/mortgage.htm" class="backanchor" target="_blank">Refinance rates</a> provided by&nbsp;</div><div id="imgcntr"><img alt="Mortgage Rates" border="0"
			title="Mortgage Rates" src="http://guidetolenders.com/widget/images/MoneyRates_Small.png"/></div>
</div>
</div>
</div><!-- bottom div -->
</div><!-- container -->
</div>
</div><!-- outer -->

<!-- Other Div -->

<div id="purchasediv" class="thide">
<div id="outercntr">
<div id="innercntr">
<div>
<div id="purchase_inactive" onclick="changeTab('refi');">Refinance Rates</div>
<div id="purchase_active" onclick="changeTab('purchase');">Purchase Rates</div>
</div>

<div id="datecntr"><span class="dateclass">Purchase Rates, <script>var d = getMyDate();
document.write(d);</script></span></div>
</div> <!-- topBorder -->

<div id="ratediv">
<div id="ratetitle">
<span >&nbsp;&nbsp;&nbsp;Product:&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Today
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Week </span>
</div>
<div id="prdcntr">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr class="trstyle"><td class="tdstyle"><a class="anchorstyle" href="http://www.letsrenovate.com/finance/financing-rates.html?loanPurpose=PURCHASE&term=1&rpt=1&la=200000&rp=1" target="_parent">30 yr Fixed Rate</a></td></tr>
<tr class="trstyle2"><td class="tdstyle"><a class="anchorstyle" href="http://www.letsrenovate.com/finance/financing-rates.html?loanPurpose=PURCHASE&term=2&rpt=2&la=200000&rp=1" target="_parent">15 yr Fixed Rate</a></td></tr>
<tr class="trstyle"><td class="tdstyle"><a class="anchorstyle" href="http://www.letsrenovate.com/finance/financing-rates.html?loanPurpose=PURCHASE&term=7&rpt=7&la=200000&rp=1" target="_parent">5/1 ARM</a></td></tr>
</table>
</div><!-- left Table  -->
<div id="iframecntr">
<iframe src="http://guidetolenders.com/widget/include/_widget2.jsp?ratetype=PURCHASE" frameborder="0" width="122" height="88" scrolling="no"></iframe>
</div>
</div> <!-- tablecontainer -->
<div id="bottomcntr">
<div id="frmcntr"><span>Compare rates in your area:</span>
<div id="frmtable">
<form name="frm" method="get" action="http://www.letsrenovate.com/finance/financing-rates.html" target="_parent">
<input type="hidden" name="loanPurpose" value="PURCHASE">
<input type="hidden" name="la" value="200000">
<input type="hidden" name="rp" value="1">
<div id="ziptxt"><input type="text" class="txtstyle" value="-- Zip Code --" name="zipcode" onClick="clearMe(this);"></div>
<div id="buttondiv"><input name="Submit" type="Submit" class="buttonform"
			value="View Rates" src="http://guidetolenders.com/widget/images/button.jpg" width="100" height="30" vspace="3" /></div>
</form>
</div><!-- buttonzipcntr -->
<div id="backlinkcntr">
<div id="bottomlinkcntr">
<div id="linkcntr"><a href="http://www.money-rates.com/mortgage.htm" class="backanchor" target="_blank">Refinance rates</a> provided by&nbsp;</div><div id="imgcntr"><img alt="Mortgage Rates" border="0"
			title="Mortgage Rates" src="http://guidetolenders.com/widget/images/MoneyRates_Small.png"/></div>
</div>
</div>
</div><!-- bottom div -->
</div><!-- container -->
</div>
</div><!-- outer -->
</div>