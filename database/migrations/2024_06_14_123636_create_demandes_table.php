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
            $table->date('date');
            $table->string('motif')->nullable();
            $table->dateTime('date_deplacement');
            $table->String('lieu_depart');
            $table->string('destination');
            $table->string('nbre_passagers');
            $table->string('status')->nullable();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('site_id')->onDelete('cascade');
            $table->integer('manager_id')->nullable();
            $table->integer('charroi_id')->nullable();
            $table->float('longitude_depart');
            $table->float('latitude_depart');
            $table->float('longitude_destination');
            $table->float('latitude_destination');
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
