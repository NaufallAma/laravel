<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Buku yang Sedang Dipinjam
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto bg-white p-6 shadow rounded">
            @if(session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <table class="w-full border text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">Judul</th>
                        <th class="p-2 border">Pinjam Pada</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($borrowings as $item)
                        <tr>
                            <td class="p-2 border">{{ $item->book->title }}</td>
                            <td class="p-2 border">{{ $item->borrowed_at->format('d M Y H:i') }}</td>
                            <td class="p-2 border">
                                <form action="{{ route('user.borrowings.return', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-green-600 text-black px-3 py-1 rounded hover:bg-green-700">
                                        Kembalikan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center p-2 text-gray-500">Belum ada pinjaman aktif.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
