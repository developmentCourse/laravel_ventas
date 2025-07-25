<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('ci')->unique();
            $table->string('nombre_completo');
            $table->string('email')->unique();
            $table->string('rol');
            $table->unsignedBigInteger('id_turno')->nullable();
            $table->timestamps();

            $table->foreign('id_turno')->references('id')->on('turnos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
