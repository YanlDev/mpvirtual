<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function documentTracking()
    {
        return $this->hasMany(DocumentTracking::class, 'status_id');
    }
}
