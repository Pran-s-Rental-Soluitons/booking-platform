<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('operator_name');
            $table->string('bus_name');
            $table->enum('bus_type', ['AC Sleeper', 'Non-AC Sleeper', 'AC Seater', 'Non-AC Seater']);
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('total_reviews')->default(0);
            $table->json('amenities')->nullable(); // ["AC","WiFi","Charging Port"]
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('buses');
    }
};
