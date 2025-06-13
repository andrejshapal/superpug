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

        Schema::create('difficulties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('days');
            $table->timestamps();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->primary();
            $table->string('unit');
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('activities_name');
            $table->foreignId('difficulty_id')->constrained(table: 'difficulties');
            $table->unsignedInteger('from');
            $table->unsignedInteger('to');
            $table->foreign('activities_name')->references('name')->on('activities');
            $table->primary(['activities_name', 'difficulty_id']);
            $table->timestamps();
        });

        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->foreignId('difficulty_id')->constrained(table: 'difficulties');
            $table->timestamps();
        });

        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number');
            $table->foreignId('plan_id')->constrained(table: 'plans');
            $table->timestamps();
        });

        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->foreignId('day_id')->constrained(table: 'days');
            $table->string('activities_name');
            $table->unsignedInteger('status');
            $table->unsignedInteger('experience');
            $table->foreign('activities_name')->references('name')->on('activities');
            $table->timestamps();

        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->unsignedInteger('gold');
            $table->unsignedInteger('rest_days');
            $table->unsignedInteger('experience');
            $table->unsignedInteger('backpacks');
            $table->unsignedInteger('streak_days');
            $table->date('last_streak_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('plans');
        Schema::dropIfExists('days');
        Schema::dropIfExists('items');
        Schema::dropIfExists('difficulties');
        Schema::dropIfExists('activities');
    }
};
