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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['berjalan', 'selesai', 'tertunda'])->default('berjalan');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('repository_url')->nullable();
            $table->foreignId('student_id')->nullable()->constrained('students')->nullOnDelete();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
