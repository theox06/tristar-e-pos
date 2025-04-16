<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = ['nama', 'kode', 'harga', 'stok', 'foto_produk'];

    public static function generateKode()
    {
        // Ambil kode terakhir dari database
        $lastProduct = self::latest()->first();
        
        if (!$lastProduct) {
            $newKode = 'TRIVENT001'; // Jika belum ada data, mulai dari PRD001
        } else {
            // Ambil angka dari kode terakhir, lalu tambahkan 1
            $lastNumber = intval(substr($lastProduct->kode, 7)); // Ambil angka setelah 'PRD'
            $newKode = 'TRIVENT' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        return $newKode;
    }
}
