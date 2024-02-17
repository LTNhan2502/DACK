<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price', 'img', 'content', 'category_id'];
    protected $connection = 'mysql';
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function category(){
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    //Localscope
    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
