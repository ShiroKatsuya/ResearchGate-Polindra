<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('students')->nullOnDelete();
            $table->string('title');
            $table->string('journal')->nullable();
            $table->date('published_at')->nullable()->index();
            $table->string('doi')->nullable()->unique();
            $table->string('url')->nullable();
            $table->text('abstract')->nullable();
            $table->json('keywords')->nullable();
            $table->boolean('is_peer_reviewed')->default(false)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};


