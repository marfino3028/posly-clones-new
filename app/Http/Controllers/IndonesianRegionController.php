<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndonesianRegionController extends Controller
{
    function getProvince(){
        $province = \Indonesia::findProvince();
        return response()->json($province);
    }
    public function getCity(Request $request, $provinceId)
    {
        $cities = \Indonesia::findProvince($provinceId, ['cities']);
        return response()->json($cities);
    }

    public function getDistrict(Request $request, $cityId)
    {
        $districts = \Indonesia::findCity($cityId, ['districts']);
        return response()->json($districts);
    }

    public function getSubDistrict(Request $request, $districtId)
    {
        $subdistricts = \Indonesia::findDistrict($districtId, ['villages']);
        return response()->json($subdistricts);
    }
}
