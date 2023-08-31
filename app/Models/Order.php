<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingStatus;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'recipient_address',
        'shipping_address',
        'shipping_date',
        'expected_delivery_date',
    ];

    public function shipping()
    {
        return $this->hasOne(ShippingStatus::class, 'order_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'order_id', 'id');
    }

}
