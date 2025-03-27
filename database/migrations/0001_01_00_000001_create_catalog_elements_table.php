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
        Schema::create('catalog_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_id')->constrained()->onDelete('cascade');
            $table->string('code');
            $table->json('name');
            $table->text('description')->nullable();
            $table->integer('order')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['catalog_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_elements');
    }
};
