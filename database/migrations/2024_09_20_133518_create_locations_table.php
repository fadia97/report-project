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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المكان
            $table->decimal('latitude', 10, 8); // إحداثيات خط العرض
            $table->decimal('longitude', 11, 8); // إحداثيات خط الطول
            $table->string('related_place')->nullable(); // أماكن ذات صلة
            $table->string('nearby_services')->nullable(); // خدمات قريبة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
