<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'table_id',
        'date',
        'time',
        'description',
        'adults',
        'children',
        'infants',
        'status'
    ];

    /**
     * Get booking's status
     */
    public function status()
    {
        return $this->belongsTo('App\Models\BookingStatus');
    }
    /**
     * Get booking's bill
     */
    public function bill()
    {
        return $this->hasOne('App\Models\Bill');
    }

    /**
     * Get the table related to the booking
     */
    public function table()
    {
        return $this->belongsTo('App\Models\Table');
    }

    /**
     * Get the customer related to booking
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * Get quantity of people in the booking
     */
    public function people_quantity()
    {
        return $this->adults + $this->children + $this->infants;
    }
}
