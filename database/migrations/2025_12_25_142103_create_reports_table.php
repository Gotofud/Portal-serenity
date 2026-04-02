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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->bigInteger('user_id');
            $table->string('subject');
            $table->longText('description');
            $table->bigInteger('report_category');
            $table->string('image');
            $table->enum('status', ['Selesai', 'Ditolak', 'Diterima', 'Pending']);
            $table->text('reply')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->text('acc_reply')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->text('rejected_reply')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });

        Schema::create('report_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum(
                'types',
                [
                    'Bencana dan Darurat (Emergency)',
                    'Fasilitas Umum dan Lingkungan (Sarpras)',
                    'Sosial dan Keamanan Umum (Ketertiban)',
                    'Laporan Khusus dan Manajemen',
                ]
            );
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
