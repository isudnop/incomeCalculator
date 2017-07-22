<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['memo','amount','transaction_type','category_id', 'transaction_date'];

    protected $table = 'transaction';

    protected $guarded = ['id'];

    protected $casts = ['transaction_date' => 'date'];

    public function category() : belongsTo
    {
        return $this->belongsTo('\App\Model\Categoeries', 'category_id', 'id');
    }
}
