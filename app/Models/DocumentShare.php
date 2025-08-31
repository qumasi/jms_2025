<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentShare extends Model
{
    protected $fillable = [
        'document_id',
        'shared_by',
        'shared_with',
        'shared_with_type',
        'permission_level',
        'expires_at',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function sharedBy()
    {
        return $this->belongsTo(User::class, 'shared_by');
    }
}
