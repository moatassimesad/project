<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'facebookLink',
        'twitterLink',
        'storeActivityType',
        'createdAt',
        'designName',
        'image_top',
        'image_bottom',
        'user_id',
    ];
    public function collections(){

        return $this->hasMany(Collection::class);
    }
    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function providers(){
        return $this->hasMany(Provider::class);
    }
}
