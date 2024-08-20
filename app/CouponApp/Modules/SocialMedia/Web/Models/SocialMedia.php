<?php

namespace App\CouponApp\Modules\SocialMedia\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;

class SocialMedia extends BaseModel
{
    protected $table = 'social_medias';
    protected $fillable = [
        // Your fillable attributes
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
