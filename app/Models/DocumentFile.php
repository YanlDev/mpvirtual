<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    protected $fillable = [
        'document_id',
        'file_name',
        'original_filename',
        'mime_type',
        'file_size',
        'file_path',
    ];

    protected $casts = [
        'file_size' => 'integer',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    // Verificar si es un documento valido

    public function isValidDocument()
    {
        $allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
        return in_array($this->mime_type, $allowedTypes);
    }


    public function getReadableSize() {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < 3; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 1) . ' ' . $units[$i];
    }
}
