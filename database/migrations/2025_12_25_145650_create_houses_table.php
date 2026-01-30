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
        Schema::create('building_type', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('building_types_id')->constrained('building_type')->onDelete('cascade');
            $table->bigInteger('community_id')->constrained('community_units')->onDelete('cascade');
            $table->bigInteger('neighborhood_id')->constrained('neighborhood_units')->onDelete('cascade');
            $table->bigInteger('block_id')->constrained('blocks')->onDelete('cascade');
            $table->string('number');
            $table->enum('status', ['Aktif', 'Nonaktif']);
            $table->timestamps();
        });

        Schema::create('users_house', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->constrained('users')->onDelete('cascade');
            $table->bigInteger('house_id')->constrained('houses')->onDelete('cascade');
            $table->enum('is_primary', ['Rumah Utama', 'Rumah Lainnya']);
            $table->integer('total_resident');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('community_unit_aggrements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained('community_units')->onDelete('cascade');
            $table->foreignId('building_types_id')->constrained('building_type')->onDelete('cascade');
            $table->bigInteger('bill_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
