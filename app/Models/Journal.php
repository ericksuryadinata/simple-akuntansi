<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'transact_date','account_id','debt','credit'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function getCreditPriceForHumansAttribute(){
        return "Rp. ".number_format($this->credit);
    }

    public function getDebtPriceForHumansAttribute(){
        return "Rp. ".number_format($this->debt);
    }
}
