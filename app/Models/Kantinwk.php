<?php
// app/Models/Kantinwk.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantinwk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemasok', 
        'nama_barang', 
        'jenis_barang', 
        'harga_barang', 
        'jumlah_barang', 
        'image_path'
    ];

    // Definisikan relasi ke model Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
