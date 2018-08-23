<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SideMenu extends Model {

    protected $table = 'tbl_sidemenu';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','url','parent'
        ];
}
  ?>