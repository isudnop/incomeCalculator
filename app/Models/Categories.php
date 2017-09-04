<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'group_id'];

    protected $table = 'category_group';

    protected $guarded = ['id'];
}
