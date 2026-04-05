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
             $table->foreignId('community_id')->constrained('community_units')->onDelete('cascade');
            $table->foreignId('neighborhood_id')->constrained('neighborhood_units')->onDelete('cascade');
            $table->string('name');
            $table->integer('stall_unit');
            $table->bigInteger('rent_amount');
            $table->enum('status',['Aktif','Nonaktif'])->default('Aktif');
            $table->timestamps();
        });

        Schema::create('stalls', function (Blueprint $table) {
            $table->id();
            $table->string('code');
             $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('stall_id')->constrained('stall_places')->onDelete('cascade');
            $table->enum('status',['Aktif','Nonaktif','Pending'])->default('pending');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('duration');
            $table->string('total_cost');
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
