<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovtDocumentDet extends Model
{
    const PER_PAGE = 10;
    
    protected $guarded = ['id'];

    public $timestamps = false;

    public $fillable = ['file_name','doc_mas_id'];

    protected $table = 'govt_documents_det';

    
}
