<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Siswa') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex flex-col md:flex-row">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full md:w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT DATA SISWA
                    </div>
                    <div>
                        <form class="max-w-sm mx-auto md:mx-5" method="POST" action="{{ route('datasiswa.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="nis"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk
                                    Siswa (angka)
                                </label>
                                <input type="integer" name="nis"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " required />
                            </div>
                            <div class="mb-5">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa
                                </label>
                                <input type="text" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="id_kelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="id_kelas" id="base-input" placeholder="Pilih Kelas" required>
                                    <option value="" disabled selected>Pilih Kelas...</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->tingkat }}{{ $k->sub_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="jenis_kelamin"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" required>
                                    <option value="">Pilih...</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="tempat_lahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                                </label>
                                <input type="text" name="tempat_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            
                            <div class="mb-5">
                                <label for="tgl_lahir"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir
                                </label>
                                <input type="date" name="tgl_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="agama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="agama" data-placeholder="Pilih Agama" required>
                                    <option value="">Pilih...</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                </label>
                                <input type="text" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="nama_ortu"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua/Wali
                                </label>
                                <input type="text" name="nama_ortu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" "
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="statuss"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="statuss" data-placeholder="Pilih Status Siswa" required>
                                    <option value="">Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-center">
                        DATA SISWA
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col" class="px-4 py-3 bg-gray-100">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NIS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NAMA SISWA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KELAS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JENIS KELAMIN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ALAMAT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TANGGAL LAHIR
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        STATUS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datasiswa as $index => $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                        align="center">
                                        <th scope="row"
                                            class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                            {{ ($datasiswa->currentPage() - 1) * $datasiswa->perPage() + $loop->iteration }}
                                        </th>
                                        <td class="px-5 py-3">
                                            {{ $item->nis }}
                                        </td>
                                        <td class="px-5 py-3">
                                            {{ $item->nama }}
                                        </td>
                                        <td class="px-5 py-3">
                                            {{ $item->kelas->tingkat }}{{ $item->kelas->sub_kelas }}
                                        </td>
                                        <td class="px-5 py-3">
                                            {{ $item->jenis_kelamin }}
                                        </td>
                                        <td class="px-5 py-3">
                                            {{ $item->alamat }}
                                        </td>
                                        <td class="px-5 py-3">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                            {{-- {{ $item->tgl_lahir }} --}}
                                        </td>
                                        <td class="px-5 py-3">
                                            {{ $item->statuss }}
                                        </td>
                                        <td class="px-5 py-3">
                                            <button type="button"
                                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                data-id="{{ $item->id }}" data-nis="{{ $item->nis }}"
                                                data-nama="{{ $item->nama }}"
                                                data-id_kelas="{{ $item->id_kelas }}"
                                                data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                data-alamat="{{ $item->alamat }}"
                                                data-tempat_lahir="{{ $item->tempat_lahir }}"
                                                data-tgl_lahir="{{ $item->tgl_lahir }}"
                                                data-agama="{{ $item->agama }}"
                                                data-nama_ortu="{{ $item->nama_ortu }}"
                                                data-statuss="{{ $item->statuss }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                </svg>
                                            </button>
                                            <button
                                                class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                onclick="return datasiswaDelete('{{ $item->id }}','{{ $item->nama }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $datasiswa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0-flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="max-h-[80vh] overflow-y-auto p-4 space-y-6"> <!-- Added max-height and overflow-y -->
                        <div class="flex flex-col md:flex-row gap-5">
                            <div class="mb-5 w-full">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nomor Induk
                                    Siswa (angka)</label>
                                <input type="integer" id="nis" name="nis"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nomor Induk Siswa">
                            </div>
                            <div class="mb-5 w-full">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Siswa</label>
                                <input type="string" id="nama" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama Siswa">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-5">
                            <div class="mb-5 w-full">
                                <label for="id_kelas_edit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas
                                </label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="id_kelas_edit" id="id_kelas" placeholder="Pilih Kelas">
                                    <option value="" disabled selected>Pilih Kelas...</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->tingkat }}{{ $k->sub_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="jenis_kelamin"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="jenis_kelamin" id="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin"
                                    required>
                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-5">
                            <div class="mb-5 w-full">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5 w-full">
                                <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                    Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-5">
                            <div class="mb-5 w-full">
                                <label for="agama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="agama" id="agama" data-placeholder="Pilih Agama" required>
                                    <option value="">Pilih...</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <input type="text" id="alamat" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-5">
                            <div class="mb-5 w-full">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama Orang
                                    Tua/Wali</label>
                                <input type="text" id="nama_ortu" name="nama_ortu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5 w-full">
                                <label for="statuss"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="statuss" id="statuss" data-placeholder="Pilih Status Siswa" required>
                                    <option value="">Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center p-4 border-t border-gray-200 sticky bottom-0 bg-white dark:bg-gray-800">
                        <!-- Made buttons sticky -->
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('exist'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'NIS Duplikat!',
            text: '{{ session('exist') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('message_insert'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('message_insert') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

@if (session('message_update'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Diperbarui!',
            text: '{{ session('message_update') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const nis = button.dataset.nis;
        const nama = button.dataset.nama;
        const id_kelas = button.dataset.id_kelas;
        const jenis_kelamin = button.dataset.jenis_kelamin;
        const tempat_lahir = button.dataset.tempat_lahir;
        const tgl_lahir = button.dataset.tgl_lahir;
        const agama = button.dataset.agama;
        const alamat = button.dataset.alamat;
        const nama_ortu = button.dataset.nama_ortu;
        const statuss = button.dataset.statuss;
        let url = "{{ route('datasiswa.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Siswa ${nama}`;

        document.getElementById('nis').value = nis;
        document.getElementById('nama').value = nama;
        document.getElementById('alamat').value = alamat;
        document.getElementById('tempat_lahir').value = tempat_lahir;
        document.getElementById('tgl_lahir').value = tgl_lahir;
        document.getElementById('nama_ortu').value = nama_ortu;

        $('#jenis_kelamin').val(jenis_kelamin).trigger('change');
        document.getElementById('jenis_kelamin').value = jenis_kelamin;

        $('#statuss').val(statuss).trigger('change');
        document.getElementById('statuss').value = statuss;

        $('#agama').val(agama).trigger('change');
        document.getElementById('agama').value = agama;

        let event = new Event('change');
        document.querySelector('[name="id_kelas_edit"]').value = id_kelas;
        document.querySelector('[name="id_kelas_edit"]').dispatchEvent(event);

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const datasiswaDelete = async (id, nama) => {
        Swal.fire({
            title: `Yakin ingin menghapus siswa ${nama}?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/datasiswa/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: `Data siswa ${nama} berhasil dihapus.`,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    })
                    .catch(function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menghapus data.'
                        });
                        console.error(error);
                    });
            }
        });
    }
</script>
