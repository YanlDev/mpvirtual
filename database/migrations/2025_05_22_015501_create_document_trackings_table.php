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
        Schema::create('document_trackings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade'); //Clave foranea a la tabla documents
            $table->foreignId('status_id')->constrained('status_types')->onDelete('cascade'); //Clave foranea a la tabla status_types
            $table->string('observations')->nullable(); //Observación del seguimiento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_trackings');
    }
};
