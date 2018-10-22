<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name','account_number', 'parent_id'
    ];

    public function incomes(){
        return $this->belongsTo(Income::class);
    }

    public function outcomes(){
        return $this->belongsTo(Income::class);
    }
}
