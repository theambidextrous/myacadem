<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderid',
        'user_timezone',
        'type_of_work',
        'subject',
        'work_level',
        'work_pages',
        'work_spacing',
        'work_urgency',
        'user_email',
        'user_phone',
        'order_amount',
        'work_topic',
        'work_instructions',
        'work_references',
        'work_format',
        'paylog',
        'paid',
        'pay_amount',
        'content',
        'edit_link',
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
