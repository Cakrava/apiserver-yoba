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
        Schema::create('mahasiswa_2010041', function (Blueprint $table) {
            $table->char('nim_2010041', 7)->primary();
            $table->string('nama_lengkap_2010041', 100);
            $table->enum('jenis_kelamin_2010041', ['L', 'P']);
            $table->string('tmp_lahir_2010041', 100);
            $table->date('tgl_lahir_2010041');
            $table->text('alamat_2010041');
            $table->char('notelp_2010041');
                $table->string('foto', 255)->nullable(); // Menambahkan field foto
        $table->string('foto_thumb', 255)->nullable(); // Menambahkan field foto_thumb
     
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_2010041');
    }
};
