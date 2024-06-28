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
        Schema::table('demandes', function (Blueprint $table) {
            $table->string('user_id')->change();
            $table->string('motif')->change();
            $table->float('longitude_depart')->change();
            $table->float('latitude_depart')->change();
            $table->float('longitude_destination')->change();
            $table->float('latitude_destination')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
