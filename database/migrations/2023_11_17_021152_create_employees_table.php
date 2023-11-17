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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum("gender", ['pria', 'wanita']);
            $table->string('phone');
            $table->text('address');
            $table->string('email');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('position_id');
            $table->enum("status", ['active', 'inactive']);
            $table->date('hired_on');
            $table->foreign('departement_id')->references('id')->on('departement');
            $table->foreign('position_id')->references('id')->on('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
