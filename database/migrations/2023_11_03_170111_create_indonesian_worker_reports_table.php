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
        Schema::create('indonesian_worker_reports', function (Blueprint $table) {
            $table->id();
            $table->string('country', 125)->unique();
            $table->integer('official_male')->default(0);
            $table->integer('official_female')->default(0);
            $table->integer('official_total')->default(0);
            $table->integer('not_official_male')->default(0);
            $table->integer('not_official_female')->default(0);
            $table->integer('not_official_total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indonesian_worker_reports');
    }
};
