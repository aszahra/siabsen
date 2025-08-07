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
        Schema::create('data_guru', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('nip');
            $table->string('email');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghuchu'])->nullable();
            $table->string('alamat');
            $table->enum('status', ['Aktif', 'Nonaktif'])->nullable();
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
