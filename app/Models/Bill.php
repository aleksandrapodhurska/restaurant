<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'booking_id',
        'table_id',
        'user_id',
        'status',
        'subtotal',
        'promo',
        'discount',
        'tax',
        'total',
        'tips',
        'balance',
        'comment'
    ];

    /**
     * Get bill's status
     */
    public function status()
    {
        return $this->belongsTo('App\Models\BillStatus');
    }

    /**
     * Get the table related to the booking
     */
    public function table()
    {
        return $this->belongsTo('App\Models\Table');
    }

    /**
     * Get the customer related to the bill
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * Get the user related to the bill
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the booking related to the bill
     */
    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');
    }

    /**
     * Get the transaction related to the bill
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    /**
     * Get the orders related to the bill
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * Get the jobs related to the bill
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
