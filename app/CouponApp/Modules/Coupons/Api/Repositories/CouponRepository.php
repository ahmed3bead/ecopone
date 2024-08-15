<?php

namespace App\CouponApp\Modules\Coupons\Api\Repositories;

use App\CouponApp\BaseCode\Repositories\BaseRepository;
use App\CouponApp\Modules\CouponReactions\Api\Models\CouponReaction;
use App\CouponApp\Modules\Coupons\Api\Models\Coupon;
use App\CouponApp\Modules\FavouriteCoupons\Api\Models\FavouriteCoupon;

class CouponRepository extends BaseRepository
{
    public function __construct(Coupon $model)
    {
        parent::__construct($model);
    }

    public function addToFavourite($id)
    {
        return $this->find($id)->addToFavorites();
    }

    public function removeFromFavorites($id)
    {
        return $this->find($id)->removeFromFavorites();
    }

    public function addNewReaction($data, $id)
    {
        $coupon = $this->find($id);
        $dataToSave = [
            'coupon_id' => $coupon->id,
            'customer_id' => CustomerAuth()->id(),
            'store_id' => $coupon->store_id,
            'country_id' => $coupon->country_id,
        ];
        $data = array_merge($data, $dataToSave);
        CouponReaction::create($data);
        return $coupon;
    }

}
