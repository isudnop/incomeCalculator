<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['memo','amount','transaction_type','category_id'];

    protected $table = 'transaction';

}
