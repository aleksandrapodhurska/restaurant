<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'menu_item_id',
        'quantity',
        'price',
        'total',
        'discount',
    ];

    /**
     * Bill related to the order
     */
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

    /**
     * Menu item related to the order
     */
    public function menuItem()
    {
        return $this->belongsTo('App\Models\MenuItem');
    }

    /**
     * Menu item related to the order
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Models\Job');
    }
}
