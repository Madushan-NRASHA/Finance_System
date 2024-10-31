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
        Schema::create('guarantor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');

            $table->string('guarantor1_name');
            $table->text('guarantor1_address');
            $table->string('guarantor1_nic');
            $table->string('guarantor1_contact');

            // Second Guarantor
            $table->string('guarantor2_name');
            $table->text('guarantor2_address');
            $table->string('guarantor2_nic');
            $table->string('guarantor2_contact');

            // Third Guarantor
            $table->string('guarantor3_name')->nullable(); 
            $table->text('guarantor3_address')->nullable();
            $table->string('guarantor3_nic')->nullable();
            $table->string('guarantor3_contact')->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarantor');
    }
};
