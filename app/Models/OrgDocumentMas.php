<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgDocumentMas extends Model
{
    const PER_PAGE = 10;

    const FILE_PATH = 'uploads/documents/org-documents/';
    
    protected $guarded = ['id'];

    public $timestamps = false;

    public $fillable = ['date','type','dept_id', 'description'];

    protected $table = 'org_documents_mas';

    public function getDepartmentSubType()
    {
        return $this->hasOne(DocumentSubType::class, 'id', 'type');
    }

    public function getDepartment()
    {
        return $this->hasOne(DocumentType::class, 'id', 'department');
    }
}
