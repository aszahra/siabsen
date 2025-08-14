<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Absensi') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold items-center" style="text-align: center">
                        FORM INPUT DATA ABSENSI
                    </div>
                    <div>
                        <form class="" method="POST" action="{{ route('absensi.store') }}">
                            <div>
                                @csrf
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for="id_guru"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Guru</label>
                                        <select class="js-example-placeholder-single js-states form-control w-full"
                                            name="id_guru" placeholder="Pilih Guru" id="id_guru" required>
                                            <option value="" disabled selected>Pilih Guru...</option>
                                            @foreach ($guru as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
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
                                    </div>
                                </div>
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for="id_kelas"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Kelas</label>
                                        <select class="js-example-placeholder-single js-states form-control w-full"
                                            name="id_kelas" id="base-input" placeholder="Pilih Kelas" required>
                                            <option value="" disabled selected>Pilih Kelas...</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">
                                                    {{ $k->tingkat }}{{ $k->sub_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="hari"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="hari" data-placeholder="Pilih Hari" required>
                                            <option value="">Pilih...</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                        </select>
                                    </div>
                                    {{-- <div class="mb-5 w-full">
                                        <label for="tanggal"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        </label>
                                        <input type="date" name="tanggal"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                    </div> --}}
                                    {{-- <div class="mb-5 w-full">
                                        <label for="minggu"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minggu
                                        </label>
                                        <input type="text" name="minggu"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                                    </div> --}}
                                </div>
                                <div class="flex gap-5">
                                    <div class="mb-5 w-full">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                            Mulai</label>
                                        <input type="time" name="waktu_mulai" id="waktu_mulai"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="waktu_selesai"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                            Selesai</label>
                                        <input type="time" name="waktu_selesai" id="waktu_selesai"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required />
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const startTime = document.getElementById('waktu_mulai');
        const endTime = document.getElementById('waktu_selesai');

        startTime.addEventListener('change', function() {
            // set minimal waktu selesai sama dengan waktu mulai
            endTime.min = this.value;

            // jika waktu selesai lebih kecil, reset
            if (endTime.value && endTime.value < this.value) {
                endTime.value = this.value;
            }
        });
    </script>

</x-app-layout>
