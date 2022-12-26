<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent',
        'name',
        'description',
        'image_id',
        'is_exclusive',
        'show'
    ];

    /**
     * The parent of the menu.
     */
    public function relatedParent()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'parent');
    }

    /**
     * The image that belong to the menu.
     */
    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }

    /**
     * The image that belong to the menu.
     */
    public function menuItems()
    {
        return $this->belongsToMany('App\Models\MenuItem');
    }
}
