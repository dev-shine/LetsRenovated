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
        'name','url','parent','side_nav'
        ];

    
    
}

?>