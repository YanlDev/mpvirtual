<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentFile;
use App\Models\DocumentSequence;
use App\Models\DocumentTracking;
use App\Models\DocumentType;
use App\Models\StatusType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class DocumentController extends Controller
{

    /**
     * 📋 MOSTRAR LISTA DE DOCUMENTOS DEL USUARIO
     * Solo muestra documentos que pertenecen al usuario autenticado
     */

    public function index()
    {
        // $documents = Auth::user()->documents()
        //     ->with(['documentType', 'trackings.statusType', 'files'])
        //     ->latest()
        //     ->pagintate(10);
        // return view('user.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $documentTypes = DocumentType::where('active', true)->get();
        return view('user.documents.create', compact('documentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'files' => 'required|array|min:1', // Validar que se envíe al menos un archivo
            'files.*' => 'file|mimes:pdf,doc,docx,jpg,png|max:2048', // Validar archivos
        ]);

        try {
            // Garantizar que las operaciones de base de datos se realicen correctamente
            DB::beginTransaction();

            $document = Document::create([
                'user_id' => Auth::id(),
                'document_type_id' => $validatedData['document_type_id'],
                'tracking_code' => $this->generateTrackingCode(), // Generar un código de seguimiento único
                'subject' => $validatedData['subject'],
                'description' => $validatedData['description'],
            ]);

            // 📎 PROCESAR Y GUARDAR ARCHIVOS
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $this->storeDocumentfile($document, $file);
                }
            }
            $this->createInitialTracking($document);

            DB::commit();

            return redirect()
                ->route('user.dashboard');
        } catch (\Exception $e) {
            DB::rollBack();

            // 🗑️ LIMPIAR ARCHIVOS SI ALGO SALIÓ MAL
            $this->cleanupFiles($document ?? null);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Error al crear el documento. Intente nuevamente.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function generateTrackingCode(): string
    {
        $year = (int)date("Y");
        $month = (int)date("m");

        $sequential = DocumentSequence::getNextNumber($year, $month);

        $trackingCode = "MVP-{$year}-" .
            str_pad($month, 2, '0', STR_PAD_LEFT) . "-" .
            str_pad($sequential, 6, '0', STR_PAD_LEFT);

        return $trackingCode;
    }

    private function storeDocumentFile(Document $document, $file): DocumentFile
    {
        // 📂 CREAR ESTRUCTURA DE CARPETAS POR AÑO/MES
        $year = date('Y');
        $month = date('m');
        $folderPath = "documents/{$year}/{$month}";

        // 🔐 GENERAR NOMBRE ÚNICO PARA EL ARCHIVO
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::uuid() . '.' . $extension;

        // 💾 GUARDAR ARCHIVO EN STORAGE
        $filePath = $file->storeAs(
            $folderPath,
            $fileName,
            'private' // Usar disco privado para seguridad
        );

        // 📋 CREAR REGISTRO EN BASE DE DATOS
        return DocumentFile::create([
            'document_id' => $document->id,
            'file_name' => $fileName,
            'original_filename' => $originalName,
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'file_path' => $filePath,
        ]);
    }

    /**
     * 📊 CREAR SEGUIMIENTO INICIAL
     */
    private function createInitialTracking(Document $document): void
    {
        $initialStatus = StatusType::where('name', 'Recibido')->first();

        if ($initialStatus) {
            DocumentTracking::create([
                'user_id' => null, // Sistema automático
                'document_id' => $document->id,
                'status_id' => $initialStatus->id,
                'observations' => 'Documento recibido en mesa de partes virtual',
            ]);
        }
    }

    /**
     * 🗑️ LIMPIAR ARCHIVOS EN CASO DE ERROR
     */
    private function cleanupFiles(?Document $document): void
    {
        if ($document && $document->files) {
            foreach ($document->files as $file) {
                Storage::disk('private')->delete($file->file_path);
            }
        }
    }
}
