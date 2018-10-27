<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    protected $fillable = [
        'account_id', 'transact_date', 'amount', 'payment_method'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function getPriceForHumansAttribute()
    {
        return 'Rp. ' . number_format($this->amount);
    }
}
