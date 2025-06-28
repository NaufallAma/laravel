<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description', 'stock'];

    // ✅ Relasi: satu buku bisa dipinjam oleh banyak user (peminjaman)
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
