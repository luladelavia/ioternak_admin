<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. BUAT TABEL ADMINS (Baru)
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. TAMBAH KOLOM KE TABEL USERS (Yang sudah ada dari Node.js)
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom hanya jika belum ada di database Anda
            if (!Schema::hasColumn('users', 'birth_date')) {
                $table->date('birth_date')->nullable();
                $table->string('password')->nullable();
                $table->text('address')->nullable();
                $table->string('province')->nullable();
                $table->string('city')->nullable();
                $table->string('district')->nullable();
                $table->string('postal_code')->nullable();
                $table->string('livestock_type')->nullable();
                $table->integer('population')->nullable();
            }
        });

        // 3. TAMBAH KOLOM KE TABEL DEVICES (Yang sudah ada dari Node.js)
        // (Asumsinya device_id, device_name, type, whatsapp_number, dll sudah ada)
        Schema::table('devices', function (Blueprint $table) {
            if (!Schema::hasColumn('devices', 'owned_by')) {
                $table->unsignedBigInteger('owned_by')->nullable();
                $table->foreign('owned_by')->references('user_id')->on('users')->onDelete('set null');
            }
        });

        // 4. BUAT TABEL ORDERS (Baru)
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->unsignedBigInteger('user_id'); // Sesuaikan tipe data dengan users.user_id
            $table->string('device_id');
            $table->integer('duration');
            $table->decimal('total_bill', 12, 2);
            $table->enum('status', ['Pending', 'Success', 'Failed'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('device_id')->references('device_id')->on('devices')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('admins');
        // Catatan: Kita tidak men-drop users dan devices di fungsi down() 
        // karena tabel tersebut milik Node.js juga.
    }
};