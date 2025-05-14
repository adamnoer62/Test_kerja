<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Pegawai Cuti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('cuti.store') }}">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <x-input-label for="pegawai_id" :value="__('Pegawai')" />
                            <select id="pegawai_id" name="pegawai_id" class="mt-1 block w-full" required>
                                @foreach($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama_depan }} {{ $pegawai->nama_belakang }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('pegawai_id')" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_mulai" :value="__('Tanggal Mulai')" />
                            <x-text-input id="tanggal_mulai" name="tanggal_mulai" type="date" class="mt-1 block w-full" :value="old('tanggal_mulai')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_mulai')" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_selesai" :value="__('Tanggal Berakhir')" />
                            <x-text-input id="tanggal_selesai" name="tanggal_selesai" type="date" class="mt-1 block w-full" :value="old('tanggal_selesai')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_selesai')" />
                        </div>

                        <div>
                            <x-input-label for="alasan" :value="__('Alasan')" />
                            <textarea id="alasan" name="alasan" class="mt-1 block w-full" required>{{ old('alasan') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('alasan')" />
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

