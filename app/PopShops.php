<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PopShops  extends Model{

  var $products = array();
  var $type = null;

  public function __construct()
  {         
      $DBs =  \DB::select('SELECT * FROM setting');
      foreach ($DBs as $DB) $this->cj_api_key = str_replace("+","",rawurldecode(urlencode($DB->cj_key)));
  }    

  function PopShops() {

  }

  function initialize($options=array()) {
    $this->api_key = $options['api_key'];
    $this->productLimit = $options['productLimit'];
    $this->keyword = $options['keyword'];
  }

  function convert_multi_array($array) {
    return $out = implode("&",array_map(function($a) {return implode("~",$a);},$array));
  }

  function cj_array_func($cj_s) {
    $api_key = $this->cj_api_key;
		$authorization = "Authorization:".$api_key;
    $cj_s = curl_init($cj_s);
    curl_setopt($cj_s,CURLOPT_HEADER,false);
    curl_setopt($cj_s,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cj_s, CURLOPT_HTTPHEADER, array($authorization));
    $cj_r = curl_exec($cj_s);
    curl_close($cj_s);
    $xml = simplexml_load_string($cj_r);
    $str_xml = $xml;
    // $str_xml = "<html><body><b>Http/1.1 Service Unavailable</b></body> </html>";
    $xml = json_decode(json_encode($xml),TRUE);
    // $str_xml = join(',', $xml);
    if(strpos($str_xml,"Service Unavailable") || $xml==""){
      exit("<html><body><h1 style='text-align: center;'>503 Service Temporarily Unavailable</h1></body> </html>");
    }

    if(isset($xml['error-message'])){
      $this->total_count = 0;
      return array();
    }
    if (isset($xml['products']['product'])){
      $this->total_count = $xml['products']['@attributes']['total-matched'];
      return $xml['products']['product'];
    } else {
      $this->total_count = 0;
      return array();
    }
  }

  function stores($url) {
    $api_key = $this->cj_api_key;
		$authorization = "Authorization:".$api_key;
		$url = curl_init($url);
		curl_setopt($url,CURLOPT_HEADER,false);
		curl_setopt($url,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($url, CURLOPT_HTTPHEADER, array($authorization));
		$cj_r = curl_exec($url);
		curl_close($url);
		$xml = simplexml_load_string($cj_r);
		$xml = json_decode(json_encode($xml),TRUE);
    $this->total_stores = $xml['advertisers']['@attributes']['total-matched'];
    return $xml['advertisers']['advertiser'];
  }

  function findMerchants() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/merchants.xml?";
    $request .= "catalog_key=".$this->catalogKey;
    $this->merchantResults = $this->requestResults($request);
  }

  function findDeals() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/deals.xml?";
    $request .= "catalog_key=".$this->catalogKey;
    $request = $this->addParameter($request, 'deal_limit', $this->dealLimit);
    $request = $this->addParameters($request,$this->params);
    $this->dealResults = $this->requestResults($request);
  }

  function findDealTypes() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/deal_types.xml";
    $this->dealTypeResults = $this->requestResults($request);
  }

  function findMerchantTypes() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/merchant_types.xml";
    $this->merchantTypeResults = $this->requestResults($request);
  }

  function findNetworks() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/networks.xml";
    $this->networkResults = $this->requestResults($request);
  }

  function findProductsOld(){
    $request = "http://www.popshops.com/v2/8z30bzswmwq4it7whuk0cqaiv/products.xml?";
    $request .= "catalog_key=33nlnm9w9un8oc15nvpd8lfch";
    $request = $this->addParameter($request, 'product_limit', $this->productLimit);
    $request = $this->addParameter($request, 'include_product_groups', 1);
    $request = $this->addParameters($request,$this->params);
    $this->productResults = $this->requestResults($request);
  }

  function findProducts($count,$sort_order,$advertiserid) {
    $davis_keys = $categories = $status = $ids = "";
    $cj_categories =  \DB::select('SELECT * FROM catelog');
    $look_category = array();
    foreach ($cj_categories as $value) {
        $look_category[strtolower($value->davis_key)] = $value->category;

        if($value->status == "Joined" || $value->status == "All"){
          $davis_keys .= "+".$value->davis_key."+";
          $categories .= "+".$value->category."+";
        }
        if($value->category == "Home & Garden") {
          if($value->status == "Joined"){
            $status = "joined";
          } else if($value->status == "Not Joined"){
            $status = "notjoined";
          } else {
            $status = "";
          }
        }
    }
    

    if($advertiserid == 0) {
      $ids = $status;
    } else {
      $ids = $advertiserid;
    }

    if(isset($look_category[strtolower($this->keyword)])){
      $sku_category = $look_category[strtolower($this->keyword)];
    } else {
      $sku_category = "";
    }

    $advertiser_sku = $this->get_advertiser($ids,$sku_category);
    if($advertiser_sku != "OK") {
      $advertiser_sku = implode(",",$advertiser_sku);
    } else {
      $advertiser_sku = $ids;
    }
    

    $keyword = $this->keyword;
    $keyword = str_replace(" ","+",$keyword);
		$keyword = str_replace("/","+",$keyword);
		$keyword = str_replace("%","+",$keyword);
    $keyword = '"+'.$keyword.'"';

    if($sort_order == "asc") {
        $cj_s = 'https://product-search.api.cj.com/v2/product-search?website-id=1516809&keywords='.$keyword.'&records-per-page='.$this->productLimit.'&page-number='.$count.'&sort-order=asc&sort-by=price&low-price=1&advertiser-ids='.$advertiser_sku;
    } else if($sort_order == "desc") {
        $cj_s = 'https://product-search.api.cj.com/v2/product-search?website-id=1516809&keywords='.$keyword.'&records-per-page='.$this->productLimit.'&page-number='.$count.'&sort-order=desc&sort-by=price&advertiser-ids='.$advertiser_sku;
    } else {
        $cj_s = 'https://product-search.api.cj.com/v2/product-search?website-id=1516809&keywords='.$keyword.'&records-per-page='.$this->productLimit.'&page-number='.$count.'&advertiser-ids='.$advertiser_sku;
    }
    $this->productResults = $this->cj_array_func($cj_s);

    $advertiser_url = "https://advertiser-lookup.api.cj.com/v3/advertiser-lookup?advertiser-ids=joined&records-per-page=100";
    $this->advertiser = $this->stores($advertiser_url);

    $this->ids = $ids;
  }

  public function get_advertiser($ids,$sku_category) {
    $sku_category = rawurlencode($sku_category);
		$url = "https://advertiser-lookup.api.cj.com/v3/advertiser-lookup?advertiser-ids=".$ids."&records-per-page=100&keywords=".$sku_category;
    $api_key = $this->cj_api_key;
		$authorization = "Authorization:".$api_key;
		$url = curl_init($url);
		curl_setopt($url,CURLOPT_HEADER,false);
		curl_setopt($url,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($url, CURLOPT_HTTPHEADER, array($authorization));
		$cj_r = curl_exec($url);
		curl_close($url);
		$xml = simplexml_load_string($cj_r);
    $xml = json_decode(json_encode($xml),TRUE);
    if(sizeof($xml)<2){
      return "OK";
    }
    $xml = $xml["advertisers"]["advertiser"];   
    
		$result = array();
		foreach ($xml as $value) {
      if(isset($value['advertiser-id'])){
        array_push($result,$value['advertiser-id']);
      }
		}
		return $result;
	}

   function findDiscountProducts($minOffPercent = null,$maxOffPercent = null){
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/products.xml?";
    $request .= "catalog_key=".$this->catalogKey;
    $request = $this->addParameter($request, 'results_per_page', $this->productLimit);
  	$request = $this->addParameter($request, 'include_percent_off_ranges', 1);
  	if($minOffPercent )
  		$request = $this->addParameter($request, 'percent_off_min', $minOffPercent);

  	if($maxOffPercent )
  		$request = $this->addParameter($request, 'percent_off_max', $maxOffPercent );

    $request = $this->addParameters($request,$this->params);
    $this->productResults = $this->requestResults($request);
  }

  function get_merchant($product)
  {
    foreach($this->productResults->merchants->merchant as $_merchant)
    {
      if($_merchant->id == $product->price_min_merchant)
      {
        return $_merchant;
      }
    }

    return null;
  }

  function offerStoreName($product){
    $out = '';
    $merchant = null;
    foreach($this->productResults->merchants->merchant as $_merchant)
    {
      if($_merchant->id == $product->merchant)
      {
        $merchant = $_merchant;
        break;
      }
    }
    //$storeName = $this->merchantNameFor($product);
    if ($merchant) {
      $out .= '<a href="'.$merchant->url .'" rel="nofollow" target="_blank">'.$merchant->name.'</a>';
    }
    return $out;
  }

  function productStoreName($product){
    $out = '';
    $merchant = $this->get_merchant($product);
    //$storeName = $this->merchantNameFor($product);
    if ($merchant) {
      $out .= '<a href="'.$merchant->url .'" rel="nofollow" target="_blank">'.$merchant->name.'</a>';
    }
    return $out;
  }

  function productPrice($product) {

    if (isset($product->price_retail) && (intval($product->price_merchant) > 0) && (floatval($product->price_merchant) != floatval($product->price_merchant))) {
      echo number_format(floatval($product->price_retail),2);
      echo number_format(floatval($product->price_merchant),2);
    } else {

      $price = ($product->price_min)?$product->price_min:$product->price_merchant;
      echo number_format(floatval($price),2);
    }
  }

  function renderProduct($product) {

    $url = ($this->type == 'offer')?$product['url']:$product['offers']->offer[0]->url;
    //$this->localRedirectURL()
    $out = '';
    dd($product);
    $out .= '<div class="psps-img"><a href="'.$url.'" rel="nofollow" target="_blank"><img src="'.$product['image_url_large'].'" /></a></div>';
    if($product['offer_count'] > 1)
	  $out .= $this->productCompareButton($product);
	else
		$out .= $this->productPrice($product);
    $out .= '<p class="psps-text psps-name"><a href="'.$url.'" rel="nofollow" target="_blank">'.$product['name'].'</a></p>';
    $out .= '<p class="psps-text psps-description">'.substr($product['description'],0,150) .'...</p>';
    $out .= $this->productStoreName($product);
    return $out;
  }

    function renderDiscountedProduct($product) {
    $out = '';
    dd($product);
    $out .= '<div class="psps-img"><a href="'.$this->localRedirectURL($product['url']).'" rel="nofollow" target="_blank"><img src="'.$product['image_url_large'].'" /></a></div>';
	$percentOff = null;
	$actualPrice  =  $product['retail_price'];
	$sellingPrice =  $product['merchant_price'];
	if(isset($actualPrice) && isset($sellingPrice ))
	{
		$percentOff = round(($actualPrice - $sellingPrice) * (100  / $actualPrice),2);
		$out .= '<div class="psps-discount"><div>'.$percentOff .'%</div></div>';
	}
	$out .= $this->productPrice($product);
    $out .= '<p class="psps-text psps-name"><a href="'.$this->localRedirectURL($product['url']).'" rel="nofollow" target="_blank">'.$product['name'].'</a></p>';
    $out .= '<p class="psps-text psps-description">'.substr($product['description'],0,150) .'...</p>';
    $out .= $this->productStoreName($product);
    return $out;
  }

   function productCompareButton($product)
  {
		$out = '<div class="psps-text psps-price">
						 <div class="psps-store-price">$'.$product->price_min.' - $'.$product->price_max.'</div>
						 <div class="ps-button" style="text-align: center;">
							 <a class="url"  href="comparison-kitchen.php?group_id='.$product->id.'">
								<img alt="Compare" class="compare-button" src="/shopping/images/btn.compare.png">
							</a>
						 </div>
						 <div class="psps-store-price">'.$product->offer_count.' found</div>
					</div>';

		return 	$out ;

  }

  function renderProductGrid($discounted = false) {
    $out = '<table style="float:left;">';

    $count = 0;
    $rowCount = 1;
    $cols = $this->productGridColumns;

    $products = null;
    $size = null;

    if($this->type == 'offer')
    {
      $products = $this->productResults->offers->offer;
    }
    else
    {
      $products = $this->productResults->products['product'];
    }

    $size = sizeof($products);

    foreach($products as $_product) {

      $product = (array)$_product;

      if ($count%$cols == 0) { $rowCount++; }

      if (($count == 0) || ($count%$cols == 0)) { $out .= '<tr>'; }

      $out .= '<td class="psps-cell">';
  	  if($discounted )
  	  $out .= $this->renderDiscountedProduct($product);
  	  else
        $out .= $this->renderProduct($product);
        $out .= '</td>';

      // This will add any additional cells in the last row that might be missing.
      /*if ( $size == $count+1 && $size%$cols != 0 ) {
        $i = 0;
        while ( $i < ( $cols - $size%$cols) ) {
          $out .= '<td> </td>';
          $i++;
        }
      }*/

      $count++;
      if (($count%$cols == 0) || ($count == $size)) {
        $out .= '</tr>';
      }
    }

    $out .= '</table>';
    return $out;
  }

  function renderCustomCategories(){
    $out = '';
    if (sizeOf($this->categories) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-category sidebarOpt">Categories</h3>';
	         $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach ($this->categories as $category) {
        $out .= '<li class="psps-filter-bullet">'.$this->customCategoryLink($category).'</li>';
      }
      $out .= '</ul>';
	  $out .= '</div>';
    }
    return $out;
  }

  function renderCustomCategories2(){
      $out = '';
      if (sizeOf($this->categories) > 0) {
      			# $out .= '<h3>Categories</h3>';
      			# $out .= '<li><a href="#" class="">Categories</a>';
				# $out .= '<ul>';
				foreach ($this->categories as $key => $category) {
					if ($key == 0) {
						$out .= '<li>';
						$out .= $this->customCategoryLink($category);
						$out .= '<ul>';
						}
					elseif ($category['class'] == "category") {
						$out .= '<li class="category">';
						$out .= $this->customCategoryLink($category);
						$out .= '</li>';
						}
					elseif ($category['class'] == "cat-item") {
						$out .= '<li class="cat-item">';
						$out .= $this->customCategoryLink($category);
						$out .= '</li>';
						}
					else {
						$out .= '<li>';
						$out .= $this->customCategoryLink($category);
						$out .= '</li>';
						}
					}
				$out .= '</ul>';
				$out .= '</li>';
				}
      return $out;
  }

# $category['class']

	###Select
    function renderCustomCategoriesDropDown(){
    $out = '';
    if (sizeOf($this->categories) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-category sidebarOpt">Categories</h3>';
      $out .= '<select id="merchant-type-id" class="text" onchange="this.form.submit();" name="merchant_type_id">';
      $out .= '<option value="">All categories</option>';
      foreach ($this->categories as $category) {
        $out .= '<option class="psps-filter-bullet">'.$this->customCategoryLink($category).'</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }

  function merchantNameFor($object) {

    if (isset($this->merchantResults)) {
      $merchants = $this->merchantResults;
    } else {
      $merchants = isset($this->productResults) ? $this->productResults->merchants : $this->dealResults->merchants;
    }

    foreach($merchants->merchant as $merchant) {
      if ($merchant->id == $object['merchant_id']) {
        return $merchant['name'];
      }
    }
    return '';
  }

  function merchantLogoFor($object) {
    if (isset($this->merchantResults)) {
      $merchants = $this->merchantResults;
    } else {
      $merchants = isset($this->productResults) ? $this->productResults->merchants : $this->dealResults->merchants;
    }

    foreach($merchants->merchant as $merchant) {
      if (intval($merchant['id']) == intval($object['merchant_id'])) {
        return $merchant['logo_url'];
      }
    }
    return '';
  }

  function localRedirectURL($destination) {

    if ( $this->localRedirects == true ) {
      $url = $this->baseURL($this->params);
      $url = str_replace('?&','?',$url);
      $delimiter = (strpos($url,'?') > -1) ? '&' : '?';
      return $url.$delimiter.$this->nameSpace.'destination='.str_replace('http://','',$destination);
    } else {
      return $destination;
    }
  }

  function renderDealRows(){
    $out =
	'<style>
	ul.dealList  {  width: 100%;  margin-left: 33px;  margin-bottom: 30px;}
	ul.dealList li{ float:left;width:50% }
	</style>';
    if (sizeOf($this->dealResults->deals->deal) > 0) {
      $out .= '<ul  class="dealList">';
      foreach($this->dealResults->deals->deal as $deal) {
        $out .= '<li  class="psps-filter-bullet-deal"><div class="psps-deal">';
        $out .= '<div class="psps-deal-logo"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow"><img src="'.$this->merchantLogoFor($deal).'" alt="'.$this->merchantNameFor($deal).'"/></a></div>';
        $out .= '<div class="psps-deal-name"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow">'.$deal['name'].'</a></div>';
        $out .= '<div class="psps-deal-meta">';
        $out .= '<span class="psps-deal-expiration">Expires: '.$deal['end_on'].'</span>';
        if (isset($deal['code'])) {
          $out .= '<span class="psps-deal-code">Code: '.$deal['code'].'</span>';
        }

        $out .= '</div>';
        $out .= '</div></li>';
      }
      $out .= '</ul>';
    }
    return $out;
  }

  function renderDealRows2(){
    $out =
	'<style>
	ul.dealList  {  width: 90%;  margin-left: 33px;  margin-bottom: 30px;}
	ul.dealList li{ float:left;width:50% }
	</style>';
    if (sizeOf($this->dealResults->deals->deal) > 0) {
      $out .= '<ul  class="dealList">';
      foreach($this->dealResults->deals->deal as $deal) {
        $out .= '<li  class="psps-filter-bullet-deal"><div class="psps-deal">';
        $out .= '<div class="psps-deal-logo"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow" target="_parent"><img src="'.$this->merchantLogoFor($deal).'" alt="'.$this->merchantNameFor($deal).'"/></a></div>';
        $out .= '<div class="psps-deal-name"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow" target="_parent">'.$deal['name'].'</a></div>';
        $out .= '<div class="psps-deal-meta">';
        $out .= '<span class="psps-deal-expiration">Expires: '.$deal['end_on'].'</span>';
        if (isset($deal['code'])) {
          $out .= '<span class="psps-deal-code">Code: '.$deal['code'].'</span>';
        }

        $out .= '</div>';
        $out .= '</div></li>';
      }
      $out .= '</ul>';
    }
    return $out;
  }

  function renderCoupons(){
    $out = '';
    if (sizeOf($this->productResults->Coupons->deal) > 0) {
      $out .= '<h3>Coupons</h3>';
      $out .= '<div class="psp-coupons">';
      $out .= '<ul>';
      foreach($this->productResults->Coupons->deal as $deal) {
        $out .= '<li><div class="hcoupon">';
        $out .= '<div class="psps-name"><a target="_parent" href="'.$deal->url.'" rel="nofollow">'.$deal->name.'</a></div>';
        $out .= '</div></li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderDeals(){
    $out = '';
    if (sizeOf($this->productResults->deals->deal) > 0) {
      $out .= '<h3>Deals</h3>';
      $out .= '<div class="psps-filter-options psps-tall">';
      $out .= '<ul>';
      foreach($this->productResults->deals->deal as $deal) {
        $deal = (array)$deal;
        $out .= '<li><div class="psps-deal">';
        $out .= '<div class="psps-merchant"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow">'.$this->merchantNameFor($deal).'</a></div>';
        $out .= '<div class="psps-name">'.$deal['name'].'</div>';
        $out .= '</div></li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderDealMerchantTypeFilter(){
    return $this->renderMerchantTypeFilter($this->dealResults);
  }

  function renderDealMerchantTypeSelect(){
    return $this->renderMerchantTypeSelect($this->dealResults);
  }

  function renderDealMerchantFilter(){
    return $this->renderMerchantFilter($this->dealResults);
  }

  function renderDealMerchantSelect(){
    return $this->renderMerchantSelect($this->dealResults);
  }


  function renderDealTypeFilter(){
    $out = '';
    if (sizeOf($this->dealResults->deal_types) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-category sidebarOpt">Types of Deals</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($this->dealResults->deal_types->deal_type as $dealType) {
        $out .= '<li class="psps-filter-bullet">';
        $out .= '<span class="psps-label">'.$this->dealTypeLink($dealType).'</span>';
        $out .= ' <span class="psps-count">('.number_format(floatval($dealType['deal_count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  ###Select
  function renderDealTypeSelect(){
    $out = '';
    if (sizeOf($this->dealResults->deal_types) > 0) {
      $out .= '<h3>Types of deals</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('deal_type_id')).'">All</option>';
      foreach($this->dealResults->deal_types->deal_type as $dealType) {
        $param = isset($_REQUEST[$this->nameSpace.'deal_type_id']) ? $_REQUEST[$this->nameSpace.'deal_type_id'] : 0;
        $selected = (intval($dealType['id']) == intval($param)) ? ' selected="selected"' : '';
        $out .= '<option value="'.$this->dealTypeUrl($dealType).'"'.$selected.'>';
        $out .= $dealType['name'].' ('.number_format(floatval($dealType['deal_count'])).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }

    return $out;
  }

  function dealTypeLink($dealType) {
    return '<a href="'.$this->dealTypeUrl($dealType).'">'.$dealType['name'].'</a>';
  }

  function dealTypeUrl($dealType) {
    $url = $this->baseURL(array('deal_type_id','deal_offset'));
    $url = $this->addParameter($url,'deal_type_id',$dealType['id']);

    if (isset($_REQUEST[$this->nameSpace.'merchant_type_id'])) {
      $url = $this->addParameter($url,'merchant_type_id',$_REQUEST[$this->nameSpace.'merchant_type_id']);
    }

    $url = str_replace('?&','?',$url);
    return $url;
  }

  function renderCategoryFilter(){
    if (isset($_REQUEST[$this->nameSpace.'category_id'])) {
      $this->renderMerchantCategoryFilter();
    } else {
      $this->renderMerchantTypeFilter($this->productResults);
    }
  }

  function renderMerchantCategoryFilter(){
    $out = '';
    if (sizeOf($this->productResults->categories->category) > 0) {
      $out .= '<h3>Categories</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($this->productResults->categories->category as $category) {
        $out .= '<li class="psps-filter-bullet">';
        $out .= '<span class="psps-label">'.$this->categoryLink($category).'</span>';
        $out .= ' <span class="psps-count">('.number_format(floatval($category['product_count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderMerchantTypeFilter($results){
    $out = '';
    if (sizeOf($results->merchant_types->merchant_type) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-brand sidebarOpt">Categories</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($results->merchant_types->merchant_type as $merchant_type) {
        $out .= '<li class="psps-filter-bullet">';
        $out .= '<span class="psps-label">'.$this->merchantTypeLink($merchant_type).'</span>';
        $count = isset($merchant_type['deal_count']) ? $merchant_type['deal_count'] : $merchant_type['product_count'];
        $out .= ' <span class="psps-count">('.number_format(intval($count)).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  ###Select
  function renderMerchantTypeSelect($results){
    $out = '';
    if (sizeOf($results->merchant_types->merchant_type) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-brand-discount">Categories</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('merchant_type_id')).'">All</option>';
      foreach($results->merchant_types->merchant_type as $merchant_type) {
        $param = isset($_REQUEST[$this->nameSpace.'merchant_type_id']) ? $_REQUEST[$this->nameSpace.'merchant_type_id'] : 0;
        $selected = (intval($merchant_type['id']) == intval($param)) ? ' selected="selected"' : '';

        $out .= '<option value="'.$this->merchantTypeUrl($merchant_type).'"'.$selected.'>';
        $out .= $merchant_type['name'];
        $count = isset($merchant_type['deal_count']) ? $merchant_type['deal_count'] : $merchant_type['product_count'];
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }



  function renderMerchantFilter($results){
    $out = '';

    if (sizeOf($this->productResults->merchants->merchant) > 0) {

      $out .= '<h3 class="psps-h3-bkgd-store sidebarOpt">Stores</h3>';
      $out .= '<div id="merchant-filter" class="psps-filter-options">';
      $out .= '<ul>';

      foreach($this->productResults->merchants->merchant as $_merchant) {
        $merchant = (array)$_merchant;
        $out .= '<li class="psps-filter-bullet">';
        $out .= '<span class="psps-label">'.$this->merchantLink_simple($merchant).'</span>';
        $count = isset($merchant['count']) ?  : $merchant['product_count'];
        $out .= ' <span class="psps-count">('.number_format(intval($count)).')</span>';
        $out .= '</li>';
      }

      if (sizeOf($this->merchants->merchant) > 10)
        $out .= '<li><a href="#merchant-filter" class="more-trigger"><span class="filter-forward">&#8250;&nbsp;</span>See more&hellip;</a></li>';

      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  ###Select
  function renderMerchantSelect($results){

    $out = '';
    if (sizeOf($results->merchants->merchant) > 0) {
      $out .= '<h3  class="psps-h3-bkgd-store-discount">Stores</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value">';
      $out .= '<option value="'.$this->baseURL(array('merchant')).'">All</option>';
      foreach($results->merchants->merchant as $merchant) {
        $param = isset($_REQUEST[$this->nameSpace.'merchant']) ? $_REQUEST[$this->nameSpace.'merchant'] : 0;
        $selected = (intval($merchant['id']) == intval($param)) ? ' selected="selected"' : '';
        $out .= '<option value="'.$this->merchantUrl($merchant).'"'.$selected.'>';
        $out .= $merchant['name'];
        $count = isset($merchant['deal_count']) ? $merchant['deal_count'] : $merchant['product_count'];
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;

  }


   function renderBrandFilter(){
    //majin
    $out = '';
    if (sizeOf($this->productResults->brands->brand) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-brand sidebarOpt">Brands</h3>';
      $out .= '<div class="psps-filter-options-brand">';
      $out .= '<ul>';
      foreach($this->productResults->brands->brand as $_brand) {
        $brand = (array)$_brand;
        $out .= '<li class="psps-filter-bullet">';
        $out .= '<span class="psps-label">'.$this->brandLink_Simple($brand).'</span>';
        $out .= ' <span class="psps-count">('.number_format(intval($brand['count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }



  function renderBrandFilter2(){

    $out = '';

    $url = $this->baseURL(array('brand'));

    $brands = array();

    //no search
    if(!$this->productResults->products['total_count']) {

      return '';
    }

    if (isset($_REQUEST[$this->nameSpace.'brand'])) {
      $brands = $_REQUEST[$this->nameSpace.'brand'];
      $brands = explode(',',$brands);
    }

    if (sizeOf($this->productResults->brands->brand) > 0) {
      $out .= '<div id="brand-filter"><ul class="brand-filter less">';

      $index = 0;
      $html = '';$found = false;

      foreach($this->productResults->brands->brand as $_brand) {
        $index++;
        $brand =  (array) $_brand;

        $brand_id = intval($brand['id']);
        $checked = (in_array($brand_id, $brands))?true:false;
        $html .= '<li '.($checked?' class="active" ':'').'>';
        $html .= '<input type="checkbox" '.($checked?' checked ':'').' value="'.$brand_id.'" name="brand" class="form-checkbox">';
        $html .= '<span class="count">('.number_format(intval($brand['count'])).')</span> ';
        $html .= $this->brandLink($url,$brand,$brands,$checked);
        $html .= '</li>';

        if($index == 10)
          $html .= '<li><a href="#brand-filter" class="more-trigger"><span class="filter-forward">&#8250;&nbsp;</span>See more&hellip;</a></li></ul><ul class="brand-filter more" style="border:medium none">';
      }

      //add the $html
        if($brands)
          $out .= '<li><a href="'.$this->baseURL(array('brand')).'">« All Brands</a></li>';

        $out .= $html;

      if($index >= 10)
        $out .= '<li><a href="#brand-filter" class="more-trigger" title="Less"><span class="filter-back">&#8249;&nbsp;</span>See less&hellip;</a></li>';
      $out .= '</ul></div>';
    }
    return $out;
  }

  function percentOffLink($percent_off) {
    $off    = $percent_off->min.'-'.$percent_off->max;
    $off_p  = $percent_off->min.'% - '.$percent_off->max.'%';
    return '<a href="'.$this->percentOffURL($off).'" title="See '.$off_p.' discount">'.$off_p.'</a>';
  }

  function percentOffURL($off){
    $url = $this->baseURL(array('percent_off'));
    $url = $this->addParameter($url,'percent_off',$off);
    return $url;
  }

  function renderPercentOffFilter2(){

    $out = '';

    $url = $this->baseURL(array('percent_off'));

    $percent_off = '';

    //no search
    if(!$this->productResults->products['total_count']) {

      return '';
    }

    if (isset($_REQUEST[$this->nameSpace.'percent_off'])) {
      $percent_off = $_REQUEST[$this->nameSpace.'percent_off'];
    }



    if (sizeOf($this->productResults->percent_off->value) > 0) {
      $out .= '<div id="discount-filter"><ul class="discount-filter less">';

      $index = 0;
      $html = '';$found = false;
      foreach($this->productResults->percent_off->value as $_off) {
        $index++;
        $checked = ($percent_off == ($_off->min.'-'.$_off->max))?true:false;
        if($checked)$found = true;
        $html .= '<li '.($checked?' class="active" ':'').'>';
        $html .= $this->percentOffLink($_off);
        $html .= '<span class="count">('.number_format($_off->count).')</span> ';
        $html .= '</li>';

        if($index == 10)
          $html .= '<li><a href="#discount-filter" class="more-trigger"><span class="filter-forward">&#8250;&nbsp;</span>See more&hellip;</a></li></ul><ul class="discount-filter more" style="border:medium none">';
      }

      //add the $html
      if($found)
        $out .= '<li><a href="'.$this->baseURL(array('percent_off')).'">« Show All</a></li>';

      $out .= $html;

      if($index >= 10)
        $out .= '<li><a href="#discount-filter" class="more-trigger" title="Less"><span class="filter-back">&#8249;&nbsp;</span>See less&hellip;</a></li>';
      $out .= '</ul></div>';
    }
    return $out;
  }

  function renderMerchantFilter2($results){


    $url = $this->baseURL(array('merchant'));

    $merchants = array();

    if (isset($_REQUEST[$this->nameSpace.'merchant'])) {
      $merchants = $_REQUEST[$this->nameSpace.'merchant'];
      $merchants = explode(',',$merchants);
    }

    //no search
    if(!$this->productResults->products['total_count']) {

      return '';
    }

    $out = '';
    if (sizeOf($results->merchants->merchant) > 0) {
      $out .= '<div id="merchant-filter" ><ul class="merchant-filter less">';
      $index = 0;
      $html = '';$found = false;
      foreach($results->merchants->merchant as $_merchant) {
        $index++;
        $merchant =  (array) $_merchant;
        $merchant_id = intval($merchant['id']);
        $checked = (in_array($merchant_id, $merchants))?true:false;
        $count = $merchant['count'];
        $html .= '<li '.($checked?' class="active" ':'').'>';
        $html .= '<input type="checkbox" '.($checked?' checked ':'').' value="'.$merchant_id.'"  class="form-checkbox">';
        $html .= $this->merchantLink($url,$merchant,$merchants,$checked);
        $html .= '<span class="count">('.number_format(intval($count)).')</span> ';
        $html .= '</li>';

        if ($index == 10)
          $html .= '<li><a href="#merchant-filter" class="more-trigger"><span class="filter-forward">&#8250;&nbsp;</span>See more&hellip;</a></li></ul><ul class="merchant-filter more" style="border:medium none">';
      }


      //add the $html
      if($merchants)
        $out .= '<li><a href="'.$this->baseURL(array('merchant')).'">« All Stores</a></li>';

      $out .= $html;

      if($index >= 10)
        $out .= '<li><a href="#merchant-filter" class="more-trigger" title="Less"><span class="filter-back">&#8249;&nbsp;</span>See less&hellip;</a></li>';
      $out .= '</ul></div>';
    }

    return $out;
  }

  function brandLink($url,$brand,$brands,$checked) {
    return '<a href="'.$this->NewbrandUrl($url,$brand,$brands,$checked).'" title="See '.$brand['name'].' products">'.$brand['name'].'</a>';
  }

  function brandLink_Simple($brand) {
    return '<a href="'.$this->brandUrl($brand).'" title="See '.$brand['name'].' products">'.$brand['name'].'</a>';
  }


  function brandUrl($brand) {
   //$url = $this->baseURL(array('merchant_type_id','brand_id','price_max','price_min','product_offset','category_id'));
    $url = $this->baseURL();
    $url = $this->addParameter($url,'brand',$brand['id']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function NewbrandUrl($url,$brand,$brands,$checked) {

    if($checked)
    {
      unset($brands[array_search($brand['id'],$brands)]);
    }
    else
      $brands[] = $brand['id'];

    $brands   = array_unique($brands);

    $url = $this->addParameter($url,'brand',implode(',', $brands),true);
    $url = str_replace('?&','?',$url);
    return $url;
  }

	###Select
    function renderBrandFilterSelect($results){

    $out = '';

    if (sizeOf($this->productResults->brands->brand) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-brand-discount">Brands</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('brand_id')).'">All</option>';
      foreach($this->productResults->brands->brand as $brand) {
        $param = isset($_REQUEST[$this->nameSpace.'brand_id']) ? $_REQUEST[$this->nameSpace.'brand_id'] : 0;
        $selected = (intval($brand['id']) == intval($param)) ? ' selected="selected"' : '';

        $out .= '<option value="'.$this->brandUrl($brand).'"'.$selected.'>';
        $out .= $brand['name'];
        $count = isset($brand['product_count']) ? $brand['product_count'] : 0;
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }

  function clearButton(){

	$link = $this->baseURL($this->params);
	$link = substr($link,0,-1);
	$found = false;
	foreach($this->params as $param){

		if(array_key_exists($this->nameSpace.$param,$_GET))
		{
			$found = true;
		}
	}
	if($found)
	$out = '<div style="clear: both; float: right; margin-right: 30px;"><a href="'.$link .'"><img src="/shopping/images/clear_button.png" alt="clear button" /></a></div><br/>';
	else
		$out = '';

	return $out;
  }

    function renderPriceRangeFilter() {
      $out = '';

      if (sizeOf($this->productResults->price_ranges->price_range) > 0) {
        $out .= '<h3 class="psps-h3-bkgd-price sidebarOpt">Price Range</h3>';
        $out .= '<div class="psps-filter-options">';
        $out .= '<ul >';

        foreach($this->productResults->price_ranges->price_range as $price_range) {

          $out .= '<li class="psps-filter-bullet">';
          $out .= '<span class="psps-label">'.$this->priceLink(array('price_min' => $price_range['min'], 'price_max' => $price_range['max'])).'</span>';
          $out .= ' <span class="psps-count">('.number_format(intval($price_range['product_count'])).')</span>';
          $out .= '</li>';


        }
        $out .= '</ul></div>';
        $out .= '</div>';
      }
      return $out;
  }


  ###Select
  function renderOffPercentSelect(){

	$out = '';

    if (sizeOf($this->productResults->percent_off_ranges->percent_off_range) > 0) {

      $out .= '<h3 class="psps-h3-bkgd-brand-discount">Discount% Off</h3>';
	  //echo '<pre>';print_r($this->productResults->price_ranges->price_range);echo '</pre>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('percent_off_max','percent_off_min')).'">All</option>';

      foreach($this->productResults->percent_off_ranges->percent_off_range as $percent_range) {

        $selected =  '';
		$label =  $percent_range['min'].'% - '.$percent_range['max'].'%';
		if(isset($_REQUEST[$this->nameSpace.'percent_off_max']) &&  isset($_REQUEST[$this->nameSpace.'percent_off_min']) )
		{
			if($_REQUEST[$this->nameSpace.'percent_off_min'] == $percent_range['min'] && $_REQUEST[$this->nameSpace.'percent_off_max'] == $percent_range['max'])
			 $selected  = ' selected="selected" ';
		}
        $out .= '<option value="'.$this->discountURL($percent_range).'"'.$selected.'>';
		$out .= $label;
        $count = isset($percent_range['product_count']) ? $percent_range['product_count'] : 0;
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;  }


  ###Select
  function renderPriceRangeSelect(){
    $out = '';

    if (sizeOf($this->productResults->price_ranges->price_range) > 0) {
      $out .= '<h3 class="psps-h3-bkgd-brand-discount">Price Range</h3>';
	  //echo '<pre>';print_r($this->productResults->price_ranges->price_range);echo '</pre>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('price_min','price_max')).'">All</option>';

      foreach($this->productResults->price_ranges->price_range as $price_range) {

		$price = array('price_min'=>$price_range['min'],'price_max'=>$price_range['max'],'product_count'=>$price_range['product_count']);
        $selected =  '';
		$label = (intval($price['price_min']) == 0) ? "Under $".$price['price_max'] : '$'.$price['price_min'].'-$'.$price['price_max'];
		if(isset($_REQUEST[$this->nameSpace.'price_min']) &&  isset($_REQUEST[$this->nameSpace.'price_max']) )
		{
			if($_REQUEST[$this->nameSpace.'price_min'] == $price_range['min'] && $_REQUEST[$this->nameSpace.'price_max'] == $price_range['max'])
			 $selected  = ' selected="selected" ';
		}
        $out .= '<option value="'.$this->priceURL($price).'"'.$selected.'>';
		$out .= $label;
        $count = isset($price['product_count']) ? $price['product_count'] : 0;
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }

  function renderSuggestedMerchants() {
    if (!isset($this->cachedSuggestedMerchants)) {
      $out = '';
      if (!isset($this->productResults->suggested_merchants)) return $out;
      $out .= '<div id="psps-suggested-merchants">';
      $out .= '<h2>Go directly to this store:</h2>';
      foreach($this->productResults->suggested_merchants->merchant as $suggested_merchant) {
        $out .= '<div class="psps-suggested-merchant">';
        if (strlen($suggested_merchant['logo_url']) > 0) {
          $out .= '<a href="'.$suggested_merchant['url'].'" rel="nofollow"><img src="'.$suggested_merchant['logo_url'].'" /></a>';
        }
        $out .= '<a href="'.$suggested_merchant['url'].'" rel="nofollow">'.$suggested_merchant['name'].'</a>';
        $out .= '</div>';
      }
      $out .= '</div>';
      $this->cachedSuggestedMerchants = $out;
    }
    return $this->cachedSuggestedMerchants;
  }

  function renderDealPaginationSummary(){
    return $this->renderPaginationSummary($this->dealResults['deal_offset'], $this->dealResults->deals['total_count'], $this->dealLimit);
  }

  function renderProductPaginationSummary(){

    $offset = null;
    if(is_object($this->productResults))
    {
      $offset   = $this->productResults->page_offset;
    }
    else
    {
      $offset = $this->productResults['product_offset'];
    }
    return $this->renderPaginationSummary($offset, $this->productResults->products['total_count'], $this->productResults->per_page);
  }

  function renderPaginationSummary($page_offset,$count,$per_page){
    if (!isset($this->cachedPaginationSummary)) {
      $start = (($page_offset - 1) * $per_page) + 1;
      $finish = ($page_offset) * $per_page;
      $finish = (intval($count) < $finish) ? $count : $finish;
      $this->cachedPaginationSummary = 'Showing '.$start.'-'.$finish.' of '.number_format(intval($count));
    }
    return $this->cachedPaginationSummary;
  }

  function renderPriceSorting() {

    //orionk added this function
    $url = $this->baseURL(array());
    //$url = $this->addParameter($url,'keyword',$this->keyword);

	$ascending  = $this->addParameter($url,'sort_product','price_asc');
	 $ascending = str_replace('?&','?',$ascending);

	$descending  = $this->addParameter($url,'sort_product','price_desc');
	$descending = str_replace('?&','?',$descending);

  $sort_by_price = '<span>Sort by price <a href="'.$ascending.'">Low-High</a>  - <a href="'.$descending.'">High-Low</a>  </span>';


 return $sort_by_price;

  }

  function renderDealPaginationLinks() {
    return $this->renderPaginationLinks('deal', $this->dealResults, $this->dealResults->deals['total_count']);
  }

  function renderProductPaginationLinks(){
    return $this->renderPaginationLinks('product', $this->productResults, $this->productResults->products['total_count']);
  }

  function renderPaginationLinks($type, $results, $count){

    if (!isset($this->cachedPagination_links)) {
      $out = '';
      $itemCount = intval($count);
      if ($type == 'deal') {
        $limit = $this->dealLimit;
      } else {
        $limit = $this->productLimit;
      }

        if ($itemCount > $limit) {

          $offset = null;
          if(is_object($results))
          {
            $offset   = $results->page_offset;
          }
          else
          {
            $offset = intval($results[$type.'_offset']);
          }

          $pagesAtOnce  = 5;
          $pageNumber   = ($offset == 0)? 1: $offset;

          $totalPages   = ceil($itemCount / $limit);

          $pagesAtATime = ($totalPages <= $pagesAtOnce) ? $totalPages : $pagesAtOnce;

          $out .= '<ul class="pagination">';

          if ($pageNumber != 1) {
            $out .= $this->pageLink(array('page' => $pageNumber-1, 'text' => 'Previous'));
          }
          if ($pageNumber <= 2 || $totalPages <= 5) {
            $start_page = 1;
            $end_page = $pagesAtATime;
          } else if (($totalPages - $pageNumber) == 0) {
            $start_page = $pageNumber - 4;
            $end_page = $pageNumber;
          } else if (($totalPages - $pageNumber) == 1) {
            $start_page = $pageNumber - 3;
            $end_page = $pageNumber + 1;
          } else {
            $start_page = $pageNumber - 2;
            $end_page = $pageNumber + 2;
          }

          $i = $start_page;

          while ($i < $end_page+1) {
            if ($i == $pageNumber) {
              $out .= '<li><span class="psps-search-current">'.$pageNumber.'</span></li>';
            } else {
              $out .= $this->pageLink(array('page' => $i, 'text' => $i));
            }
            $i++;
          }

      if ($pageNumber < $totalPages) {
        $out .= $this->pageLink(array('page' => $pageNumber+1, 'text' => 'Next'));
      }

      $out .= '</ul>';
      }
      $this->cachedPaginationLinks = $out;
    }

    return $this->cachedPaginationLinks;
  }

  function customCategoryLink($category) {
    $url = $this->baseURL($this->params);

    if (isset($category['search_options']) && sizeOf($category['search_options']) > 0) {
      foreach($category['search_options'] as $key => $value) {
        $url = $this->addParameter($url,$key,$value);
      }
    } else {
      $url = $this->addParameter($url,'keyword',$category['name']);
    }
    $url = str_replace('?&','?',$url);
    return '<a href="'.$url.'">'.$category['name'].'</a>';
  }

   function customCategoryLinkDD($category) {
    $url = $this->baseURL($this->params);

    if (isset($category['search_options']) && sizeOf($category['search_options']) > 0) {
      foreach($category['search_options'] as $key => $value) {
        $url = $this->addParameter($url,$key,$value);
      }
    } else {
      $url = $this->addParameter($url,'keyword',$category['name']);
    }
    $url = str_replace('?&','?',$url);
    return '<a href="'.$url.'">'.$category['name'].'</a>';
  }



  function categoryLink($category) {
    return '<a href="'.$this->categoryUrl($category).'" title="See '.$category['name'].' products">'.$category['name'].'</a>';
  }

  function merchantLink($url,$merchant,$merchants,$checked) {
    return '<a href="'.$this->merchantUrl($url,$merchant,$merchants,$checked).'" title="See '.$merchant['name'].' products">'.$merchant['name'].'</a>';
  }

  function merchantLink_simple($merchant) {
    return '<a href="'.$this->merchantUrl_simple($merchant).'" title="See '.$merchant['name'].' products">'.$merchant['name'].'</a>';
  }

    function merchantUrl_simple($merchant){
    $url = $this->baseURL(array('merchant_id'));
    $url = $this->addParameter($url,'merchant_id',$merchant['id']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function merchantTypeLink($merchant) {
    return '<a href="'.$this->merchantTypeUrl($merchant).'" title="See '.$merchant['name'].' products">'.$merchant['name'].'</a>';
  }

   function discountUrl($options=array()){
    //$url = $this->baseURL(array('merchant_type_id','brand_id','price_min','price_max','percent_off_min','percent_off_max'));
    $url = $this->baseURL();
    $url = $this->addParameter($url,'percent_off_max',$options['max']);
    $url = $this->addParameter($url,'percent_off_min',$options['min']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function merchantTypeUrl($merchant){
    $url = $this->baseURL();
    //$url = $this->baseURL(array('merchant_id','merchant_type_id','brand_id','price_max','price_min','product_offset','category_id','deal_offset'));
    $url = $this->addParameter($url,'merchant_type_id',$merchant['id']);
    if (isset($_REQUEST[$this->nameSpace.'merchant_id'])) {
      $url = $this->addParameter($url,'merchant_id',$_REQUEST[$this->nameSpace.'merchant_id']);
    }
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function merchantUrl($url,$merchant,$merchants,$checked){
    //$url = $this->baseURL(array('merchant_id','merchant_type_id','brand_id','price_max','price_min','product_offset','category_id','deal_offset'));

    if($checked)
    {
      unset($merchants[array_search($merchant['id'],$merchants)]);
    }
    else
      $merchants[] = $merchant['id'];

    $merchants   = array_unique($merchants);

    $url = $this->addParameter($url,'merchant',implode(',', $merchants),true);
    $url = str_replace('?&','?',$url);
    return $url;
  }

   function categoryUrl($category) {
    //$url = $this->baseURL(array('merchant_id','merchant_type_id','brand_id','price_max','price_min','product_offset','category_id'));
    $url = $this->baseURL();
    $url = $this->addParameter($url,'category_id',$category['id']);
    $url = $this->addParameter($url,'merchant_id',$_REQUEST['merchant_id']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function priceUrl($options=array()){

    $url = $this->baseURL(array('price'));
    $url = $this->addParameter($url,'price',$options['price_min'].'-'.$options['price_max']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  // $options = array('price_min' => '', 'price_max' => '', 'text' => '')
  function priceLink($options=array()) {
    $label = (intval($options['price_min']) == 0) ? "Under $".$options['price_max'] : '$'.$options['price_min'].'-$'.$options['price_max'];
    return '<a href="'.$this->priceUrl($options).'" title="Filter by prices $'.$options['price_min'].'-$'.$options['price_max'].'">'.$label.'</a>';
  }



  // $options = array('product_offset' => '', 'page' => '', 'text' => '')
  function pageLink($options=array()) {
    return '<li><a href="'.$this->pageUrl($options).'" title="Go to page '.$options['page'].'">'.$options['text'].'</a></li>';
  }

  function pageUrl($options=array()){
    if (isset($options['page'])) {
      $url = $this->baseURL(array('page'));
      $url = $this->addParameter($url,'page',$options['page']);
    } else {
      $url = $this->baseURL(array('page'));
      $url = $this->addParameter($url,'page',$options['page']);
    }

    $url = str_replace('?&','?',$url);
    return $url;
  }


  //Function that add paramters to the URL
  function addParameters($url,$paramNames_to_add) {


    //dd(isset($_REQUEST[$this->nameSpace.'merchant']));
    //$url = $this->addParameter($url, 'url_subid', $this->subid);
    foreach($paramNames_to_add as $paramName) {

      if (isset($_REQUEST[$this->nameSpace.$paramName]))
      {
        if (strlen($_REQUEST[$this->nameSpace.$paramName]) > 0) {
          $url = $this->addParameter($url,$paramName,$_REQUEST[$this->nameSpace.$paramName]);
        }
      }

    }

    $url = str_replace($this->nameSpace, '', $url);
    $url = str_replace('?&','?',$url);

    return $url;
  }

  function addParameter($url,$paramName,$paramValue/*,$someURL*/) {
    if (strlen($paramValue) > 0) {
      $delimiter = (strpos($url,'?') > -1) ? '&' : '?';

      //majin
      if($paramName == 'keyword' && strpos($paramValue,' -')) {

         $paramValues =  explode(' -', $paramValue);
         $url = $url.$delimiter.$this->nameSpace.$paramName.'='.urlencode($paramValues[0]).'%20-'.$paramValues[1];
      }
      else
          $url = $url.$delimiter.$this->nameSpace.$paramName.'='.urlencode($paramValue);
    }

    if($paramName == 'brand'/* && $someURL*/)
    {
      //dd($url);
    }
    return $url;
  }

  function baseURL($paramNamesToStrip) {
    $url = $this->requestURI();
    foreach ($_REQUEST as $key => $value) {
      foreach ($paramNamesToStrip as $paramName) {
        $url = $this->stripParameter($url,$paramName,$key,$value);
      }
    }
    return $url;
  }

  function stripParameter($url,$paramName,$key,$value){
    if (strpos($key,$paramName) > -1 ) {
      $url = str_replace('&'.$key.'='.urlencode($value), "", $url);
      $url = str_replace($key.'='.urlencode($value), "", $url);
    }
    return $url;
  }

  function requestURI() {
    if(!isset($_SERVER['REQUEST_URI'])) {
      $url = $_SERVER['PHP_SELF'];
      if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
        $url .= $HTTP_SERVER_VARS['QUERY_STRING'];
      }
      return $url;
    } else {
      return $_SERVER['REQUEST_URI'];
    }
  }

  function requestResults($request){

    //echo $request;//die;
    /*
    $response = ($this->type == 'product')?file_get_contents('testdata_product.json'):file_get_contents('testdata_compare.json');
    return json_decode($response);
    */

    //use it
    //return json_decode(file_get_contents('testdata_compare.json'));

    if (function_exists( 'curl_init')) {
		###Change
		//echo $request;die;
		//echo $request;die;
    //152192,21200

       $session = curl_init($request);

       curl_setopt($session,CURLOPT_HEADER,false);
       curl_setopt($session,CURLOPT_RETURNTRANSFER,true);
       $response = curl_exec($session);
       curl_close($session);
     } else {
       $response = file_get_contents($request);
     }

     //use it
     //file_put_contents('testdata_compare.json', $response);

    return json_decode($response);
  }

  function findCachedMerchantTypes() {
    $this->cachedMerchantTypes = simplexml_load_string($this->cachedMerchantTypesXml());
  }

  function cachedMerchantTypesXml(){
    return '<merchant_types total_count="44">
      <merchant_type name="Adult" merchant_count="18" id="34"/>
      <merchant_type name="Apparel & Accessories" merchant_count="129" id="26"/>
      <merchant_type name="Apparel - Lingerie" merchant_count="16" id="59"/>
      <merchant_type name="Apparel - Plus Size" merchant_count="30" id="14"/>
      <merchant_type name="Automotive & Motorcycle" merchant_count="24" id="5"/>
      <merchant_type name="Babies & Kids" merchant_count="62" id="9"/>
      <merchant_type name="Bags & Luggage" merchant_count="19" id="30"/>
      <merchant_type name="Beauty & Fragrance" merchant_count="70" id="40"/>
      <merchant_type name="Books & Entertainment" merchant_count="51" id="1"/>
      <merchant_type name="Career & Business Supplies" merchant_count="4" id="23"/>
      <merchant_type name="Christmas" merchant_count="6" id="39"/>
      <merchant_type name="Computers & Accessories" merchant_count="54" id="11"/>
      <merchant_type name="Costume & Party Supplies" merchant_count="35" id="20"/>
      <merchant_type name="Crafting & Scrapbooking" merchant_count="18" id="32"/>
      <merchant_type name="Department Stores" merchant_count="52" id="47"/>
      <merchant_type name="Electronics & Accessories" merchant_count="72" id="10"/>
      <merchant_type name="Flowers & Related" merchant_count="16" id="3"/>
      <merchant_type name="Food & Drink" merchant_count="62" id="37"/>
      <merchant_type name="Gifts & Collectibles" merchant_count="64" id="53"/>
      <merchant_type name="Green & Organic" merchant_count="14" id="25"/>
      <merchant_type name="Health & Wellness" merchant_count="39" id="41"/>
      <merchant_type name="Home & Garden" merchant_count="218" id="33"/>
      <merchant_type name="Jewelry" merchant_count="84" id="28"/>
      <merchant_type name="Magazines" merchant_count="14" id="36"/>
      <merchant_type name="Medical & Nursing" merchant_count="16" id="51"/>
      <merchant_type name="Mobile Phones & Accessories" merchant_count="18" id="4"/>
      <merchant_type name="Musical Supplies" merchant_count="15" id="18"/>
      <merchant_type name="Novelties & Collectibles" merchant_count="39" id="66"/>
      <merchant_type name="Office Supplies" merchant_count="31" id="45"/>
      <merchant_type name="Outdoor Gear" merchant_count="33" id="17"/>
      <merchant_type name="Pets & Animal Gear" merchant_count="47" id="19"/>
      <merchant_type name="Photo & Personalized" merchant_count="17" id="63"/>
      <merchant_type name="Religious" merchant_count="8" id="57"/>
      <merchant_type name="Shoes & Accessories" merchant_count="58" id="29"/>
      <merchant_type name="Sports & Recreation" merchant_count="102" id="31"/>
      <merchant_type name="Supplements" merchant_count="23" id="58"/>
      <merchant_type name="Tickets & Events" merchant_count="6" id="55"/>
      <merchant_type name="Toner & Ink" merchant_count="8" id="6"/>
      <merchant_type name="Tools & hardware" merchant_count="20" id="43"/>
      <merchant_type name="Toys, Games & Hobbies" merchant_count="53" id="27"/>
      <merchant_type name="Travel & Hotels" merchant_count="19" id="16"/>
      <merchant_type name="TV & Studio Stores" merchant_count="18" id="49"/>
      <merchant_type name="Vision Care" merchant_count="24" id="2"/>
      <merchant_type name="Weddings & Celebrations" merchant_count="27" id="35"/>
    </merchant_types>
    ';
  }
}
