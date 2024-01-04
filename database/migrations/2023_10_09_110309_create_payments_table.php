<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('userId')->nullable();
            $table->uuid('vendorId')->nullable();
            $table->uuid('transactionId')->nullable();
            $table->dateTime('paymentDate')->nullable();
            $table->float('amount', 8, 2)->nullable();
            $table->string('paymentMethod')->nullable();
            $table->string('status')->nullable();
            $table->string('reference')->nullable();
            $table->string('screenshot')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
