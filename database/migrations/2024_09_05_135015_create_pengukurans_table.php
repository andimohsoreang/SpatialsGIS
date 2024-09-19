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
        Schema::create('pengukurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->decimal('lat',10, 7);
            $table->decimal('long', 10, 7);
            $table->foreignId('snis_id')->constrained('snis')->onDelete('cascade');
            $table->foreignId('klasifikasitanah_id')->nullable()->constrained('klasifikasitanahs')->onDelete('cascade');
            $table->foreignId('jenistanah_id')->nullable()->constrained('jenistanahs')->onDelete('cascade');
            $table->decimal('frekuensi_natural', 10, 2); // F0
            $table->decimal('faktor_aplifikasi_tanah', 10, 2);
            $table->decimal('indeks_kerentanan_sesimik', 10, 2)->nullable();
            $table->decimal('percepatan_tanah', 10, 2); // PGAM
            $table->decimal('regangan_geser_tanah', 10, 9)->nullable(); // hasil perkalian
            $table->string('ukuran_regangan')->nullable(); // hasil perkalian
            $table->foreignId('regangan_id')->nullable()->constrained('regangans')->onDelete('cascade');
            $table->string('file_gambar')->nullable(); // Menambahkan kolom untuk gamba
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukurans');
    }
};
