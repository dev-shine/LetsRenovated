<?php namespace App\Http\Controllers;
use DB;

class SettingController extends Controller {
	public function __construct()
	{         
		$DBs =  \DB::select('SELECT * FROM setting');
		foreach ($DBs as $DB) $this->cj_api_key = str_replace("+","",rawurldecode(urlencode($DB->cj_key)));
	}

	public function setting(){
		$this->get_advertiser();
		$paramss = DB::select('select * from catelog');
		$params_1 = DB::select('select * from setting');
		$params = array($params_1,$this->get_category(),$this->get_advertiser());
		if(!session()->has('kingdong')){
			return redirect()->guest('panel/login');
		} else {
			return view('panelViews::setting',['paramss'=>$paramss,'params'=>$params]);
		}
	}

	public function delete($id){
		DB::table('catelog')->where('id', '=', $id)->delete();
		$paramss = DB::select('select * from catelog');
		$params_1 = DB::select('select * from setting');
		$params = array($params_1,$this->get_category(),$this->get_advertiser());
		if(!session()->has('kingdong')){
			return redirect()->guest('panel/login');
		} else {
			return view('panelViews::setting',['paramss'=>$paramss,'params'=>$params]);
		}
	}

	public function add($param){
		$param1 = explode("___",$param)[0]; $param2 = explode("___",$param)[1]; $param3 = explode("___",$param)[2]; $param4 = explode("___",$param)[3]; 
		$param1 = str_replace("Percent","%",$param1);
		$param1 = str_replace("Dercent","/",$param1);
		$param2 = str_replace("Percent","%",$param2);
		$param2 = str_replace("Dercent","/",$param2);
		$param4 = str_replace("Percent","%",$param4);
		$param4 = str_replace("Dercent","/",$param4);
		$chk_array = DB::select('select * from catelog');
		$arr = array();
		foreach ($chk_array as $user) {
			array_push($arr,$user->davis_key);
		}
		if(in_array($param1, $arr)){
			if(!session()->has('kingdong')){
				return redirect()->guest('panel/login');
			} else {
				$paramss = DB::select('select * from catelog');
				$params_1 = DB::select('select * from setting');
				$params = array($params_1,$this->get_category(),$this->get_advertiser());
				return view('panelViews::setting',['paramss'=>$paramss,'params'=>$params]);
			}
		} else {
			DB::insert('insert into catelog (davis_key,category,status,advertiser) values (?,?,?,?)', [$param1,$param2,$param3,$param4]);
			$paramss = DB::select('select * from catelog');
			$params_1 = DB::select('select * from setting');
			$params = array($params_1,$this->get_category(),$this->get_advertiser());
			if(!session()->has('kingdong')){
				return redirect()->guest('panel/login');
			} else {
				return view('panelViews::setting',['paramss'=>$paramss,'params'=>$params]);
			}
		}
	}

	public function edit($param){
		$param = str_replace("Percent","%",$param);
		$param = str_replace("Dercent","/",$param);
		DB::update('update setting set cj_key = ?',[$param]);
		DB::update('update tbl_keys set api_key = ?',[$param]);
		$paramss = DB::select('select * from catelog');
		$params_1 = DB::select('select * from setting');
		$params = array($params_1,$this->get_category(),$this->get_advertiser());
		if(!session()->has('kingdong')){
			return redirect()->guest('panel/login');
		} else {
			return view('panelViews::setting',['paramss'=>$paramss,'params'=>$params]);
		}
	}

	public function get_category() {
		$this->api_key = $this->cj_api_key;
		$url = "https://support-services.api.cj.com/v2/categories?";
		$authorization = "Authorization:".$this->api_key;
		$url = curl_init($url);
		curl_setopt($url,CURLOPT_HEADER,false);
		curl_setopt($url,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($url, CURLOPT_HTTPHEADER, array($authorization));
		$cj_r = curl_exec($url);
		curl_close($url);
		$xml = simplexml_load_string($cj_r);
		$xml = json_decode(json_encode($xml),TRUE);
		if($xml["categories"]["category"]=="") {  ("<h1>Network Error!</h1>"); }
		$param = array_unique($xml["categories"]["category"]);
		$result = array();
		foreach($param as $key=>$value){
			array_push($result,$value);
		}
		return $result;
	}

	public function get_advertiser() {
		$url = "https://advertiser-lookup.api.cj.com/v3/advertiser-lookup?advertiser-ids=joined&records-per-page=100";
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
		$xml = $xml["advertisers"]["advertiser"];
		$advertiser = array(); $result = array();
		foreach ($xml as $value) {
			$advertiser[$value['program-url']]['parent'] = $value['primary-category']['parent'];
			$advertiser[$value['program-url']]['child'] = $value['primary-category']['child'];
		}
		return $advertiser;
	}
}
