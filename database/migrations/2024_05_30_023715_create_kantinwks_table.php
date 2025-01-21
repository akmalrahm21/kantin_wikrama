<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKantinwksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kantinwks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemasok');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->decimal('harga_barang', 8, 2);
            $table->integer('jumlah_barang');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kantinwks');
    }
}