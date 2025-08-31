<?php

namespace Modules\ExternalSystemIntegration\Entities;

use Illuminate\Database\Eloquent\Model;

class ExternalSystem extends Model
{
    protected $table = 'external_systems';

    protected $fillable = [
        'name',
        'description',
        'base_url',
        'status'
    ];
}