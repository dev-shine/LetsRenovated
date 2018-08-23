<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SideNav extends Model {

    protected $table = 'tbl_sideNav';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','url','type','ref_id'
        ];
}
  ?>