<?php
defined('POPSHOPS_API_VERSION') or die('');

function dd($d){
	echo '<pre>';
	print_r($d);
	echo '</pre>';die;
}

function d($d){
	echo '<pre>';
	print_r($d);
	echo '</pre>';
}

function trace($return=false, $html=true, $showFirst=false)
{
    $d = debug_backtrace();
    $out = '';
   $out .= "<pre>";
    foreach ($d as $i=>$r) {
        if (!$showFirst && $i==0) {
            continue;
        }
        @$out .= "[$i] {$r['file']}:{$r['line']}\n";
    }
    $out .= "</pre>";
  echo $out;
  die;
}

error_reporting(0);

class PopShops {

  var $products = array();
  var $type = null;

  function PopShops($options=array()) {
    // Setup required api keys
    $this->apiKey = $options['api_key'];
    $this->catalogKey = $options['catalog_key'];
    $this->keyword = $options['keyword'];
    $this->apiVersion = POPSHOPS_API_VERSION;

    // Setup list of categories to build predefined searches to be used as categories
    $this->categories = (isset( $options['categories'] ) ) ? $options['categories'] : array();

    // Setup default parameters for how many results to return
    $this->subid = (isset( $options['subid'] ) ) ? $options['subid'] : 'popshops';
    $this->localRedirects = (isset( $options['localRedirects'] ) ) ? $options['localRedirects'] : false;
    $this->productLimit = (isset( $options['productLimit'] ) ) ? $options['productLimit'] : 9;
    $this->productGridColumns = (isset( $options['productGridColumns'] ) ) ? $options['productGridColumns'] : 3;
    $this->productOffset = 0;
    $this->dealLimit = (isset( $options['dealLimit'] ) ) ? $options['dealLimit'] : 25;
    $this->dealOffset = 0;
    $this->nameSpace = (isset( $options['nameSpace'] ) ) ? $options['nameSpace'] : 'psps_';

    //$this->nameSpace = '';

    if ( !isset( $_REQUEST[ $this->nameSpace.'keyword' ] ) && isset( $options['defaultSearch'] ) ) {
      $_REQUEST[ $this->nameSpace.'keyword' ] = $options['defaultSearch'];
    }

    // Setup list of parameters to pass on to PopShops. These will be parsed out of the url.
    $this->params = array('keyword','merchant','merchant_type_id','percent_off','category_id','brand','price','price_min','price_max','sort_product','results_per_page','page','product','deal_type_id','deal_offset','percent_off_min','percent_off_max');
  }

