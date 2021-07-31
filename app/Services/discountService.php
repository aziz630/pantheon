<?php

namespace App\Services;

use App\Models\DiscountStudent;


class discountService
{


    /**
     * 
     * Read all sections
     * */

    public function get_all_discount()
    {
        $discount = false;

        if ($data = DiscountStudent::all()) {
            $discount = $data;
        }

        return $discount;
    }


    
}
