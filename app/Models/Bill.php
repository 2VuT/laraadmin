<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
	
	protected $table = 'bills';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function bill_detail(){
    	return $this->hasMany('App\Models\BillDetail','id_bill','id');
    }

    public function bill(){
    	return $this->belongsTo('App\Models\Customer','id_customer','id');
    }

}
