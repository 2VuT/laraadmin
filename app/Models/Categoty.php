<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoty extends Model
{
    use SoftDeletes;
	
	protected $table = 'categoties';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function product(){
    	return $this->hasMany('App\Models\Product','id_type','id');
    }
}
