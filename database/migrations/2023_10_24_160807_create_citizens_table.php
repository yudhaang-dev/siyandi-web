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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('email', 125)->unique();
            $table->string('username', 32)->unique();
            $table->string('password', 255);
            $table->boolean('status')->default(1);
            $table->string('name',125);
            $table->string('place_of_birth', 125)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('sex',['Male','Female'])->nullable();
            $table->enum('religion', config('select_option.religion'))->nullable();
            $table->enum('marital_status', config('select_option.marital_status'))->nullable();
            $table->string('job_status')->nullable();
            $table->enum('citizenship', config('select_option.citizenship'))->nullable();
            $table->string('address', 255)->nullable();
            $table->char('village_code', 10)->nullable();
            $table->string('photo',255)->nullable();
            $table->string('citizen_card', 255)->nullable();
            $table->string('family_card', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('village_code')
                ->references('code')
                ->on(config('laravolt.indonesia.table_prefix').'villages')
                ->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('citizen_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')
                ->constained('citizens')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('name', config('select_option.education'));
            $table->year('graduation')->nullable();
            $table->string('certificate', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('citizen_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')
                ->constained('citizens')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('skill_id')
                ->constained('skills')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('certificate', 255)->nullable();
            $table->boolean('validity')->default(0);
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen_skills');
        Schema::dropIfExists('citizen_educations');
        Schema::dropIfExists('citizens');
    }
};
