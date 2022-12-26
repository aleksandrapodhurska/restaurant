<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use HasFactory, SoftDeletes;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'name',
        'description',
        'image_id',
        'price',
        'quantity',
        'unit_of_measure',
        'show'
    ];

    /**
     * The parent of the menu.
     */
    public function relatedMenu()
    {
        return $this->belongsToMany('App\Models\Menu');
    }

    /**
     * The image that belong to the menu.
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }

    /**
     * Categories associated with the MenuItem.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * Orders associated with the MenuItem.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * Jobs associated with the MenuItem.
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
