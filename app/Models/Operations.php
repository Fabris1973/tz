<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	protected $fillable = [
        'amount',
        'seller_id',
        'buyer_id',
        'operated_at'
    ];

    // Продавец
    public function seller()
    {
        return $this->belongsTo(Organizations::class, 'seller_id');
    }

    // Покупатель
    public function buyer()
    {
        return $this->belongsTo(Organizations::class, 'buyer_id');
    }
	
	public function toJson($options = 0)
{
    return parent::toJson($options | JSON_UNESCAPED_UNICODE);
}

}
