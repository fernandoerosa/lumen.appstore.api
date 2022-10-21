<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Version extends Model
{
    protected $table = 'versions';
    protected $fillable = [
        'id',];
}
