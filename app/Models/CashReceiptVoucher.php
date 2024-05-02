<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashReceiptVoucher extends Model
{
    const PER_PAGE = 10;
    const FILE_PATH = 'uploads/vouchers/crv/';

    protected $guarded = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

}
