<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'name',
        'image',
        'store_id',
    ];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
