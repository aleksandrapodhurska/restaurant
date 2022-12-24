<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'menu_item_id',
        'comment',
        'status',
    ];

    /**
     * Menu item related to the job
     */
    public function menuItem()
    {
        return $this->belongsTo('App\Models\MenuItem');
    }

    /**
     * Order related to the job
     */
    public function order()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    /**
     * Bill related to the job
     */
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }
}
