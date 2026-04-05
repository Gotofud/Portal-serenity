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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('code');
            $table->string('image');
            $table->string('image_subtitle');
            $table->string('title');
            $table->enum('news_types',['Umum','Insiden','Sosial']);
            $table->longText('description');
            $table->enum('status',['Aktif','Nonaktif']);
            $table->unsignedBigInteger('views')->nullable();
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
