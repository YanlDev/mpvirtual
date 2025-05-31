<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentSequence extends Model
{
    protected $fillable = [
        'year',
        'month',
        'last_number',
    ];

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
        'last_number' => 'integer',
    ];

    /**
     * Obtener el siguiente número para un año/mes específico
     * 
     * @param int $year
     * @param int $month
     * @return int
     */

    public static function getNextNumber(int $year, int $month): int
    {
        // Buscar o crear la secuencia para el año y mes especificados
        $sequence = self::firstOrCreate(
            ['year' => $year, 'month' => $month],
            ['last_number' => 0]
        );
        // Incrementar el último número y guardarlo
        $sequence->increment('last_number');
        return $sequence->fresh()->last_number;
    }
    
    /**
     * 📊 Obtener estadísticas de documentos por mes
     * 
     * @param int $year
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getYearStats(int $year)
    {
        return self::where('year', $year)
            ->orderBy('month')
            ->get();
    }

    /**
     * 🗑️ Limpiar secuencias de años antiguos (opcional)
     * 
     * @param int $yearsToKeep
     * @return int
     */
    public static function cleanup(int $yearsToKeep = 5): int
    {
        $cutoffYear = now()->year - $yearsToKeep;

        return self::where('year', '<', $cutoffYear)->delete();
    }
}
