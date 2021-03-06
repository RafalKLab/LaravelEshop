<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'manufacturer_id', 'code', 'price', 'description', 'lt_description','image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function getPriceCount(){
        if(!is_null($this->pivot->count)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
