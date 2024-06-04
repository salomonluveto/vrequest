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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_demande');
            $table->string('motif');
            $table->dateTime('date_deplacement');
            $table->foreignId('lieu_depart_id')->constrained('sites')->nullable();
            $table->foreignId('destination_id')->constrained('sites')->nullable();
            $table->integer('nbre_passagers');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('manager_id');
            $table->integer('charroi_id')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
