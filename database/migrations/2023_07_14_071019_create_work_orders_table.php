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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('propertyId')->nullable();
            $table->uuid('requestedBy')->nullable();
            $table->dateTime('requested_date', 0)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('priority')->nullable();
            $table->string('status')->nullable();
            $table->uuid('assignedTo')->nullable();
            $table->dateTime('completion_date', 0)->nullable();
            $table->string('invoice',250)->nullable();
            $table->float('invoice_amount',8,2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
