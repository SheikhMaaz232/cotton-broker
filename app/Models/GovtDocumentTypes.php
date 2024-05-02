<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovtDocumentTypes extends Model
{
    protected $table = 'govt_document_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