  function findMerchantTypes() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/merchant_types.xml";
    $this->merchantTypeResults = $this->requestResults($request);
  }

  function findNetworks() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/networks.xml";
    $this->networkResults = $this->requestResults($request);
  }

  function findProducts() {

    $this->type = 'product';

    $request = "http://popshops.com/v".$this->apiVersion."/products.json?";
    $request .= "catalog=".$this->catalogKey;
    $request = $this->addParameter($request, 'results_per_page', $this->productLimit);
    $request = $this->addParameter($request, 'account', $this->apiKey);
    //$request = $this->addParameter($request, 'include_discounts', 'true');
	   //majin
    //$request = $this->addParameter($request, 'include_product_groups', 1);
    $request = $this->addParameters($request,$this->params);
    $this->productResults = $this->requestResults($request);

    $page = $per_page = null;
    foreach($this->productResults->parameters as $_param)
    {
        if($_param->name == 'page')
        {
          $page = $_param->value;
        }
        else if($_param->name == 'results_per_page')
        {
          $per_page = $_param->value;
        }
    }


    $this->productResults->page_offset  = $page;
    $this->productResults->per_page     = $per_page;

    $this->productResults->products     = (array) $this->productResults->results->products;
    $this->productResults->products['total_count'] = $this->productResults->products['count'];
    $this->productResults->merchants    = $this->productResults->resources->merchants;
    $this->productResults->brands       = $this->productResults->resources->brands;
    $this->productResults->deal_types   = $this->productResults->resources->deal_types;

    $this->productResults->percent_off  = array();


    ///price range filter
    foreach($this->productResults->filters->filter as $filter) {

      if($filter->name == 'percent_off')
      {
        $this->productResults->percent_off = $filter->values;
        break;
      }
    }

    $this->productResults->price_ranges  = new stdClass();
    $this->productResults->price_ranges->price_range = array();

    ///price range filter
    foreach($this->productResults->filters->filter as $filter) {

      if($filter->name == 'price')
      {
        $this->productResults->price_ranges->price_range = $filter->values->value;
        break;
      }
    }
    //dd($this->productResults->price_ranges->price_range);



    //$this->productResults->merchants->merchant = $this->productResults->resources->merchants->merchant;
    //$this->productResults->categories = $this->productResults->resources->categories->matches->category;

    //$this->productResults->price_ranges->price_range
    //$this->productResults->merchants->merchant
    //$this->productResults->brands->brand
    //$this->dealResults->deals->deal
    //$this->productResults->products->product

  }

  function findCompareProducts($productGroupId){
    $this->type = 'offer';

    $request = "http://popshops.com/v".$this->apiVersion."/products.json?";
    $request .= "catalog=".$this->catalogKey;

	   ###Change
	  $request = $this->addParameter($request, 'product', $productGroupId);
    $request = $this->addParameter($request, 'account', $this->apiKey);
    $request = $this->addParameters($request,$this->params);
    $this->productResults = $this->requestResults($request);


    if(!isset($this->productResults->price_ranges))
      $this->productResults->price_ranges = array();

    $page = $per_page = null;
    foreach($this->productResults->parameters as $_param)
    {
        if($_param->name == 'page')
        {
          $page = $_param->value;
        }
        else if($_param->name == 'results_per_page')
        {
          $per_page = $_param->value;
        }
    }


    $this->productResults->page_offset  = $page;
    $this->productResults->per_page     = $per_page;

    $this->productResults->products     = (array) $this->productResults->results->products;

    $this->productResults->products['total_count'] = $this->productResults->products['count'];
    $this->productResults->merchants    = $this->productResults->resources->merchants;
    $this->productResults->brands       = $this->productResults->resources->brands;
    $this->productResults->deal_types   = $this->productResults->resources->deal_types;


    $this->productResults->deal_types   = $this->productResults->resources->deal_types;

    if($this->productResults->products)
    {
      $this->productResults->offers = $this->productResults->products['product'][0]->offers;
      $this->productResults->products['total_count'] = $this->productResults->offers->count;
    }

    $this->productResults->Coupons = array();

    if($this->productResults->results->deals->count > 0) {
      $this->productResults->Coupons = $this->productResults->results->deals;
    }

  }

   function productCompareButton($product)
  {
		$out = '<div class="psps-text psps-price">
						 <div class="psps-store-price">$'.$product['price_min'].' - $'.$product['price_max'].'</div>
						 <div class="ps-button" style="text-align: center;">
							 <a class="url"  href="comparison.php?group_id='.$product['id'].'">
								<img alt="Compare" class="compare-button" src="/shopping/images/btn.compare.png">
							</a>
						 </div>
						 <div class="psps-store-price">'.$product['offer_count'].' found</div>
					</div>';

		return 	$out ;

  }

  function renderProductGrid($discounted = false) {
    $out = '<table style="float:left;" class="mobiletableview">';

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

  function renderCustomCategories2(){
      $out = '';
      if (sizeOf($this->categories) > 0) {
      			# $out .= '<h3>Categories</h3>';
      			# $out .= '<li><a href="#" class="">Categories</a>';
				# $out .= '<ul>';
				foreach ($this->categories as $key => $category) {
					if ($key == 0) {
						$out .= '<li class="topkey">';
						$out .= $this->customCategoryLink($category);
						$out .= '</li>';
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


  // $options = array('price_min' => '', 'price_max' => '', 'text' => '')
  function priceLink($options=array()) {
    $label = (intval($options['price_min']) == 0) ? "Under $".$options['price_max'] : '$'.$options['price_min'].'-$'.$options['price_max'];
    return '<a href="'.$this->priceUrl($options).'" title="Filter by prices $'.$options['price_min'].'-$'.$options['price_max'].'">'.$label.'</a>';
  }



  // $options = array('product_offset' => '', 'page' => '', 'text' => '')
  function pageLink($options=array()) {
    return '<a href="'.$this->pageUrl($options).'" title="Go to page '.$options['page'].'">'.$options['text'].'</a>';
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

  function addParameters($url,$paramNames_to_add) {

    //majin
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

  function addParameter($url,$paramName,$paramValue,$someURL) {
    if (strlen($paramValue) > 0) {
      $delimiter = (strpos($url,'?') > -1) ? '&' : '?';
      if($someURL)
      {
        //dd($paramValue);
      }
      $url = $url.$delimiter.$this->nameSpace.$paramName.'='.urlencode($paramValue);
    }
    if($paramName == 'brand' && $someURL)
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
?>