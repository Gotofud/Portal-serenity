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
        Schema::create('banners',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->enum('status',['Aktif','Nonaktif'])->default('Aktif');
            $table->dateTime('start_at');
            $table->dateTime('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
