<?php

namespace App\CouponApp\Modules\Categories\Web\Models;

use App\CouponApp\BaseCode\Models\BaseModel;
use App\CouponApp\Modules\Stores\Web\Models\Store;
use Spatie\QueryBuilder\AllowedFilter;
use TCG\Voyager\Facades\Voyager;
use App\CouponApp\BaseCode\Translatable;

class Category extends BaseModel
{
    use Translatable;

    protected $appends = ['formatted_translations'];


    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'order',
        'name',
        'slug',
        'logo',
        'is_featured'
    ];

    function getDefaultListingFields()
    {
        return ['id','name'];
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function getAllowedFilters()
    {
        return [
            AllowedFilter::exact('parent_id'),
            AllowedFilter::exact('order'),
            AllowedFilter::exact('name'),
            AllowedFilter::exact('slug'),
            AllowedFilter::exact('is_featured'),
        ];
    }

    public function getAllowedIncludes()
    {
        return ['translations','parent', 'children','stores']; // TODO: Change the autogenerated stub
    }
}
