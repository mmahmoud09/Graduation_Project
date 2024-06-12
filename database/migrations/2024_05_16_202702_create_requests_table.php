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

        Schema::create('requests', function (Blueprint $table) {
        $table->id();
        $table->string('Descriptions');
        $table->string('ImageNameProblem');
        $table->string('Address');
        $table->date('Date');
        $table->float('Cost');
        $table->boolean('StatusOfRequest');
        $table->boolean('IsResponse');
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('provider_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

        $table->unique(['user_id', 'provider_id']); // Ensure uniqueness of user-provider pairs
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
