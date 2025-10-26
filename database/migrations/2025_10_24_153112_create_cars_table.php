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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('car_model_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->integer('year');
            $table->integer('kilometer_age');
            $table->enum('transmission', ['manual', 'automatic']);
            $table->enum('fuel_type', ['petrol','diesel','electric','hybrid']);
            $table->enum('condition', ['new', 'used']);
            $table->decimal('price', 10, 2);
            $table->string('engine');
            $table->string('color');
            $table->text('description');
            $table->enum('status', ['pending','approved','sold','rejected'])->default('pending');
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
