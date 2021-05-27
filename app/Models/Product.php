<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'reference',
        'price',
        'quantity',
        'shippingCost',
        'description',
        'image',
        'collection_id',
        'store_id',
        'colors',
    ];
    public function providers(){
        return $this->belongsToMany(Provider::class)->withPivot('quantity','unitCost')->withTimestamps();
    }
    public function collection(){
        return $this->belongsTo(Collection::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
