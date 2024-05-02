<?php

namespace App\Services;

/*
 * Class CompanyService
 * @package App\Services
 * */

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyService
{
    /*
     * Store company data.
     * @param $model
     * @param $where
     * @param $data
     *
     * @return object $object.
     * */
    public function findUpdateOrCreate($model, array $where, array $data)
    {
        $object = $model::firstOrNew($where);

        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }

    /*
     * prepare company data.
     * @param $request
     *
     * @return array $data.
     * */
    public function dataArray($request)
    {
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['name'] = $request['name'];
        $data['contact_number'] = $request['contact_number'];
        $data['email'] = $request['email'];
        $data['focal_person'] = $request['focal_person'];
        $data['postal_address'] = $request['postal_address'];
        $data['website'] = $request['website'];

        return $data;
    }

    /*
        * Get list of companies.
        * @param $request
        *
        * @return array $data.
        * */
    public function getCompanies()
    {
        return Company::pluck('name','id');
    }


}