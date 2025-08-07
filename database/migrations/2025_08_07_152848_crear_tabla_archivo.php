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
        Schema::create('archivo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('archivable_id');
            $table->string('archivable_type', 150);
            $table->string('ruta', 150);
            $table->string('extension', 10);
            $table->integer('peso');
            $table->boolean('local')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivo');
    }
};
