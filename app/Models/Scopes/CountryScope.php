<?php

namespace App\Models\Scopes;

use App\CouponApp\Modules\Countries\Web\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Schema;

class CountryScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Schema::hasColumn($model->getTable(), 'country_id')) {
                $builder->where('country_id', app('country_id'));
        }

    }

    private function getCountryId()
    {
        if (CustomerAuth()->check()) {
            return app('country_id');
        }
        // Default country ID logic
        return $this->getDefaultCountryId();
    }

    private function getDefaultCountryId()
    {
        // Implement logic to get default country ID by country code
        $defaultCountryCode = config('app.default_country_code'); // Example default country code
        $country = Country::where('code', $defaultCountryCode)->first();
        return $country?->id;
    }
}
