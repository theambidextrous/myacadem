<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // <option id="243" name="1 hour" value="243" selected="" hours="1" 
    // xp_max_pages="1.15" max_pages="3" xp_min_pages="1.04" min_pages="1" 
    // price_percent="1.6" visible_from_pages="1" deadline="Tue, Dec 15">
    // 1 hour / Tue, Dec 15</option>
    protected $fillable = [
        'name',
        'alias',
        'hours',
        'xp_max_pages',
        'max_pages',
        'xp_min_pages',
        'min_pages',
        'factor',
        'visible_from_pages',
        'is_active',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
