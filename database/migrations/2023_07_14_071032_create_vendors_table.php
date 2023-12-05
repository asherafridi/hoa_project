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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('vendorType');
            $table->string('contactPerson', 100);
            $table->string('contactNumber', 100);
            $table->string('contactEmail', 100);
            $table->string('password');
            $table->string('picture', 250);
            $table->mediumText('serviceDescription');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
