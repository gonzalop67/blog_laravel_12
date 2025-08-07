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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'fk_posttag_post')
                ->references('id')
                ->on('post')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'fk_posttag_tag')
                ->references('id')
                ->on('tag')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
