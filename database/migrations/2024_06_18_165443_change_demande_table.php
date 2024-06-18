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
            $table->string('user_id')->nullable()->change();
            $table->string('site_id')->nullable()->change();
            $table->float('longitude_depart')->nullable()->change();
            $table->float('latitude_depart')->nullable()->change();
            $table->float('longitude_destination')->nullable()->change();
            $table->float('latitude_destination')->nullable()->change();
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
