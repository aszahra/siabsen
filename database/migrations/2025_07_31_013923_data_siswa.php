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
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('id_kelas');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghuchu'])->nullable();
            $table->string('alamat');
            $table->string('nama_ortu');
            $table->enum('status', ['Aktif', 'Nonaktif', 'Alumni'])->nullable();
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
