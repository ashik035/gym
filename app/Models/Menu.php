<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    protected $table = 'menu';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'menu',
        'sub_menu',
    ];
}
