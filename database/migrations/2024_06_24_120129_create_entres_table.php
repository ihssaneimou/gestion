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
        Schema::create('entres', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_doc');
            // $table->date('date_doc');
            // $table->foreign('id_doc')->references('id')->on('documents')->onDelete('cascade');
            // $table->integer('quant');
            // $table->date('date_doc');
            // $table->foreign('id_doc')->references('id')->on('documents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entres');
    }
};
