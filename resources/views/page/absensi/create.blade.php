<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ABSENSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full text-center">
                                <div class="w-full">
                                    ABSEN MATA PELAJARAN
                                </div>
                            </div>
                        </div>
                        <div>
                            <form class="w-full mx-auto" method="POST" action="{{ route('absensi.store') }}">
                                @csrf
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for="id_guru"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Guru</label>
                                        <select class="js-example-placeholder-single js-states form-control w-full"
                                            name="id_guru" placeholder="Pilih Guru" id="id_guru" >
                                            @foreach ($jadwal as $k)
                                                <option value="{{ $k->id }}">{{ $k->guru->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="id_guru"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                        <input type="text" name="id_guru" id="id_guru" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                                </div>
                                {{-- <div class="mb-5 w-full">
                                    <label for="id_matpel"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                                        Pelajaran</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_matpel" placeholder="Pilih Mata Pelajaran" id="id_matpel" required>
                                        <option value="" disabled selected>Pilih Mata Pelajaran...</option>
                                        @foreach ($matpel as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div>
                            <div class="flex gap-5">
                                {{-- <div class="mb-5 w-full">
                                    <label for="id_kelas"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_kelas" placeholder="Pilih Kelas" id="id_kelas" required>
                                        <option value="" disabled selected>Pilih Kelas...</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->tingkat }}{{ $k->sub_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}

                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="waktu_mulai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                        Mulai</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="waktu_mulai" id="waktu_mulai" disabled>
                                                    @foreach ($jadwal as $k)
                                        <option value="{{ $k->id }}">{{ $k->waktu_mulai }}
                                        </option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="waktu_selesai"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                            Selesai</label>
                                        <select class="js-example-placeholder-single js-states form-control w-full"
                                            name="waktu_selesai" id="waktu_selesai" disabled>
                                            @foreach ($jadwal as $k)
                                                <option value="{{ $k->id }}">{{ $k->waktu_selesai }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-5 w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daftar
                                        Siswa</label>
                                    <div
                                        class="ovexrflow-x-auto max-h-96 border rounded-lg p-4 bg-white dark:bg-gray-700">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-sm">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 text-left font-bold text-gray-700 dark:text-gray-200">
                                                        No</th>
                                                    <th
                                                        class="px-4 py-2 text-left font-bold text-gray-700 dark:text-gray-200">
                                                        Nama</th>
                                                    <th
                                                        class="px-4 py-2 text-left font-bold text-gray-700 dark:text-gray-200">
                                                        Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_siswa as $i => $siswa)
                                                    <tr class="border-t dark:border-gray-600">
                                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                                            {{ $i + 1 }}</td>
                                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                                            {{ $siswa->nama }}</td>
                                                        <td class="px-4 py-2">
                                                            <select name="absensi[{{ $siswa->id }}]"
                                                                class="form-select w-full rounded-md">
                                                                <option value="" disabled selected>Pilih...
                                                                </option>
                                                                <option value="hadir">Hadir</option>
                                                                <option value="izin">Izin</option>
                                                                <option value="sakit">Sakit</option>
                                                                <option value="alpa">Alpa</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- <tbody>
                                                @foreach ($data_siswa as $i => $siswa)
                                                    <tr class="border-t dark:border-gray-600">
                                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                                            {{ $i + 1 }}</td>
                                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                                            {{ $siswa->nama }}</td>
                                                        <td class="px-4 py-2">
                                                            <select name="absensi[{{ $siswa->id }}]"
                                                                class="form-select w-full rounded-md">
                                                                <option value="" disabled selected>Pilih...
                                                                </option>
                                                                <option value="hadir">Hadir</option>
                                                                <option value="izin">Izin</option>
                                                                <option value="sakit">Sakit</option>
                                                                <option value="alpa">Alpa</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody> --}}
                                        </table>
                                    </div>
                                </div>
                                <div class="flex justify-start gap-4 mt-5">
                                    <button type="submit"
                                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">
                                        Simpan
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
        </div>
</x-app-layout>
