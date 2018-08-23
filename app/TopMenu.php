<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TopMenu extends Model {

    protected $table = 'tbl_topmenu';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','url'
        ];
}
  ?>