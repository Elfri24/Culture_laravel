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
    Schema::create('utilisateurs', function (Blueprint $table) {
        $table->id('id');
        $table->string('nom');
        $table->string('prenom');
        $table->string('email')->unique();
        $table->string('mot_de_passe');
        $table->enum('sexe', ['H', 'F']);;
        $table->date('date_inscription')->nullable();
        $table->date('date_naissance')->nullable();
        $table->string('statut')->nullable();
        $table->string('photo')->nullable();

        // Relations
        $table->unsignedBigInteger('role_id');
        $table->unsignedBigInteger('langue_id');

        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->foreign('langue_id')->references('id')->on('langues')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('utilisateurs');
}

};