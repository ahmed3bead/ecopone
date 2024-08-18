<?php

namespace App\CouponApp\BaseCode;

use TCG\Voyager\Traits\Translatable as TranslatableTrait;

trait Translatable
{
    use TranslatableTrait;
    public function getFormattedTranslationsAttribute()
    {
        $translations = $this->translations()->get();
        $formatted = [];

        foreach ($translations as $translation) {
            if (!isset($formatted[$translation->locale])) {
                $formatted[$translation->locale] = [];
            }
            $formatted[$translation->locale][$translation->column_name] = $translation->value;
        }

        return $formatted;
    }
}
