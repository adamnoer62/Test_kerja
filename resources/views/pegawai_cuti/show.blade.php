<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pegawai Cuti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-500 text-white">
                    <h2 class="text-2xl font-bold mb-4">{{ $cuti->pegawai->nama_depan }} {{ $cuti->pegawai->nama_belakang }}</h2>
                    <p class="mb-4">Tanggal Mulai: {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }}</p>
                    <p class="mb-4">Tanggal Akhir: {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}</p>
                    <p class="mb-4">Alasan: {{ $cuti->alasan }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
