<?php
error_reporting(0);
function time_left($integer)
{

    $seconds=$integer;

    if ($seconds/60 >=1)

    {

    $minutes=floor($seconds/60);

    if ($minutes/60 >= 1)

    { # Hours

    $hours=floor($minutes/60);

    if ($hours/24 >= 1)

    { #days

    $days=floor($hours/24);

    if ($days/7 >=1)

    { #weeks

    $weeks=floor($days/7);

    if ($weeks>=2) $return="$weeks Weeks";

    else $return="$weeks Week";

    } #end of weeks

    $days=$days-(floor($days/7))*7;

    if ($weeks>=1 && $days >=1) $return="$return, ";

    if ($days >=2) $return="$return $days days";

    if ($days ==1) $return="$return $days day";

    } #end of days

    $hours=$hours-(floor($hours/24))*24;

    if ($days>=1 && $hours >=1) $return="$return, ";

    if ($hours >=2) $return="$return $hours hours";

    if ($hours ==1) $return="$return $hours hour";

    } #end of Hours

    $minutes=$minutes-(floor($minutes/60))*60;

    if ($hours>=1 && $minutes >=1) $return="$return, ";

    if ($minutes >=2) $return="$return $minutes minutes";

    if ($minutes ==1) $return="$return $minutes minute";

    } #end of minutes

    $seconds=$integer-(floor($integer/60))*60;

    if ($minutes>=1 && $seconds >=1) $return="$return, ";

    if ($seconds >=2) $return="$return $seconds seconds";

    if ($seconds ==1) $return="$return $seconds second";

    $return="$return";

    return $return;

}

/* Returns a string of the amount of time the integer (in seconds) refers
  to.
  
  $timeleft=time_left(86400);
  
  $timeleft='1 day'.
  
  Will not return anything higher than weeks. False if $integer=0 or fails.
  
  */ 

function cut($start,$end,$word,$testvar=0)
{	
	$word = substr($word,strpos($word,$start)+strlen($start));
	
	$word=substr($word,0,strpos($word,$end));
	if($testvar) die($start." ".$end."<br>".$word);
	return $word;
}

function cut_2($start,$end,$word,$testvar=0)
{	
	
	echo $start;
}

//make resume from description
function resume($text,$limit=7)
{
	$words=@explode(" ",$text);
	
	$words=@array_splice($words,0,$limit);
	
	$retstr=@implode(" ",$words);
	
	return $retstr."... ";
}

function easyfeeder($configs)
{
	//go thru the feeds array
	$content=file_get_contents($configs[feed]);
		
	$items=explode("<item>",$content);
	array_shift($items); //strip the general feed description
	
	$retstr="";
	
	foreach($items as $cnt=>$item)
	{
		if($configs[maxitems]>0 and $cnt+1>$configs[maxitems]) break;
		
		//extract tags
		$title=cut('<title>', '</title>', $item);
		$link=cut('<link>', '</link>', $item);
		$image=cut('<img border="0" ', '/></a>', $item);
		$image=cut("src='", 'jpg', $image);
		$buyitnowprice=cut("<rx:BuyItNowPrice xmlns:rx=\"urn:ebay:apis:eBLBaseComponents\"","/rx:BuyItNowPrice>",$item);
		$buyitnowprice=cut(">","<", $item);
		$currentprice=cut("<e:CurrentPrice>","</e:CurrentPrice>",$item);
		$endtime=cut('<br>End Date:', '<br>', $item);
		$bidcount=cut("<rx:BidCount xmlns:rx=\"urn:ebay:apis:eBLBaseComponents\"","/rx:BidCount>",$item);
		$bidcount=cut(">","<",$bidcount);
		$auctiontype=cut("<rx:AuctionType xmlns:rx=\"urn:ebay:apis:eBLBaseComponents\"","/rx:AuctionType>",$item);
		$auctiontype=cut(">","<",$auctiontype);
		$itemcharacteristic=cut("<rx:ItemCharacteristic xmlns:rx=\"urn:ebay:apis:eBLBaseComponents\"","/rx:ItemCharacteristic>",$item);
		$itemcharacteristic=cut(">","<",$itemcharacteristic);
		$category=cut("<e:ListingType>","</e:ListingType>",$item);

		if(strstr($item,"<![CDATA["))
		{
			$description=cut("<description>","</description>",$item);
			//$description=cut("<![CDATA[","]]",$description);
		}
		else
		{
			$description=cut("<description>","</description>",$item);
		}
       
		//now replace tags
		$tpl=file_get_contents($configs[template]);

		include 'config.php';

		if($new_window == 'yes'){		
		$description = str_replace("a href", "a target=_blank href", $description);
		}
        
        if($_GET['country'] == 0 || !$_GET['country']){
        $symbol = '$';
		}

		 if($_GET['country'] == 2){
        $symbol = '$';
		}

		if($_GET['country'] == 3){
        $symbol = '£';
		}

		if($_GET['country'] == 15){
        $symbol = '$';
		}

		if($_GET['country'] == 16){
        $symbol = '€';
		}

		if($_GET['country'] == 23){
        $symbol = '€';
		}

		if($_GET['country'] == 71){
        $symbol = '€';
		}

		if($_GET['country'] == 77){
        $symbol = '€';
		}

		if($_GET['country'] == 101){
        $symbol = '€';
		}

		if($_GET['country'] == 121){
        $symbol = '€';
		}

		if($_GET['country'] == 146){
        $symbol = '€';
		}

		if($_GET['country'] == 186){
        $symbol = '€';
		}

		if($_GET['country'] == 193){
        $symbol = 'CHF';
		}

		if($_GET['country'] == 196){
        $symbol = 'NT$';
		}

        //$currentprice = substr_replace($currentprice, ".", -2, -2);
		$currentprice = number_format($currentprice, 2);
		$buyitnowprice = substr_replace($buyitnowprice, ".", -2, -2);
		$buyitnowprice = number_format($buyitnowprice, 2);
		$endtime = substr_replace($endtime, 0, -4);

		$timeleft = ($endtime - time());

		$timeleft = time_left($timeleft);

		//$endtime = date("F, d Y g:i A", $endtime);

		//$endtime = $endtime.' PDT';


		if($auctiontype == 'Buy It Now'){
        $buyitnowprice = $symbol.''.$buyitnowprice;
		}

		if($auctiontype == 'Auction'){
        $buyitnowprice = 'None';
		}

		$currentprice = $symbol.''.$currentprice;
		
		$tpl=str_replace("{title}",$title,$tpl);		
		$tpl=str_replace("{link}",$link,$tpl);
		$tpl=str_replace("{image}",$image,$tpl);
		$tpl=str_replace("{description}",$description,$tpl);
		$tpl=str_replace("{buyitnowprice}",$buyitnowprice,$tpl);
		$tpl=str_replace("{currentprice}",$currentprice,$tpl);
		$tpl=str_replace("{endtime}",$endtime,$tpl);
		$tpl=str_replace("{timeleft}",$timeleft,$tpl);
		$tpl=str_replace("{bidcount}",$bidcount,$tpl);
		$tpl=str_replace("{auctiontype}",$auctiontype,$tpl);
		$tpl=str_replace("{itemcharacteristic}",$itemcharacteristic,$tpl);
		$tpl=str_replace("{category}",$category,$tpl);

		$retstr.=$tpl;		
	}
	
	return $retstr;
}

?>