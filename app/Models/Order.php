<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'payedTotal',
        'delivery_id',
        'store_id',
        'client_id',
    ];
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity','unitCost','shippingCost','color')->withTimestamps();
    }
    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
