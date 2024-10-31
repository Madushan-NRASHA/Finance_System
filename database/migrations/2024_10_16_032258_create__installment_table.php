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
        Schema::create('installment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->decimal('full_amount', 10, 2);
            $table->decimal('down_amount', 10, 2);
            $table->decimal('lease_amount', 10, 2);
            $table->decimal('document_charge', 10, 2);
            $table->decimal('full_lease_amount', 10, 2);
            $table->integer('duration');
            $table->decimal('rate', 5, 2);                 
            $table->decimal('monthly_rental', 10, 2);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installment');
    }
};
