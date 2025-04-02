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
        
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
    
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['tipo_documento_id']);
            $table->dropColumn('tipo_documento_id');
        });

        Schema::dropIfExists('tipo_documentos');
    }
};
