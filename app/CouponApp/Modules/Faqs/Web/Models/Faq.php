<?php

namespace App\CouponApp\Modules\Faqs\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\FaqCategories\Web\Models\FaqCategory;
use TCG\Voyager\Traits\Translatable;

class Faq extends BaseModel
{
    use Translatable;

    protected $appends = ['formatted_translations'];


    protected $translatable = ['slug','name','question','answer'];

    protected $fillable = [
        'name','slug','question','answer','is_active','faq_category_id'
    ];

    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class);
    }


    // Hidden fields for array representation
    protected $hidden = [
        // Add fields you want to hide
    ];

    // Cast attributes to specific types
    protected $casts = [
        // Add your casts here
    ];

    public function getAllowedIncludes()
    {
        return ['faqCategory'];
    }
}
