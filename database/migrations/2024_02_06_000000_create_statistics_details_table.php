<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistics_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_delivery', 10, 2)->nullable();
            $table->decimal('total_customers', 10, 2)->nullable();
            $table->decimal('total_years', 10, 2)->nullable();
            $table->decimal('total_member', 10, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistics_details');
    }
};