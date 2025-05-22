<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); //Clave foranea a la tabla users
            $table->foreignId('document_type_id')->constrained('document_types')->onDelete('cascade'); //Clave foranea a la tabla document_types
            $table->string('tracking_code')->unique(); //Código de seguimiento del documento
            $table->string('subject'); //Asunto del documento
            $table->text('description')->nullable(); //Descripción del documento 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
