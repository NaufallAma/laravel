<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Daftar Buku - User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow-sm">
            @if(session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="mb-4 text-red-600">{{ session('error') }}</div>
            @endif

            <table class="w-full border text-sm">
                <thead class="bg-gray-200">
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
                                <form action="{{ route('user.books.borrow', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-600 text-black px-3 py-1 rounded hover:bg-blue-700">
                                        Pinjam
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-2 text-gray-500">Tidak ada buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
