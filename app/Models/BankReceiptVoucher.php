<?php

namespace App\Models;

use App\Bank;
use Illuminate\Database\Eloquent\Model;

class BankReceiptVoucher extends Model
{
    const PER_PAGE = 10;
    const FILE_PATH = 'uploads/vouchers/brv/';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'bank_id', 'f_year_id','bpv_no','cheque_no','account_no','paid_to','date','wht','description','amount','created_by','updated_by'
    ];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
