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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type_name', 125)->nullable();
            $table->foreignId('category_id')->nullable()
                ->constrained('post_categories', 'id')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('slug', 255);
            $table->string('title', 255);
            $table->text('content')->nullable();
            $table->boolean('status')->default(false);
            $table->string('image', 255)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->unique(['type_name', 'slug']);
            $table->unique(['type_name', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
