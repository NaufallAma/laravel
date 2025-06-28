<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', [
            'books' => $books,
            'header' => 'Daftar Buku',
        ]);
    }

    public function create()
    {
        return view('admin.books.create', [
            'header' => 'Tambah Buku',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
        ]);

        // ✅ Simpan hanya field yang valid
        Book::create($request->only(['title', 'author', 'description', 'stock']));

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', [
            'book' => $book,
            'header' => 'Edit Buku',
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
        ]);

        // ✅ Update hanya field yang valid
        $book->update($request->only(['title', 'author', 'description', 'stock']));

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
