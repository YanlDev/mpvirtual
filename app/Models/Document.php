<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'document_type_id',
        'tracking_code',
        'subject',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function files()
    {
        return $this->hasMany(DocumentFile::class);
    }

    public function trackings()
    {
        return $this->hasMany(DocumentTracking::class);
    }
}
