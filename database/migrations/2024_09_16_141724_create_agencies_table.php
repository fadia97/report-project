<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الجهة
            $table->string('contact_number')->nullable(); // رقم الاتصال
            $table->string('email')->nullable(); // عنوان البريد الإلكتروني
            $table->string('address')->nullable(); // العنوان
            $table->string('responsible_person')->nullable(); // اسم المسؤول
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}
