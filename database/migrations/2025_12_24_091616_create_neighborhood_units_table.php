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
        Schema::create('neighborhood_units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no');
            $table->foreignId('community_id')->constrained('community_units')->onDelete('cascade');
            $table->string('leader_name');
            $table->enum('status', ['Aktif', 'Nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighborhood_units');
    }
};
