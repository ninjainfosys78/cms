<?php

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\FeatureActivation;
use App\Models\File;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;



// if (! function_exists('officeSetting')) {
//     function officeSetting(?int $ward = null)
//     {
//         $officeSettings = Cache::rememberForever('office_setting', function () {
//             if (Schema::hasTable('office_settings')) {

//                 return OfficeSetting::with('fiscalYear', 'province', 'district', 'localBody')->first();
//             }
//         });

//         if (empty($ward)) {

//             return $officeSettings?->whereNull('ward_no')->first();
//         } else {
//             return $officeSettings?->where('ward_no', $ward)->first();
//         }
//     }
// }


if (! function_exists('get_provinces')) {
    function get_provinces(?int $provinceId = null)
    {
        $provinces = Cache::rememberForever('provinces', function () {
            if (Schema::hasTable('provinces')) {
                return Province::all();
            }

            return [];
        });
        if ($provinceId !== null) {
            $provinces = $provinces->where('id', $provinceId)->first();
        }

        return $provinces ?? [];
    }
}

if (! function_exists('get_districts')) {
    function get_districts($province_ids = [], ?int $districtId = null)
    {
        $province_ids = is_array($province_ids) ? $province_ids : [$province_ids];
        $allDistricts = Cache::rememberForever('allDistricts', function () {
            if (Schema::hasTable('districts')) {
                return District::orderBy('province_id')->get();
            }

            return [];
        });
        if (! empty($province_ids)) {
            $allDistricts = $allDistricts->whereIn('province_id', $province_ids);
        }
        if ($districtId !== null) {
            $allDistricts = $allDistricts->where('id', $districtId)->first();
        }

        return $allDistricts ?? [];
    }
}

if (! function_exists('get_local_bodies')) {
    function get_local_bodies($district_ids = [], ?int $localBodyId = null)
    {
        $district_ids = is_array($district_ids) ? $district_ids : [$district_ids];
        $allLocalBodies = Cache::rememberForever('localBodies', function () {
            if (Schema::hasTable('local_bodies')) {
                return LocalBody::all();
            }

            return [];
        });
        if (! empty($district_ids)) {
            $allLocalBodies = $allLocalBodies->whereIn('district_id', $district_ids);
        }
        if ($localBodyId !== null) {
            $allLocalBodies = $allLocalBodies->where('id', $localBodyId)->first();
        }

        return $allLocalBodies ?? [];
    }
}

if (! function_exists('getArrayKeys')) {
    function getArrayKeys($array = []): array
    {
        $keys = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $keys = array_merge($keys, getArrayKeys($value));
            } else {
                $keys[] = $key;
            }
        }

        return array_unique($keys);
    }



}
