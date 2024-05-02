<?php

namespace App\Services;

/*
 * Class ProjectService
 * @package App\Services
 * */

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectService
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
        * Get list of companies.
        * @param $request
        *
        * @return array $data.
        * */
    public function getProjects()
    {
        return Project::pluck('name', 'id');
    }

    public function dataArray($request)
    {
        $data = $request->except('_token','file');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['tentative_start_date'] = Carbon::parse($request['tentative_start_date'])->format('Y-m-d');
        $data['tentative_end_date'] = Carbon::parse($request['tentative_end_date'])->format('Y-m-d');
        $data['actual_start_date'] = Carbon::parse($request['actual_start_date'])->format('Y-m-d');
        $data['actual_end_date'] = Carbon::parse($request['actual_end_date'])->format('Y-m-d');

        return $data;
    }

    /*
     * Get Projects list.
     * @return object $projectsList.
     * *
     */
    public function getBpvList()
    {
        $projectsList = Project::with(['company'])->paginate(Project::PER_PAGE);
        return $projectsList;
    }

}