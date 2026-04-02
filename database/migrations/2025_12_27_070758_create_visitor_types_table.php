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
        Schema::create('guest_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('guest', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('guest_amount');
            $table->bigInteger('guest_types');
            $table->bigInteger('house_id');
            $table->dateTime('visit_at')->now();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_types');
    }
};
