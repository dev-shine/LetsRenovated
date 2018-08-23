
<!--------- monthly term -------

	var WGdc=".";  
	var WGgc=",";
	var WGnc="-";
	var WGcs="";
function WGformatMoney(A,W) 
{  
// Author   : Jonathan Weesner (http://cyberstation.net/~jweesner/)
// Copyright: Use freely. Keep Author and Copyright lines intact.
	var N=Math.abs(Math.round(A*100));
   var S=((N<10)?"00":((N<100)?"0":""))+N;

   S=WGcs+((A<0)?WGnc:"")+WGgroup(S.substring(0,(S.length-2)))+WGdc+
      S.substring((S.length-2),S.length)+((A<0&&WGnc=="(")?")":"");
   return (S.length>W)?"Over":S;
}

// WGgroup inspired by Bill Dortch's usenet post (www.hidaho.com)
function WGgroup(S) 
{
   return (S.length<4)?S:(WGgroup(S.substring(0,S.length-3))+
      WGgc+S.substring(S.length-3,S.length));
}
	
	function calc1(form) {
	a = form.a.value*1;
	a = a+form.b.value*1;
	a = a+form.c.value*1;
	a = a+form.d.value*1;
	a = a+form.e.value*1;
	a = a+form.f.value*1;
	
	aa = form.aa.value*1;
	aa = aa+form.bb.value*1;
	aa = aa+form.cc.value*1;
	aa = aa+form.dd.value*1;
	aa = aa+form.ee.value*1;
	aa = aa+form.ff.value*1;
		
	form.cost.value = a;
	form.fund.value = aa;
	form.Answer.value = a-aa;
	
	form.cost.value = WGformatMoney(a, 12);
	form.fund.value = WGformatMoney(aa, 12);
	form.Answer.value = WGformatMoney(a-aa, 12);
	}
	//  End -->
