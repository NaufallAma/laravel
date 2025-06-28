<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Daftar Buku
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow-sm">

            @if(session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <a href="{{ route('admin.books.create') }}" class="text-blue-600 hover:underline inline-block mb-4">
                + Tambah Buku
            </a>

            <table class="w-full border border-gray-300 text-left text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Judul</th>
                        <th class="p-2 border">Penulis</th>
                        <th class="p-2 border">Stok</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td class="p-2 border">{{ $book->title }}</td>
                            <td class="p-2 border">{{ $book->author }}</td>
                            <td class="p-2 border">{{ $book->stock }}</td>
                            <td class="p-2 border">
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-2 border text-center text-gray-500">Belum ada buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
