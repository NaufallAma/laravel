<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    // 📚 Menampilkan pinjaman aktif user
    public function index()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', Auth::id())
            ->whereNull('returned_at')
            ->get();

        return view('user.borrowings.index', compact('borrowings'));
    }

    // 🔁 Proses pengembalian buku
    public function return(Borrowing $borrowing)
    {
        // Pastikan hanya user yang punya hak mengembalikan
        if ($borrowing->user_id !== Auth::id()) {
            abort(403);
        }

        $borrowing->update([
            'returned_at' => now()
        ]);

        return back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
