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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('asunto');
            $table->string('correo');
            $table->string('telefono');
            $table->date('fecha');
            $table->integer('dias');
            $table->date('fecha_proximo_seguimiento');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        //
    }
};
