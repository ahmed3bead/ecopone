<?php

namespace App\CouponApp\Modules\Occasions\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Countries\Web\Models\Country;
use App\CouponApp\Modules\Coupons\Web\Models\Coupon;
use Carbon\Carbon;

class Occasion extends BaseModel
{


    // Hidden fields for array representation
    protected $hidden = [
        // Add fields you want to hide
    ];

    // Cast attributes to specific types
    protected $casts = [
        'start_at' => 'date',
        'end_at' => 'date',
    ];
    protected $fillable = ['name', 'description', 'background_image', 'background_color', 'start_at', 'end_at'];

    // Many-to-many relationship with Coupons
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_occasion');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1)->where('end_at', '>=', Carbon::today());
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function isExpired()
    {
        return $this->end_at < Carbon::today();
    }
}
