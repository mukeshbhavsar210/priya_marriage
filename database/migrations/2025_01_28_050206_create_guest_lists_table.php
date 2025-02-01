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
        Schema::create('guest_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('whatsapp');
            $table->text('address');            
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('surname_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->enum('event', ['Yes', 'No'])->default('Yes');
            $table->enum('invitation', ['Yes', 'No'])->default('No');
            $table->enum('food_choice', ['Gujarati', 'Rajasthani'])->default('Gujarati');
            $table->enum('guest_type', ['Groom', 'Bride'])->default('Bride');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_lists');
    }
};
