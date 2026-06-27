<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // Gunakan Anonymous Class agar tidak error "Not Found"
{
    public function up(): void
    {
        // Tabel Users kustom untuk IoTernak
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('full_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable();
            $table->text('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('livestock_type')->nullable();
            $table->integer('population')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // Tabel Devices kustom untuk IoTernak
        Schema::create('devices', function (Blueprint $table) {
            $table->string('device_id')->primary();
            $table->string('device_name')->nullable();
            $table->string('type')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->double('threshold_temp')->nullable();
            $table->double('threshold_gas')->nullable();
            $table->unsignedBigInteger('owned_by')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('owned_by')->references('user_id')->on('users')->onDelete('set null');
        });

        // Tabel Orders kustom untuk IoTernak
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('devices');
        Schema::dropIfExists('users');
    }
};