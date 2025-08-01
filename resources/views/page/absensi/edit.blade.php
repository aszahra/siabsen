<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('EDIT ABSENSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold text-center">
                        EDIT DATA ABSENSI
                    </div>

                    <form method="POST" action="{{ route('absensi.update', $absensi->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="flex gap-5">
                            <div class="mb-5 w-full">
                                <label for="id_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Guru</label>
                                <select name="id_guru" id="id_guru" class="form-control w-full" disabled>
                                    @foreach ($data_guru as $k)
                                        <option value="{{ $k->id }}" {{ $k->id == $absensi->id_guru ? 'selected' : '' }}>{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-5 w-full">
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ $absensi->tanggal }}"
                                    class="form-control w-full" />
                            </div>
                        </div>

                        <div class="flex gap-5">
                            <div class="mb-5 w-full">
                                <label for="waktu_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Mulai</label>
                                <select name="waktu_mulai" id="waktu_mulai" class="form-control w-full" disabled>
                                    @foreach ($jadwal as $k)
                                        <option value="{{ $k->id }}" {{ $k->id == $absensi->waktu_mulai ? 'selected' : '' }}>{{ $k->waktu_mulai }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-5 w-full">
                                <label for="waktu_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Selesai</label>
                                <select name="waktu_selesai" id="waktu_selesai" class="form-control w-full" disabled>
                                    @foreach ($jadwal as $k)
                                        <option value="{{ $k->id }}" {{ $k->id == $absensi->waktu_selesai ? 'selected' : '' }}>{{ $k->waktu_selesai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daftar Siswa</label>
                            <div class="overflow-x-auto max-h-96 border rounded-lg p-4 bg-white dark:bg-gray-700">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-sm">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 font-bold text-left text-gray-700 dark:text-gray-200">No</th>
                                            <th class="px-4 py-2 font-bold text-left text-gray-700 dark:text-gray-200">Nama</th>
                                            <th class="px-4 py-2 font-bold text-left text-gray-700 dark:text-gray-200">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_siswa as $i => $siswa)
                                            @php
                                                $status = $detail_absensi->where('id_siswa', $siswa->id)->first()->status ?? '';
                                            @endphp
                                            <tr class="border-t dark:border-gray-600">
                                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $i + 1 }}</td>
                                                <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $siswa->nama }}</td>
                                                <td class="px-4 py-2">
                                                    <select name="absensi[{{ $siswa->id }}]" class="form-select w-full rounded-md">
                                                        <option value="" disabled {{ $status == '' ? 'selected' : '' }}>Pilih...</option>
                                                        <option value="hadir" {{ $status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                                        <option value="izin" {{ $status == 'izin' ? 'selected' : '' }}>Izin</option>
                                                        <option value="sakit" {{ $status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                                        <option value="alpa" {{ $status == 'alpa' ? 'selected' : '' }}>Alpa</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="flex justify-start gap-4 mt-5">
                            <button type="submit"
                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                                Update
                            </button>
                            <a href="{{ route('absensi.index') }}"
                                class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                                Batal
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
