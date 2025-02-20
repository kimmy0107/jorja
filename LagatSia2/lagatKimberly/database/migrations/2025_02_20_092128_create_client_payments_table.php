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
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger("booking_id");
            $table->unSignedBigInteger("service_id");
            $table->unSignedBigInteger("personal_ID");
            $table->date("payment_date");
            $table->enum("status",["done"]);
            $table->timestamps();

$table->foreign("booking_id")->references("id")->on("bookings")->ondelete("cascade")->onupdate("cascade");
$table->foreign("service_id")->references("id")->on("service_types")->ondelete("cascade")->onupdate("cascade");
$table->foreign("personal_ID")->references("id")->on("personal_information")->ondelete("cascade")->onupdate("cascade");


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_payments');
    }
};
