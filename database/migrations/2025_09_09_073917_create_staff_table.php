<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('staff', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('school_id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('designation')->nullable();
        $table->string('phone')->nullable();
        $table->string('education')->nullable();

        $table->timestamps();

        $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
