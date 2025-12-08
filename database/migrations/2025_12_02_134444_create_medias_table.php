<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('medias', function (Blueprint $table) {
        $table->id();
        $table->string('chemin');
        $table->text('description')->nullable();

        $table->foreignId('contenu_id')
              ->constrained('contenus')
              ->onDelete('cascade');

        $table->foreignId('type_media_id')
              ->constrained('type_medias');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('medias');
}

};