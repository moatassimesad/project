<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'city',
        'email',
        'phone',
        'address',
        'postCode',
        'store_id',
    ];
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
