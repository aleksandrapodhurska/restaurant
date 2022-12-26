<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'first_name',
        'family_name',
        'email',
        'phone',
        'comments',
        'discount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'comments',
        'created_at',
        'updated_at',
    ];

    /**
     * Bookings related to this customer
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    /**
     * The latest booking that are related to this customer
     */
    public function upcomingBooking()
    {
        return $this->hasMany('App\Models\Booking')->where('status', '=', 'confirmed')->latest()->first();
    }

    /**
     * Bills related to this customer
     */
    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }

    /**
     * Open bill that is related to this customer
     */
    public function bill()
    {
        return $this->hasMany('App\Models\Bill')->where('status', '=', 'open')->latest()->first();
    }

    /**
     * Orders related to this customer
     */
    public function orders()
    {
        return $this->hasManyThrough('App\Models\Bill', '\App\Models\Order');
    }
}
