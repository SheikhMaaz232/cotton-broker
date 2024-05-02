<?php

namespace App\Services;

    /*
     * Class BankService
     * @package App\Services
     * */

    use App\Bank;
    use Illuminate\Support\Facades\Input;

    class BankService
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
        $q = Bank::query();
        if (!empty($param['name']))
        {
            $q->where('name', 'LIKE', '%'. $param['name'] . '%');
        }
        if (!empty($param['account_title']))
        {
            $q->where('account_title', 'LIKE', '%'. $param['account_title'] . '%');
        }
        if (!empty($param['account_number']))
        {
            $q->where('account_number',  $param['account_number'] );
        }
        $banks = $q->orderBy('name', 'ASC')->paginate(Bank::PER_PAGE);

        return $banks;
    }

}
