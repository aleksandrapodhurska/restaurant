<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'src',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['filename'];

    /**
     * MenuItems that are related to this category
     */
    public function menuItems()
    {
        return $this->hasMany('App\Models\MenuItem');
    }

    /**
     * Menus that are related to this category
     */
    public function menus()
    {
        return $this->hasMany('App\Models\Menu');
    }

    /**
     * Get only file name
     *
     * @return string
     */
    public function getFilenameAttribute()
    {
        return str_replace('/storage/images/', '', $this->src);
    }
}
