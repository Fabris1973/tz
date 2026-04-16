<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	protected $fillable = ['name'];

    
    public function sales()
    {
        return $this->hasMany(Operations::class, 'seller_id');
    }

   
    public function purchases()
    {
        return $this->hasMany(Operations::class, 'buyer_id');
    }
	
	public function toJson($options = 0)
{
    return parent::toJson($options | JSON_UNESCAPED_UNICODE);
}
}
