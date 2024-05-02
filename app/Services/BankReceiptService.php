<?php

namespace App\Services;

    /*
     * Class BankReceiptService
     * @package App\Services
     * */

    use App\Models\BankReceiptVoucher;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;

    class BankReceiptService
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
        * Get Bank Receipt Vouchers list.
        * @return object $brvList.
        * *
        */
        public function getBpvList()
        {
            $brvList = BankReceiptVoucher::with(['project', 'bank'])->orderBy('id', 'DESC')->paginate(BankReceiptVoucher::PER_PAGE);
            return $brvList;
        }

        /*
     * Search donor.
     * @param $param
     *
     * @return object $object.
     * */
        public function search($param)
        {
            $q = BankReceiptVoucher::with(['project', 'bank'])->orderBy('brv_no', 'ASC');
            if (!empty($param['paid_to']))
            {
                $q->where('paid_to', 'LIKE', '%'. $param['paid_to'] . '%');
            }
            if (!empty($param['voucher_no']))
            {
                $q->where('brv_no', $param['voucher_no'] );
            }
            if (!empty($param['order_by']) && $param['order_by'] == 'brv_no')
            {
                $q->orderBy('brv_no', 'ASC');
            }
            if (!empty($param['order_by']) && $param['order_by'] == 'voucher_date')
            {
                $q->orderBy('created_at', 'ASC');
            }
            $vouchers = $q->paginate(BankReceiptVoucher::PER_PAGE);

            return $vouchers;
        }
    
}