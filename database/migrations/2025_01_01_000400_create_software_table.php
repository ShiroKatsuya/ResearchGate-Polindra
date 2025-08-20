<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('students')->nullOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('license')->nullable();
            $table->string('version')->nullable();
            $table->json('tech_stack')->nullable();
            $table->json('screenshots')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};


