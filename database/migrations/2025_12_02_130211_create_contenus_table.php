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
        Schema::create('contenus', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('texte')->nullable();
            $table->date('date_creation')->nullable();
            $table->string('statut')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->date('date_validation')->nullable();

            $table->foreignId('region_id')->constrained('regions');
            $table->foreignId('langue_id')->constrained('langues');
            $table->foreignId('moderateur_id')->nullable()->constrained('utilisateurs');
            $table->foreignId('type_contenu_id')->constrained('type_contenus');
            $table->foreignId('auteur_id')->constrained('utilisateurs');

            $table->timestamps();

            // Clé étrangère auto définie par constrained, mais pour parent_id on fait manuellement :
            $table->foreign('parent_id')->references('id')->on('contenus')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenus');
    }
};