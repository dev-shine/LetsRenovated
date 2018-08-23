<?php namespace App\Http\Controllers;
use DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');

		$this->ad =  \DB::table('tbl_config')->first();

		//$this->_getMenus();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */


	public function search($keyword = null)
	{
		$total = 'total';
		$sort_order = 'sort';
		$advertiserid = 0;
		return $this->index($keyword,$total,$sort_order,$advertiserid,true);
	}

	public function index($keyword = null,$ccc=null,$sort_order,$advertiserid,$search = false)
	{
		if($sort_order == 'item'){
			$keyword = $advertiserid;
			$advertiserid = 0;
			$ccc = 1;
		}
		$counting = '';
		if($ccc == 'total' || $ccc == null || $ccc == ''){
			$counting = 1;
		} else {
			$counting = $ccc;
		}

		$accountApiKey = '';

		$defaultSearch = ($keyword)?$keyword:"kitchen";

		$keyword = ($keyword)?$keyword:$defaultSearch;


		$menuRow =  \DB::table('tbl_mainmenu')->where('url',$keyword)->first();

		$keyword = str_replace('_', '-', $keyword);

		$forced_search = false;

		if(!$menuRow)
		{
			$menuRow = new \stdClass();
			$menuRow->name = ucwords(str_replace('-', ' ', $keyword));
			$menuRow->side_nav = '';
			$forced_search = $menuRow->name;

			$keys = \DB::table('tbl_keys')->where('key_lbl','Search')->first();
			$accountApiKey = $keys->api_key;

		}
		else {
			$keys = \DB::table('tbl_keys')->where('id',$menuRow->key_id)->first();
			$accountApiKey = $keys->api_key;

			$forced_search = ucwords($menuRow->name);
		}
		// Generic Search
		if(!$menuRow->side_nav)
		{
			$result_ = \DB::table('tbl_mainmenu')->where('side_nav', 'LIKE', '%' . $keyword . '%')->first();

			if($result_)
			{
				$menuRow->side_nav = $result_->side_nav;
			}
		}

		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$menuRow->side_nav = str_replace("item/", "../../../item/", $menuRow->side_nav);
			$menuRow->side_nav = str_replace("shop/", "../../../shop/", $menuRow->side_nav);
		}

		$menuRow->side_nav = str_replace("shopamazon", "../../shopamazon", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("coupons/", "../../coupons/", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("pdf/", "../../pdf/", $menuRow->side_nav);

		$pageBrowserTitle = $keyword;
		$productsPerPage = 40;
		$productGridColumns = 3;
		$subid = 'single ovens';
		$localRedirects = true;


		$popshops = new \App\PopShops();

		$popshops->initialize(array('api_key' => $accountApiKey,
			'defaultSearch' => $keyword,
			'keyword' => $keyword,
			'title' => $keyword,
			'productLimit' => $productsPerPage,
			'subid' => $subid,
			'productGridColumns' => $productGridColumns,
			'localRedirects' => $localRedirects
		));

		$popshops->findProducts($counting,$sort_order,$advertiserid);

		$productsData = isset($popshops) ? $popshops : array();

		extract($this->_getMenus());

		//for URL
		$keyword = urlencode($keyword);

		$total_count = $popshops->total_count;

		$ad  = ($this->ad)?$this->ad->body:'';
		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$ad = str_replace("../../","../../../../../",$ad);
		}

		$ids = $popshops->ids;

		//All stores
		$total_stores = $popshops->total_stores;
		$stores = $popshops->advertiser;

		return view('product_listing',compact('ids','ad','forced_search','search','menuRow','pageBrowserTitle','popshops','menu','topmenu','sidemenu','productsData','categories','keyword','total_count','counting','stores','total_stores','advertiserid'));
	}

	public function first()
	{
		$keyword = "kitchen";
		$ccc = null;
		$search = false;
		$sort_order = 'sort';
		$advertiserid = 0;

		$counting = '';

		if($ccc == 'total' || $ccc == null || $ccc == ''){
			$counting = 1;
		} else {
			$counting = $ccc;
		}

		$accountApiKey = '';

		$defaultSearch = ($keyword)?$keyword:"kitchen";

		$keyword = ($keyword)?$keyword:$defaultSearch;


		$menuRow =  \DB::table('tbl_mainmenu')->where('url',$keyword)->first();
		$keyword = str_replace('_', '-', $keyword);

		$forced_search = false;

		if(!$menuRow)
		{
			$menuRow = new \stdClass();
			$menuRow->name = ucwords(str_replace('-', ' ', $keyword));
			$menuRow->side_nav = '';
			$forced_search = $menuRow->name;

			$keys = \DB::table('tbl_keys')->where('key_lbl','Search')->first();
			$accountApiKey = $keys->api_key;

		}
		else {
			$keys = \DB::table('tbl_keys')->where('id',$menuRow->key_id)->first();
			$accountApiKey = $keys->api_key;

			$forced_search = ucwords($menuRow->name);
		}
		// Generic Search
		if(!$menuRow->side_nav)
		{
			$result_ = \DB::table('tbl_mainmenu')->where('side_nav', 'LIKE', '%' . $keyword . '%')->first();

			if($result_)
			{
				$menuRow->side_nav = $result_->side_nav;
			}
		}

		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$menuRow->side_nav = str_replace("item/", "../../../item/", $menuRow->side_nav);
			$menuRow->side_nav = str_replace("shop/", "../../../shop/", $menuRow->side_nav);
		}
		$menuRow->side_nav = str_replace("shopamazon", "../../shopamazon", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("coupons/", "../../coupons/", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("pdf/", "../../pdf/", $menuRow->side_nav);

		$pageBrowserTitle = $keyword;
		$productsPerPage = 40;
		$productGridColumns = 3;
		$subid = 'single ovens';
		$localRedirects = true;


		$popshops = new \App\PopShops();

		$popshops->initialize(array('api_key' => $accountApiKey,
			'defaultSearch' => $keyword,
			'keyword' => $keyword,
			'title' => $keyword,
			'productLimit' => $productsPerPage,
			'subid' => $subid,
			'productGridColumns' => $productGridColumns,
			'localRedirects' => $localRedirects
		));

		$popshops->findProducts($counting,$sort_order,$advertiserid);

		$productsData = isset($popshops) ? $popshops : array();

		extract($this->_getMenus());

		//for URL
		$keyword = urlencode($keyword);

		$total_count = $popshops->total_count;

		$ad  = ($this->ad)?$this->ad->body:'';
		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$ad = str_replace("../../","../../../../../",$ad);
		}

		$ids = $popshops->ids;
		//All stores
		$total_stores = $popshops->total_stores;
		$stores = $popshops->advertiser;

		return view('product_listing',compact('ids','ad','forced_search','search','menuRow','pageBrowserTitle','popshops','menu','topmenu','sidemenu','productsData','categories','keyword','total_count','counting','stores','total_stores','advertiserid'));
	}

	public function gofunction($keyword)
	{
		$ccc = null;
		$search = false;
		$sort_order = 'sort';
		$advertiserid = 0;
		$counting = '';

		if($ccc == 'total' || $ccc == null || $ccc == ''){
			$counting = 1;
		} else {
			$counting = $ccc;
		}

		$accountApiKey = '';

		$defaultSearch = ($keyword)?$keyword:"kitchen";

		$keyword = ($keyword)?$keyword:$defaultSearch;


		$menuRow =  \DB::table('tbl_mainmenu')->where('url',$keyword)->first();

		$keyword = str_replace('_', '-', $keyword);

		$forced_search = false;

		if(!$menuRow)
		{
			$menuRow = new \stdClass();
			$menuRow->name = ucwords(str_replace('-', ' ', $keyword));
			$menuRow->side_nav = '';
			$forced_search = $menuRow->name;

			$keys = \DB::table('tbl_keys')->where('key_lbl','Search')->first();
			$accountApiKey = $keys->api_key;

		}
		else {
			$keys = \DB::table('tbl_keys')->where('id',$menuRow->key_id)->first();
			$accountApiKey = $keys->api_key;

			$forced_search = ucwords($menuRow->name);
		}
		// Generic Search
		if(!$menuRow->side_nav)
		{
			$result_ = \DB::table('tbl_mainmenu')->where('side_nav', 'LIKE', '%' . $keyword . '%')->first();

			if($result_)
			{
				$menuRow->side_nav = $result_->side_nav;
			}
		}

		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$menuRow->side_nav = str_replace("item/", "../../../item/", $menuRow->side_nav);
			$menuRow->side_nav = str_replace("shop/", "../../../shop/", $menuRow->side_nav);
		}
		$menuRow->side_nav = str_replace("shopamazon", "../../shopamazon", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("coupons/", "../../coupons/", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("pdf/", "../../pdf/", $menuRow->side_nav);

		$pageBrowserTitle = $keyword;
		$productsPerPage = 40;
		$productGridColumns = 3;
		$subid = 'single ovens';
		$localRedirects = true;


		$popshops = new \App\PopShops();

		$popshops->initialize(array('api_key' => $accountApiKey,
			'defaultSearch' => $keyword,
			'keyword' => $keyword,
			'title' => $keyword,
			'productLimit' => $productsPerPage,
			'subid' => $subid,
			'productGridColumns' => $productGridColumns,
			'localRedirects' => $localRedirects
		));

		$popshops->findProducts($counting,$sort_order,$advertiserid);

		$productsData = isset($popshops) ? $popshops : array();

		extract($this->_getMenus());

		//for URL
		$keyword = urlencode($keyword);

		$total_count = $popshops->total_count;

		$ad  = ($this->ad)?$this->ad->body:'';
		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$ad = str_replace("../../","../../../../../",$ad);
		}

		$ids = $popshops->ids;
		//All stores
		$total_stores = $popshops->total_stores;
		$stores = $popshops->advertiser;

		return view('product_listing',compact('ids','ad','forced_search','search','menuRow','pageBrowserTitle','popshops','menu','topmenu','sidemenu','productsData','categories','keyword','total_count','counting','stores','total_stores','advertiserid'));
	}

	public function gotwo($keyword)
	{
		$ccc = null;
		$search = false;
		$sort_order = 'sort';
		$advertiserid = 0;
		$counting = '';

		if($ccc == 'total' || $ccc == null || $ccc == ''){
			$counting = 1;
		} else {
			$counting = $ccc;
		}

		$accountApiKey = '';

		$defaultSearch = ($keyword)?$keyword:"kitchen";

		$keyword = ($keyword)?$keyword:$defaultSearch;


		$menuRow =  \DB::table('tbl_mainmenu')->where('url',$keyword)->first();

		$keyword = str_replace('_', '-', $keyword);

		$forced_search = false;

		if(!$menuRow)
		{
			$menuRow = new \stdClass();
			$menuRow->name = ucwords(str_replace('-', ' ', $keyword));
			$menuRow->side_nav = '';
			$forced_search = $menuRow->name;

			$keys = \DB::table('tbl_keys')->where('key_lbl','Search')->first();
			$accountApiKey = $keys->api_key;

		}
		else {
			$keys = \DB::table('tbl_keys')->where('id',$menuRow->key_id)->first();
			$accountApiKey = $keys->api_key;

			$forced_search = ucwords($menuRow->name);
		}
		// Generic Search
		if(!$menuRow->side_nav)
		{
			$result_ = \DB::table('tbl_mainmenu')->where('side_nav', 'LIKE', '%' . $keyword . '%')->first();

			if($result_)
			{
				$menuRow->side_nav = $result_->side_nav;
			}
		}

		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$menuRow->side_nav = str_replace("item/", "../../../item/", $menuRow->side_nav);
			$menuRow->side_nav = str_replace("shop/", "../../../shop/", $menuRow->side_nav);
		}
		$menuRow->side_nav = str_replace("shopamazon", "../../shopamazon", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("coupons/", "../../coupons/", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("pdf/", "../../pdf/", $menuRow->side_nav);

		$pageBrowserTitle = $keyword;
		$productsPerPage = 40;
		$productGridColumns = 3;
		$subid = 'single ovens';
		$localRedirects = true;


		$popshops = new \App\PopShops();

		$popshops->initialize(array('api_key' => $accountApiKey,
			'defaultSearch' => $keyword,
			'keyword' => $keyword,
			'title' => $keyword,
			'productLimit' => $productsPerPage,
			'subid' => $subid,
			'productGridColumns' => $productGridColumns,
			'localRedirects' => $localRedirects
		));

		$popshops->findProducts($counting,$sort_order,$advertiserid);

		$productsData = isset($popshops) ? $popshops : array();

		extract($this->_getMenus());

		//for URL
		$keyword = urlencode($keyword);

		$total_count = $popshops->total_count;

		$ad  = ($this->ad)?$this->ad->body:'';
		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$ad = str_replace("../../","../../../../../",$ad);
		}

		$ids = $popshops->ids;
		//All stores
		$total_stores = $popshops->total_stores;
		$stores = $popshops->advertiser;

		return view('product_listing',compact('ids','ad','forced_search','search','menuRow','pageBrowserTitle','popshops','menu','topmenu','sidemenu','productsData','categories','keyword','total_count','counting','stores','total_stores','advertiserid'));
	}

	public function gocount($keyword,$ccc)
	{
		$search = false;
		$sort_order = 'sort';
		$advertiserid = 0;
		$counting = '';

		if($ccc == 'total' || $ccc == null || $ccc == ''){
			$counting = 1;
		} else {
			$counting = $ccc;
		}

		$accountApiKey = '';

		$defaultSearch = ($keyword)?$keyword:"kitchen";

		$keyword = ($keyword)?$keyword:$defaultSearch;


		$menuRow =  \DB::table('tbl_mainmenu')->where('url',$keyword)->first();

		$keyword = str_replace('_', '-', $keyword);

		$forced_search = false;

		if(!$menuRow)
		{
			$menuRow = new \stdClass();
			$menuRow->name = ucwords(str_replace('-', ' ', $keyword));
			$menuRow->side_nav = '';
			$forced_search = $menuRow->name;

			$keys = \DB::table('tbl_keys')->where('key_lbl','Search')->first();
			$accountApiKey = $keys->api_key;

		}
		else {
			$keys = \DB::table('tbl_keys')->where('id',$menuRow->key_id)->first();
			$accountApiKey = $keys->api_key;

			$forced_search = ucwords($menuRow->name);
		}
		// Generic Search
		if(!$menuRow->side_nav)
		{
			$result_ = \DB::table('tbl_mainmenu')->where('side_nav', 'LIKE', '%' . $keyword . '%')->first();

			if($result_)
			{
				$menuRow->side_nav = $result_->side_nav;
			}
		}

		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$menuRow->side_nav = str_replace("item/", "../../../item/", $menuRow->side_nav);
			$menuRow->side_nav = str_replace("shop/", "../../../shop/", $menuRow->side_nav);
		}
		$menuRow->side_nav = str_replace("shopamazon", "../../shopamazon", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("coupons/", "../../coupons/", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("pdf/", "../../pdf/", $menuRow->side_nav);

		$pageBrowserTitle = $keyword;
		$productsPerPage = 40;
		$productGridColumns = 3;
		$subid = 'single ovens';
		$localRedirects = true;


		$popshops = new \App\PopShops();

		$popshops->initialize(array('api_key' => $accountApiKey,
			'defaultSearch' => $keyword,
			'keyword' => $keyword,
			'title' => $keyword,
			'productLimit' => $productsPerPage,
			'subid' => $subid,
			'productGridColumns' => $productGridColumns,
			'localRedirects' => $localRedirects
		));

		$popshops->findProducts($counting,$sort_order,$advertiserid);

		$productsData = isset($popshops) ? $popshops : array();

		extract($this->_getMenus());

		//for URL
		$keyword = urlencode($keyword);

		$total_count = $popshops->total_count;

		$ad  = ($this->ad)?$this->ad->body:'';
		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$ad = str_replace("../../","../../../../../",$ad);
		}

		$ids = $popshops->ids;
		//All stores
		$total_stores = $popshops->total_stores;
		$stores = $popshops->advertiser;

		return view('product_listing',compact('ids','ad','forced_search','search','menuRow','pageBrowserTitle','popshops','menu','topmenu','sidemenu','productsData','categories','keyword','total_count','counting','stores','total_stores','advertiserid'));
	}

	public function goitem($keyword1,$keyword2)
	{
		$search = false;
		$sort_order = 'sort';
		$advertiserid = 0;
		$counting = '';
		$ccc = '';
		$keyword = $keyword2;

		if($ccc == 'total' || $ccc == null || $ccc == ''){
			$counting = 1;
		} else {
			$counting = $ccc;
		}

		$accountApiKey = '';

		$defaultSearch = ($keyword)?$keyword:"kitchen";

		$keyword = ($keyword)?$keyword:$defaultSearch;


		$menuRow =  \DB::table('tbl_mainmenu')->where('url',$keyword)->first();
		$keyword = str_replace('_', '-', $keyword);

		$forced_search = false;

		if(!$menuRow)
		{
			$menuRow = new \stdClass();
			$menuRow->name = ucwords(str_replace('-', ' ', $keyword));
			$menuRow->side_nav = '';
			$forced_search = $menuRow->name;

			$keys = \DB::table('tbl_keys')->where('key_lbl','Search')->first();
			$accountApiKey = $keys->api_key;

		}
		else {
			$keys = \DB::table('tbl_keys')->where('id',$menuRow->key_id)->first();
			$accountApiKey = $keys->api_key;

			$forced_search = ucwords($menuRow->name);
		}
		// Generic Search
		if(!$menuRow->side_nav)
		{
			$result_ = \DB::table('tbl_mainmenu')->where('side_nav', 'LIKE', '%' . $keyword . '%')->first();

			if($result_)
			{
				$menuRow->side_nav = $result_->side_nav;
			}
		}

		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$menuRow->side_nav = str_replace("item/", "../../../item/", $menuRow->side_nav);
			$menuRow->side_nav = str_replace("shop/", "../../../shop/", $menuRow->side_nav);
		}
		$menuRow->side_nav = str_replace("shopamazon", "../../shopamazon", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("coupons/", "../../coupons/", $menuRow->side_nav);
		$menuRow->side_nav = str_replace("pdf/", "../../pdf/", $menuRow->side_nav);

		$pageBrowserTitle = $keyword;
		$productsPerPage = 40;
		$productGridColumns = 3;
		$subid = 'single ovens';
		$localRedirects = true;


		$popshops = new \App\PopShops();

		$popshops->initialize(array('api_key' => $accountApiKey,
			'defaultSearch' => $keyword,
			'keyword' => $keyword,
			'title' => $keyword,
			'productLimit' => $productsPerPage,
			'subid' => $subid,
			'productGridColumns' => $productGridColumns,
			'localRedirects' => $localRedirects
		));

		$popshops->findProducts($counting,$sort_order,$advertiserid);

		$productsData = isset($popshops) ? $popshops : array();

		extract($this->_getMenus());

		//for URL
		$keyword = urlencode($keyword);

		$total_count = $popshops->total_count;

		$ad  = ($this->ad)?$this->ad->body:'';
		if (preg_match("/[0-9]/", $_SERVER['REQUEST_URI'])) {
			$ad = str_replace("../../","../../../../../",$ad);
		}

		//All stores
		$total_stores = $popshops->total_stores;
		$stores = $popshops->advertiser;
		$ids = $popshops->ids;
		return view('product_listing',compact('ids','ad','forced_search','search','menuRow','pageBrowserTitle','popshops','menu','topmenu','sidemenu','productsData','categories','keyword','total_count','counting','stores','total_stores','advertiserid'));
	}


	private function _getMenus() {

		///Get the Side Menu
		$sidemenu = \DB::table('tbl_sidemenu')->select('id','id as fa','name as text','parent','url as link')->where('parent',0)->get();
		foreach($sidemenu as &$item)
		{
			$childs = \DB::table('tbl_sidemenu')->select('id','id as fa','name as text','parent','url as link')->where('parent',$item->id)->get();

			//if Child Exist
			if($childs) {

				$item->items = $childs;

				foreach ($childs as $subChild) {

					$all_subchilds = \DB::table('tbl_sidemenu')->select('id','id as fa','name as text','parent','url as link')->where('parent',$subChild->id)->get();

					if($all_subchilds) {

						$subChild->items = $all_subchilds;

						foreach($subChild->items as $sub_childs) {

							//add the grand child
							$grand_childs = \DB::table('tbl_sidemenu')->select('id','id as fa','name as text','parent','url as link')->where('parent',$sub_childs->id)->get();

							if($grand_childs) {

								$sub_childs->items = $grand_childs;

								foreach($sub_childs->items as $grand_child) {

									if($grand_child->link)
										$grand_child->link = asset('item/'.$grand_child->link);
									else
										unset($grand_child->link);
								}
							}
							//end

							if($sub_childs->link)
								$sub_childs->link = asset('item/'.$sub_childs->link);
							else
								unset($sub_childs->link);
						}
					}
					if($subChild->link)
						$subChild->link = asset('item/'.$subChild->link);
					else
						unset($subChild->link);
				}
			}
			if($item->link)
				$item->link = asset('item/'.$item->link);
			else
				unset($item->link);
		}



		//get top menu
		$topmenu = \DB::table('tbl_topmenu')->get();

		$menu = \DB::table('tbl_mainmenu')->where('parent',0)->get();
		foreach($menu as &$item)
		{
			$item->childs = \DB::table('tbl_mainmenu')->where('parent',$item->id)->get();
		}

		return array('sidemenu'=>$sidemenu,'topmenu'=>$topmenu,'menu'=>$menu);
	}
}
