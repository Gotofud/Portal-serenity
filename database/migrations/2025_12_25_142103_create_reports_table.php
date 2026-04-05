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
         Schema::create('report_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum(
                'types',
                [
                    'Bencana dan Darurat',
                    'Fasilitas Umum dan Lingkungan',
                    'Sosial dan Keamanan Umum',
                    'Laporan Khusus dan Manajemen',
                ]
            );
            $table->timestamps();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('subject');
            $table->longText('description');
            $table->foreignId('report_category')->constrained('report_categories')->onDelete('cascade');
            $table->string('image');
            $table->enum('status', ['Selesai', 'Ditolak', 'Diterima', 'Pending']);
            $table->text('reply')->nullable();
            $table->string('replied_file')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->text('acc_reply')->nullable();
            $table->string('acc_file')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->text('rejected_reply')->nullable();
            $table->string('rejected_file')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
