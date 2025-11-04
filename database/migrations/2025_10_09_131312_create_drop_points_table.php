<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('drop_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_schedule_id')->constrained('bus_schedules')->onDelete('cascade');
            $table->string('drop_location');
            $table->time('drop_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('drop_points');
    }
};
