<?php

namespace App\Models;

use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tables';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'status',
        'show'
    ];

    /**
     * Bookings related to the table
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    /**
     * Past bookings related to the table
     */
    public function pastBookings()
    {
        $nowDateTime = Carbon::now()->toDateString();
        return $this->hasMany('App\Models\Booking')->where('date', '>', $nowDateTime);
    }

    /**
     * Future bookings related to the table
     */
    public function futureBookings()
    {
        $nowDateTime = new DateTime();
        return $this->hasMany('App\Models\Booking')->where('date', '<', $nowDateTime);
    }

    /**
     * Billa related to the table
     */
    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }
}
