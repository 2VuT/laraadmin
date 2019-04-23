<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
	
	protected $table = 'products';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function product_type(){
    	return $this->belongsTo('App\Models\Categoty','id_type','id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\Models\BillDetail','id_product','id');
    }

}
