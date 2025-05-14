<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="space-y-6">
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Nama: {{ $pegawai->nama_depan . ' ' . $pegawai->nama_belakang }}
                    </p>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Email: {{ $pegawai->email }}
                    </p>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        No HP: {{ $pegawai->no_hp }}
                    </p>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Alamat: {{ $pegawai->alamat }}
                    </p>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Jenis Kelamin: {{ $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
