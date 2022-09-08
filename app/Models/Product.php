<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'sku', 'price', 'created_at', 'updated_at'];
}
