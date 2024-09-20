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
        Schema::create('geolocation_reports', function (Blueprint $table) {
            $table->id();
            $table->string('description'); // وصف البلاغ
            $table->decimal('latitude', 10, 8); // خط العرض
            $table->decimal('longitude', 11, 8); // خط الطول
            $table->string('related_place')->nullable(); // أماكن ذات صلة
            $table->string('nearby_services')->nullable(); // خدمات الموقع القريب
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geolocation_reports');
    }
};
