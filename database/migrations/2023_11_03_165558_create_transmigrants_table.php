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
        Schema::create('transmigrants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')
                ->constrained('citizens')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('address', 255);
            $table->foreignId('village_code')
                ->constrained('villages')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('job', 255)->nullable();
            $table->enum('education', config('select_option.education'))
                ->default(config('select_option.education')[0]);
            $table->enum('status', config('select_option.transmigrant_status'))
                ->default(config('select_option.transmigrant_status')[0]);
            $table->timestamps();
        });
        Schema::create('transmigrant_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transmigrant_id')
                ->constrained('transmigrants')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('skill_id')
                ->constrained('skills')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('certificate', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('transmigrant_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transmigrant_id')
                ->constrained('transmigrants')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('name', 255);
            $table->string('source', 255);
            $table->timestamps();
        });
        Schema::create('transmigrant_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transmigrant_id')
                ->constrained('transmigrants')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('nik', 18);
            $table->string('name', 255);
            $table->enum('sex', config('select_option.sex'))
                ->default(config('select_option.sex')[0]);
            $table->enum('relationship_status', config('select_option.relationship_status'))
                ->default(config('select_option.relationship_status')[0]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmigrant_participants');
        Schema::dropIfExists('transmigrant_attachments');
        Schema::dropIfExists('transmigrant_skills');
        Schema::dropIfExists('transmigrants');
    }
};
