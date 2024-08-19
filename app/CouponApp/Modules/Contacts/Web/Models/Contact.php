<?php

namespace App\CouponApp\Modules\Contacts\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;

class Contact extends BaseModel
{
    protected $fillable = [
        'email',
        'full_name',
        'reason',
        'message',
        'phone',
    ];


    // Hidden fields for array representation
    protected $hidden = [
        // Add fields you want to hide
    ];

    // Cast attributes to specific types
    protected $casts = [
        // Add your casts here
    ];
}
