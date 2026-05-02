<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['rice_item_id', 'quantity', 'total_amount', 'payment_status'];

    public function riceItem() 
    {
        return $this->belongsTo(RiceItem::class);
    }

    public function payment() 
    {
        return $this->hasOne(Payment::class);
    }
}