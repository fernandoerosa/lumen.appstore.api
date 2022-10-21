<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property int $id
 * @property string $app_name
 * @property string $package_name
 * @property string $version_number
 * @property string $version_code
 * @property string $last_update
 * @property string $description
 * @property string $path
 * @property string $icon
 */
class App extends Model
{
    protected $table = 'apps';
    protected $fillable = [
        'app_name',
        'package_name',
        'version_number',
        'version_code',
        'last_update',
        'description',
        'path',
        'icon'];
}
