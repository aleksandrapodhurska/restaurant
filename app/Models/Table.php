<?php

namespace App\Models;

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
    // TODO ?????
    /**
     * MenuItems that are related to this category
     */
    public function status()
    {
        return $this->belongsToMany('App\Models\Status');
    }
}
