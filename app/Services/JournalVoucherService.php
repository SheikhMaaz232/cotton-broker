<?php

namespace App\Services;

    /*
     * Class JournalVoucherService
     * @package App\Services
     * */

    use App\Models\JournalVoucher;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;

    class JournalVoucherService
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

        /*
      * Search cash Receipt voucher.
      * @param $param
      *
      * @return object $object.
      * */
        public function search($param)
        {
            $q = JournalVoucher::orderBy('jv_no', 'ASC');
            if (!empty($param['voucher_no']))
            {
                $q->where('jv_no', $param['voucher_no'] );
            }
            if (!empty($param['order_by']) && $param['order_by'] == 'jv_no')
            {
                $q->orderBy('jv_no', 'asc');
            }
            if (!empty($param['order_by']) && $param['order_by'] == 'created_at')
            {
                $q->orderBy('created_at', 'asc');
            }
            $vouchers = $q->paginate(JournalVoucher::PER_PAGE);

            return $vouchers;
        }
}