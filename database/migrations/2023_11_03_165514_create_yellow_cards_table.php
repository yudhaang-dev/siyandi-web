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
        Schema::create('yellow_cards', function (Blueprint $table) {
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
            $table->enum('status', config('select_option.yellow_card_status'))
                ->default(config('select_option.yellow_card_status')[0]);
            $table->timestamps();
        });

        Schema::create('yellow_card_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yellow_card_id')
                ->constrained('yellow_cards')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('skill_id')
                ->constrained('skills')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('yellow_card_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yellow_card_id')
                ->constrained('yellow_cards')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('name', 255);
            $table->string('source', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yellow_card_attachments');
        Schema::dropIfExists('yellow_card_skill');
        Schema::dropIfExists('yellow_cards');
    }
};
