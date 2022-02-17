<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function transactionDetail()
    {
        return $this->hasOne(TransactionDetail::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
