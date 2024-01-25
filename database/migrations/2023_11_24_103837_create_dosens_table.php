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
        Schema::create('dosen2010041', function (Blueprint $table) {
            $table->char('nidn2010041', 7)->primary();
            $table->string('namalengkap2010041', 100);
            $table->enum('jenkel2010041', ['L', 'P']);
            $table->string('tmp_lahir2010041', 100);
            $table->date('tgl_lahir2010041');
            $table->string('alamat2010041', 100);
            $table->char('notelp2010041');
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
        Schema::dropIfExists('dosen2010041');
    }
};
