<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'amount',
        'mode_id',
        'status'
    ];

    /**
     * Transaction mode selected for a transaction
     */
    public function transactionMode()
    {
        return $this->hasMany('App\Models\TransactionMode');
    }

    /**
     * Bill associated with a transaction
     */
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

}
