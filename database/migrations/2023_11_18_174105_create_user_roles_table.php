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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->index('user_id')->unique();
            $table->string('role_name')->unique();
            $table->string('is_delete')->default('0');
            $table->tinyInteger('created_by');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascae');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
        
    }
};
