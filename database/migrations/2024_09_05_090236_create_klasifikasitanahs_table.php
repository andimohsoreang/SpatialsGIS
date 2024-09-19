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
        Schema::create('klasifikasitanahs', function (Blueprint $table) {
            $table->id();
            $table->string('jenistanah');
            $table->string('kategori');
            $table->string('klasifikasikanal');
            $table->string('karakteristik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasitanahs');
    }
};
