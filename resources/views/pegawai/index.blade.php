<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('pegawai.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Pegawai
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Nama Depan</th>
                                <th scope="col" class="px-6 py-3">Nama Belakang</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">No HP</th>
                                <th scope="col" class="px-6 py-3">Alamat</th>
                                <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($pegawai as $p)
                                <tr>
                                    <td class="px-6 py-4">{{ $p->id }}</td>
                                    <td class="px-6 py-4">{{ $p->nama_depan }}</td>
                                    <td class="px-6 py-4">{{ $p->nama_belakang }}</td>
                                    <td class="px-6 py-4">{{ $p->email }}</td>
                                    <td class="px-6 py-4">{{ $p->no_hp }}</td>
                                    <td class="px-6 py-4">{{ $p->alamat }}</td>
                                    <td class="px-6 py-4">{{ $p->jenis_kelamin }}</td>
                                    <td class="px-6 py-4 flex space-x-2">
                                        <a href="{{ route('pegawai.edit', $p->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                                Hapus
                                            </button>
                                        </form>
                                        <a href="{{ route('pegawai.show', $p->id) }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

