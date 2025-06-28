<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Tambah Buku Baru
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm rounded-lg">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.books.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border border-gray-300 rounded p-2 mt-1">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Penulis</label>
                    <input type="text" name="author" value="{{ old('author') }}"
                        class="w-full border border-gray-300 rounded p-2 mt-1">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="description" class="w-full border border-gray-300 rounded p-2 mt-1"
                        rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Stok</label>
                    <input type="number" name="stock" value="{{ old('stock', 0) }}"
                        class="w-full border border-gray-300 rounded p-2 mt-1">
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
