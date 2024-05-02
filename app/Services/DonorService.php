<?php

namespace App\Services;

    /*
     * Class DonorService
     * @package App\Services
     * */

    use App\Models\Donor;
    use Illuminate\Support\Facades\Input;

    class DonorService
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

        /*
       * Search donor.
       * @param $param
       *
       * @return object $object.
       * */
        public function search($param)
        {
            $q = Donor::query();
            if (!empty($param))
            {
                $q->where('name', 'LIKE', '%'. $param . '%');
            }
            $donors = $q->orderBy('name', 'ASC')->paginate(Donor::PER_PAGE);

            return $donors;
        }

}