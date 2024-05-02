<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentSubType extends Model
{

    protected $table = 'document_sub_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'document_type_id'
    ];
}
