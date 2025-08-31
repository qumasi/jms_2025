<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'case_number',
        'title',
        'description',
        'status',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class, 'case_id');
    }
}
