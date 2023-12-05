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
        Schema::create('delations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')
                ->constrained('citizens')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('title');
            $table->text('description');
            $table->enum('status', config('select_option.delation_status'))->default(config('select_option.delation_status')[0]);
            $table->timestamps();
        });
        Schema::create('delation_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delation_id')
                ->constrained('delations')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('name', 255);
            $table->string('source', 255);
            $table->timestamps();
        });
        Schema::create('delation_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delation_id')
                ->constrained('delations')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('sender_type', ['User', 'Citizen']);
            $table->unsignedBigInteger('sender_id');
            $table->text('message');
            $table->timestamps();
        });
        Schema::create('delation_chat_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delation_chat_id')
                ->constrained('delation_chats')
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
        Schema::dropIfExists('delation_chat_attachments');
        Schema::dropIfExists('delation_chats');
        Schema::dropIfExists('delation_attachments');
        Schema::dropIfExists('delations');
    }
};
