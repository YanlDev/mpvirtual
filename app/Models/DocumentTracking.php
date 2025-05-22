<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentTracking extends Model
{
    protected $fillable = [
        'user_id',
        'document_id',
        'status_id',
        'observations',
    ];

    public function statusType()
    {
        return $this->belongsTo(StatusType::class, 'status_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
