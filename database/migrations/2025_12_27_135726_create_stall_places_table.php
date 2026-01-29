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
        Schema::create('stall_places', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('community_id');
            $table->bigInteger('neighborhood_id');
            $table->string('name');
            $table->integer('stall_unit');
            $table->bigInteger('rent_amount');
            $table->enum('status',['Aktif','Nonaktif'])->default('Aktif');
            $table->timestamps();
        });

        Schema::create('stalls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('community_id');
            $table->bigInteger('neighborhood_id');
            $table->string('stall_name');
            $table->enum('status',['Aktif','Nonaktif','Pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stall_places');
    }
};
