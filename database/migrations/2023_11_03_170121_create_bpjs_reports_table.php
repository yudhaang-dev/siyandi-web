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
        Schema::create('bpjs_reports', function (Blueprint $table) {
            $table->id();
            $table->string('no_kpj', 125)->unique();
            $table->string('nik', 18)->unique();
            $table->string('name', 125);
            $table->string('place_of_birth')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('organization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bpjs_reports');
    }
};
