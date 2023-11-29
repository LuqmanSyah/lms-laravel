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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('fullname');
            $table->string('email')->unique()->nullable();
            $table->char('nis', 10)->unique()->nullable();
            $table->char('nip', 18)->unique()->nullable();
            $table->char('nik', 16)->unique()->nullable();
            $table->string('password');
            $table->foreignId('class_id')->constrained('classrooms')->nullable();
            $table->date('birth_date');
            $table->string('birthplace');
            $table->string('phone_number')->nullable();
            $table->string('religion')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->enum('role', ['admin', 'student', 'teacher']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
