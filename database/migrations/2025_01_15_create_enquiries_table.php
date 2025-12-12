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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('from_location');
            $table->string('to_location');
            $table->date('travel_date');
            $table->string('seating_capacity');
            $table->string('phone_number');
            $table->string('distance_km')->nullable();
            $table->string('wa_message_id')->nullable();
            $table->enum('wa_status', ['pending', 'sent', 'failed'])->default('pending');
            $table->text('wa_error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
