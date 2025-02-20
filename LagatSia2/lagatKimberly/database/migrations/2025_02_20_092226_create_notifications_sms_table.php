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
        Schema::create('notifications_sms', function (Blueprint $table) {
            $table->id();
            $table->string("notified_sms",30);
            $table->unSignedBigInteger("booking_id");
            $table->unSignedBigInteger("personal_ID");
            $table->timestamps();
          
$table->foreign("booking_id")->references("id")->on("bookings")->ondelete("cascade")->onupdate("cascade");
$table->foreign("personal_ID")->references("id")->on("personal_information")->ondelete("cascade")->onupdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_sms');
    }
};
