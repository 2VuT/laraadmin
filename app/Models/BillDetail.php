<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    use SoftDeletes;
	
	protected $table = 'billdetails';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function product(){
    	return $this->belongsTo('App\Models\Product','id_product','id');
    }

    public function bill(){
    	return $this->belongsTo('App\Models\Bill','id_bill','id');
    }

}
