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
        Schema::create('medewerkers', function (Blueprint $table) {
            $table->id();
        $table->string('naam');
        $table->string('email')->unique();
        $table->string('telefoon')->nullable();
        $table->string('afdeling')->nullable();
        $table->string('functie')->nullable();
        $table->string('locatie')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medewerkers');
    }
};
