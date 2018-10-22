<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'account_id', 'transact_date', 'amount', 'payment_method'
    ];
}
