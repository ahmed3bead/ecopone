<?php

namespace App\Http\Middleware;

use App\CouponApp\Modules\Countries\Web\Models\Country;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Extract the countryCode from the headers
        $countryCode = $request->header('countryCode');

        if ($countryCode) {
            // Retrieve the country ID from the database
            $country = Country::where('code', $countryCode)->select(['id','name','code'])->first();
            if ($country) {
                // Share the country ID across the application
                app()->instance('country_id', $country->id);
            } else {
                $country = Country::query()->select(['id','name','code'])->first();
                app()->instance('country_id', $country->id);

            }
        } else {
            $country = Country::query()->select(['id','name','code'])->first();
            app()->instance('country_id', $country->id);
        }

        return $next($request);
    }
}
