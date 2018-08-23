<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Menu extends Model {

    protected $table = 'tbl_mainmenu';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','url','parent'
        ];

    
    public function __construct(){

        $parent = \Request::input('parent'); 
        $parent = isset($parent)?$parent:'0';
        $this->where('parent',$parent);	
    }

    public static function all($columns = Array())
    {
        //dd(\App\Menu::where('parent','0')->get()->count());
        //return \App\Menu::where('parent','0')->get();//->count();
        return \DB::table('tbl_mainmenu')->where('parent','0');
    }

    public function test($query)
    {
        return $query->where('parent', '0');
    }
    
}

?>