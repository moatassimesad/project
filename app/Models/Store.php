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
        'createdAt',
        'client_id',
        'client_secret',
        'designName',
        'image_top',
        'image_bottom',
        'textLayer_top',
        'textLayer_bottom',
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
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function providers(){
        return $this->hasMany(Provider::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function clients(){
        return $this->hasMany(Client::class);
    }

}
