<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportLog extends BaseModel
{
    use HasFactory;

    protected $fillable = ['start', 'end', 'status', 'source', 'created_at', 'updated_at'];
}
