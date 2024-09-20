<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepsTable extends Migration
{
    public function up()
    {
        Schema::create('reps', function (Blueprint $table) {
            $table->id();
            $table->text('description'); // وصف المشكلة
           
            $table->timestamp('reported_at')->useCurrent(); // تاريخ ووقت البلاغ
            $table->enum('status', ['pending', 'in_progress', 'resolved', 'closed']); // حالة البلاغ
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reps');
    }
}
