<?
include 'header.php';
?>

<style>
.items > li{
	width:14%;
}
</style>
<div id="search">
		<? include 'searchform.php' ?>
</div>

<div id="slider" title="Zoom" class="label-primary"></div>
<span class="example-val" id="slider-range-value" style="display:none;"></span>
<hr>

<ol class="breadcrumb well">
      <li><a href="/">Home</a></li>
      <li class="active"><?php echo ucwords(str_replace("_", " ",$search)); ?></li>
</ol>

<h1><i class="fa fa-shopping-cart"></i> <? echo str_replace("_", " ", ucfirst($search)); ?></h1>


		
<p> <?php echo ucfirst($listType); ?> <span><?php echo ucwords(str_replace("_", " ",$search)); ?> listings <?php echo ucfirst($sort); ?> in <?php echo $country?></span> <img id="loading-image" src="/images/ajax-loader.gif" alt="Loading..." /></p>


<ul class="items list-unstyled clearfix">

<?
$search = urlencode($search);
$configs=array();



	$flag = array
	(
		'USA'				=> 1,
		'Canada'			=> 2,
		'Canada-French'		=> 7,
		'United-Kingdom'	=> 3,
		'Australia'			=> 4,
		'Austria'			=> 16,
		'Belgium-French'	=> 5,
		'France'			=> 10,
		'Germany'			=> 11,
		'Italy'				=> 12,
		'Belgium-Dutch'		=> 5,
		'Netherlands'		=> 16,
		'Spain'				=> 13,
		'Switzerland'		=> 14,
		'Ireland'			=> 2
	);
	
	$flagSort = array
	(
		'BestMatch'	=>	'BestMatch',
		'EndingSoon'	=>	'EndTimeSoonest',
		'NewlyListed'	=>	'StartTimeNewest',
		'LowestPrice'	=>	'PricePlusShippingLowest',
		'HighestPrice'	=>	'PricePlusShippingHighest'
	);

	
$configs[feed]='http://rest.ebay.com/epn/v1/find/item.rss?keyword='.$search.'&sortOrder='.$flagSort[$sort].'&programid='.$flag[$country].'&campaignid='.$campid.'&toolid=10039&listingType1='.$listType.'&lgeo=1&feedType=rss&frpp='.$limit.'';

$configs[template]=$template;
$configs[maxitems]=$limit;
require_once("get.php");

	//if(empty($title) && empty($link)) echo "no results for this search ".ucwords(str_replace("_", " ", $search))." in $country";

?>
<?=easyfeeder($configs)?>
</ul>


<div class="clear"></div>
<hr>

		<h3><i class="fa fa-tag"></i> Browse by category</h3>

		<div id="categories" class="panel panel-default">
			<? include 'includes/categories.php' ?>
		</div>

		<h3><i class="fa fa-lightbulb-o"></i> Browse by popular searches</h3>

		<div id="popular-keywords" class="panel panel-default">
			<? include 'includes/popular-keywords.php' ?>
		</div>






<? include 'footer.php' ?>
<script src="/js/nouislider.min.js"></script>
<script>

var rangeSlider = document.getElementById('slider');

noUiSlider.create(rangeSlider, {
	start: [ 14 ],
	range: {
		'min': [  12 ],
		'max': [ 25 ]
	}
});

var rangeSliderValueElement = document.getElementById('slider-range-value');

rangeSlider.noUiSlider.on('update', function( values, handle ) {
	rangeSliderValueElement.innerHTML = values[handle];	
	$('.items > li').css("width",rangeSliderValueElement.innerHTML+"%");
});

</script>
</body>
</html>