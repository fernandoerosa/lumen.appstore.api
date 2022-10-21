<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Terminal extends Model
{
    protected $table = 'terminals';
    protected $fillable = [
        'id',];
}
