<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Buku: {{ $book->title }}
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

            <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}"
                        class="w-full border border-gray-300 rounded p-2 mt-1">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Penulis</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}"
                        class="w-full border border-gray-300 rounded p-2 mt-1">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="description" class="w-full border border-gray-300 rounded p-2 mt-1"
                        rows="4">{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Stok</label>
                    <input type="number" name="stock" value="{{ old('stock', $book->stock) }}"
                        class="w-full border border-gray-300 rounded p-2 mt-1">
                </div>

                <div>
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
