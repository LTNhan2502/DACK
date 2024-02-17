<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    //Localscope
    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
