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
        Schema::create('sorties', function (Blueprint $table) {
            $table->id();
            $table->date('date_doc');
            
           

            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');

            $table->integer('remise');

            $table->string('attachement');
            $table->unsignedBigInteger('id_cat')->nullable();
            $table->foreign('id_cat')->references('id')->on('categories')->onDelete('set null');

            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorties');
    }
};
