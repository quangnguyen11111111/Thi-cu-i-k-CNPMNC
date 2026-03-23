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
    Schema::create('tailieus', function (Blueprint $table) {
        $table->id();
        $table->string('matailieu',50);
        $table->string('tentailieu',255);
        $table->longText('tomtat')->nullable();
        $table->string('madanhmuc',50);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tailieus');
    }
};
