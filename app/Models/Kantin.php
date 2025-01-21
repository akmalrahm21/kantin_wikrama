<?php

// namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    protected $fillable = ['nama_pemasok', 'nama_barang', 'jenis_barang', 'harga_barang', 'jumlah', 'images'];
}
