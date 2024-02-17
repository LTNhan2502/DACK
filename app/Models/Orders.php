<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'status'];

    public function customers(){
        return $this->hasOne(Customers::class, 'id', 'customer_id');
    }
}
