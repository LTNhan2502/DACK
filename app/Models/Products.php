<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price', 'img', 'content', 'category_id'];

    public function category(){
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
}
