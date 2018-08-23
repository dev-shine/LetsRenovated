

/* ===================================================== *
 * BOOKMARK
 * ===================================================== */ 


function bookmark(url,title){
  if ((navigator.appName == "Microsoft Internet Explorer") && (parseInt(navigator.appVersion) >= 4)) {
  window.external.AddFavorite(url,title);
  } else if (navigator.appName == "Netscape") {
    window.sidebar.addPanel(title,url,"");
  } else {
    alert("Press CTRL-D (Netscape) or CTRL-T (Opera) to bookmark");
  }
}


/* ===================================================== *
 * BBB
 * ===================================================== */

function Rcertify() 
{
popupWin = window.open('http://www.bbbonline.org/cks.asp?id=103062410364733225', 'Participant','location=yes,scrollbars=yes,width=450,height=300'); 
window.name = 'opener';
}


function goToURL2(theTarget,theURL) {
	var theDestination = "" + theURL;
	eval(theTarget + ".location='" + theDestination + "'");
	}
	
