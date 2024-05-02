<?php

namespace App\Services;

/*
 * Class CashPaymentService
 * @package App\Services
 * */

use App\Models\CashPaymentVoucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CashPaymentService
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
     * Get Bank Payment Vouchers list.
     * @return object $bpvList.
     * *
     */
    public function getCpvList()
    {
        $bpvList = CashPaymentVoucher::with(['project'])->paginate(CashPaymentVoucher::PER_PAGE);
        return $bpvList;
    }

    /*
   * Search cash payment voucher.
   * @param $param
   *
   * @return object $object.
   * */
    public function search($param)
    {
        $q = CashPaymentVoucher::with(['project'])->orderBy('cpv_no', 'ASC');
        if (!empty($param['paid_to']))
        {
            $q->where('paid_to', 'LIKE', '%'. $param['paid_to'] . '%');
        }
        if (!empty($param['voucher_no']))
        {
            $q->where('cpv_no', $param['voucher_no'] );
        }
        if (!empty($param['order_by']) && $param['order_by'] == 'cpv_no')
        {
            $q->orderBy('cpv_no', 'asc');
        }
        if (!empty($param['order_by']) && $param['order_by'] == 'created_at')
        {
            $q->orderBy('created_at', 'ASC');
        }
        $vouchers = $q->paginate(CashPaymentVoucher::PER_PAGE);

        return $vouchers;
    }
}