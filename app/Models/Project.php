<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    const PER_PAGE = 10;
    const FILE_PATH = 'uploads/projects/';

    protected $fillable = [
        'f_year_id', 'company_id', 'name','abbreviation','code','donor_id','tentative_start_date','tentative_end_date','estimated_cost','actual_start_date','actual_end_date','remarks','created_by','updated_by'
    ];

    public function company(){
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
