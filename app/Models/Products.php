<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'img', 'content', 'user_id', 'category_id'];

    public function category(){
        return $this->hasOne(AdminController::class, 'id', 'category_id');
    }
}
