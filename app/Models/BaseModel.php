<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 3:25 PM
 */

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BaseModel extends Model
{
    use HasFactory;

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
