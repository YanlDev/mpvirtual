<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

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
        dd($request->all());
        
        // Aquí se guardaría el documento y sus archivos asociados

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
}
