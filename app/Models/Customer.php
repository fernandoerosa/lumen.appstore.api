<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['id'];
}
