<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryGroup extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $table = 'category_group';

    protected $guarded = ['id'];
}
