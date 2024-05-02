<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgDocumentDet extends Model
{
    const PER_PAGE = 10;
    
    protected $guarded = ['id'];

    public $timestamps = false;

    public $fillable = ['file_name','doc_mas_id'];

    protected $table = 'org_documents_det';
}
