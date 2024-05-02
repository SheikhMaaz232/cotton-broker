<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovtDocumentMas extends Model
{
    const PER_PAGE = 10;

    const FILE_PATH = 'uploads/documents/govt-documents/';

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $table = 'govt_documents_mas';

    public $fillable = ['date','type','department', 'description'];

    public function getDepartmentSubType()
    {
        return $this->hasOne(DocumentSubType::class, 'id', 'type');
    }

    public function getDepartment()
    {
        return $this->hasOne(DocumentType::class, 'id', 'department');
    }
}
