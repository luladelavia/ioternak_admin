<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // Gunakan Anonymous Class agar tidak error "Not Found"
{
    public function up(): void
    {
        // Masukkan semua Schema::create yang sudah kita bahas sebelumnya di sini
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_id')->unique();
            $table->string('name');
            $table->enum('type', ['IoPeka', 'IoPakan']);
            $table->enum('status', ['Available', 'Rented', 'Maintenance'])->default('Available');
            $table->timestamps();
        });
        
        // Tambahkan tabel orders di bawahnya...
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
        Schema::dropIfExists('orders');
    }
};