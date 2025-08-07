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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_post_usuario')
                    ->references('id')
                    ->on('usuario')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
            $table->string('titulo', 150);
            $table->string('slug', 150)->unique();
            $table->string('descripcion', 255);
            $table->text('contenido');
            $table->boolean('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
