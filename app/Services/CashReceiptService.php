<?php

namespace App\Services;

/*
 * Class CashReceiptService
 * @package App\Services
 * */

use App\Models\CashReceiptVoucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CashReceiptService
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
    * @return object $bpvList.
    * *
    */
    public function getCrvList()
    {
        $bpvList = CashReceiptVoucher::with(['project'])->paginate(CashReceiptVoucher::PER_PAGE);
        return $bpvList;
    }

    /*
  * Search cash Receipt voucher.
  * @param $param
  *
  * @return object $object.
  * */
    public function search($param)
    {
        $q = CashReceiptVoucher::with(['project'])->orderBy('crv_no', 'ASC');
        if (!empty($param['received_from']))
        {
            $q->where('received_from', 'LIKE', '%'. $param['received_from'] . '%');
        }
        if (!empty($param['voucher_no']))
        {
            $q->where('crv_no', $param['voucher_no'] );
        }
        if (!empty($param['order_by']) && $param['order_by'] == 'crv_no')
        {
            $q->orderBy('crv_no', 'asc');
        }
        if (!empty($param['order_by']) && $param['order_by'] == 'created_at')
        {
            $q->orderBy('created_at', 'ASC');
        }
        $vouchers = $q->paginate(CashReceiptVoucher::PER_PAGE);

        return $vouchers;
    }
}