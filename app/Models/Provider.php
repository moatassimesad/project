<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Provider extends Model
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
        'phone',
        'address',
        'store_id',
    ];
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity','unitCost')->withTimestamps();
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
    public function run() {

        Provider::factory()
            ->count(50)
            ->create();

    }
}
