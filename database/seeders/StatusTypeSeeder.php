<?php

namespace Database\Seeders;

use App\Models\StatusType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusTypes = [
            [ 
                'name' => 'Recibido',
                'description' => 'Documento recibido en mesa de partes',
            ],
            [
                'name' => 'En Proceso',
                'description' => 'Documento en revisión'
            ],
            [
                'name' => 'Derivado',
                'description' => 'Documento derivado a área competente'
            ],
            [
                'name' => 'Observado',
                'description' => 'Documento con observaciones que requieren corrección'
            ],
            [
                'name' => 'Resuelto',
                'description' => 'Documento procesado y resuelto'
            ],
            [
                'name' => 'Archivado',
                'description' => 'Documento archivado'
            ]
        ];

        foreach ($statusTypes as $status) {
            StatusType::create($status);
        }

    }
}
