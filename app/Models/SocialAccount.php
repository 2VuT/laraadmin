<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAccount extends Model
{
    use SoftDeletes;
	
	protected $table = 'socialaccounts';

	protected $fillable = ['user_id', 'provider_user_id', 'provider'];
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
