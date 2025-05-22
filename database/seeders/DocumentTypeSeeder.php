<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            [
                'name' => 'Solicitud de Información',
                'description' => 'Solicitud de acceso a información pública',
                'active' => true
            ],
            [
                'name' => 'Reclamo',
                'description' => 'Presentación de reclamos por servicios',
                'active' => true
            ],
            [
                'name' => 'Sugerencia',
                'description' => 'Sugerencias para mejora de servicios',
                'active' => true
            ],
            [
                'name' => 'Petición',
                'description' => 'Peticiones generales a la institución',
                'active' => true
            ],
            [
                'name' => 'Certificado',
                'description' => 'Solicitud de certificados diversos',
                'active' => true
            ]
        ];

        foreach($documentTypes as $type){
            DocumentType::create($type);
        }

    }
}
