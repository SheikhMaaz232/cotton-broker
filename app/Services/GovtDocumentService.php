<?php

namespace App\Services;
    /*
     * Class GovtDocumentService
     * @package App\Services
     * */

    use App\Models\GovtDocumentMas;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;

    class GovtDocumentService
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

        foreach ($data as $property => $value){
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }

        public function dataArray($request)
        {
            $data = $request->except('_token','file');
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data['date'] = Carbon::parse($request['date'])->format('Y-m-d');

            return $data;
        }

        public function dataArrayDocDet($rec, $file)
        {
            $data['file_name'] = $file;
            $data['doc_mas_id'] = $rec->id;

            return $data;
        }

        /*
       * Search donor.
       * @param $param
       *
       * @return object $object.
       * */
        public function search($param)
        {
            $q = GovtDocumentMas::with(['getDepartmentSubType', 'getDepartment']);
            if (!empty($param))
            {
                $q->where('description', 'LIKE', '%'. $param['name'] . '%');
            }
            $documents = $q->orderBy('description', 'DESC')->paginate(GovtDocumentMas::PER_PAGE);

            return $documents;
        }

        /*
        * Get Bank Payment Vouchers list.
        * @return object $bpvList.
        * *
        */
        public function getDocumentsList()
        {
            $docsList = GovtDocumentMas::with(['getDepartmentSubType', 'getDepartment'])
                ->paginate(GovtDocumentMas::PER_PAGE);
            return $docsList;
        }
}