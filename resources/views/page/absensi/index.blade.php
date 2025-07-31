<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('KELOLA JADWAL MATA PELAJARAN') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 bg-gray-100 rounded-xl mb-2 font-bold flex items-center justify-between ">
                        <div>DATA JADWAL</div>
                        <div>
                            <a href="{{ route('jadwal.create') }}" onclick="return functionAdd()"
                                class="bg-blue-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-blue-500 justify-between">
                                {{-- <i class="fi fi-sr-square-plus p-"></i> --}}
                                Tambah Jadwal
                            </a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold">
                                    <th scope="col" class="px-4 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        MATA PELAJARAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KELAS
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        WAKTU MULAI
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        WAKTU SELESAI
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        ACTION
                                    </th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($absensi as $key => $a)
                                    <tr
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                        <th scope="row"
                                            class="px-4 py-2 font-medium text-gray-700 whitespace-nowrap dark:text-white">
                                            {{ $absensi->perPage() * ($absensi->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-4 py-2">
                                            {{ $t->id_guru->nama }}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $t->id_jadwal->matpel }}
                                        </td>
                                        <td class="px-4 py-2">
                                            <button type="button" onclick="editSourceModal(this)"
                                                data-id="{{ $t->id }}" data-modal-target="sourceModal"
                                                data-id_guru="{{ $t->id_guru }}"
                                                data-id_matpel="{{ $t->id_matpel }}"
                                                data-id_kelas="{{ $t->id_kelas }}" data-hari="{{ $t->hari }}"
                                                data-waktu_mulai="{{ $t->waktu_mulai }}"
                                                data-waktu_selesai="{{ $t->waktu_selesai }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button onclick="return jadwalDelete('{{ $t->id }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $absensi->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden" id="sourceModal">
        <div class="relative w-full max-w-3xl max-h-screen overflow-y-auto bg-white rounded-lg shadow mx-4 my-8">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                    Update Data Paket
                </h3>
                <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                    data-modal-hide="defaultModal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form class="w-full px-6 py-4" method="POST" id="formSourceModal">
                @csrf

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="w-full">
                        <label for="id_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Guru</label>
                        <select class="js-example-placeholder-single js-states form-control w-full" name="id_guru"
                            id="id_guru" placeholder="Pilih Guru" required>
                            <option value="" disabled selected>Pilih Guru...</option>
                            @foreach ($guru as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="id_jadwal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                            Pelajaran</label>
                        <select class="js-example-placeholder-single js-states form-control w-full" name="id_matpel"
                            id="id_jadwal" placeholder="Pilih Mata Pelajaran" required>
                            <option value="" disabled selected>Pilih Mata Pelajaran...</option>
                            @foreach ($jadwal as $k)
                                <option value="{{ $k->id }}">{{ $k->tingkat_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="w-full">
                        <label for="id_kelas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select class="js-example-placeholder-single js-states form-control w-full" name="id_kelas"
                            id="id_kelas" placeholder="Pilih Kelas" required>
                            <option value="" disabled selected>Pilih Kelas...</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->tingkat }}{{ $k->sub_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="hari"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                        <select class="js-example-placeholder-single js-states form-control w-full m-6" name="hari"
                            id="hari" data-placeholder="Pilih Hari" required>
                            <option value="">Pilih...</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                </div> --}}

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="mb-5 w-full">
                        <label for="waktu_mulai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                            Mulai</label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div class="mb-5 w-full">
                        <label for="waktu_selesai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                            Selesai</label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                    </div>
                </div>
                <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" id="formSourceButton"
                        class="bg-green-400 w-40 h-10 rounded-xl hover:bg-green-500">
                        Simpan
                    </button>
                    <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                        class="bg-red-500 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        const id = button.dataset.id;
        const id_guru = button.dataset.id_guru;
        const id_matpel = button.dataset.id_matpel;
        const id_kelas = button.dataset.id_kelas;
        const hari = button.dataset.hari;
        const waktu_mulai = button.dataset.waktu_mulai;
        const waktu_selesai = button.dataset.waktu_selesai;

        $('#id_guru').val(id_guru).trigger('change');
        $('#id_matpel').val(id_matpel).trigger('change');
        $('#id_kelas').val(id_kelas).trigger('change');


        document.getElementById('waktu_mulai').value = waktu_mulai;
        document.getElementById('waktu_selesai').value = waktu_selesai;

        $('#hari').val(hari).trigger('change');
        document.getElementById('hari').value = hari;

        const form = document.getElementById('formSourceModal');
        form.action = `/absensi/${id}`;
        form.method = 'POST';

        if (!form.querySelector('input[name="_method"]')) {
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
        }

        document.getElementById('sourceModal').classList.remove('hidden');
    };

    const sourceModalClose = () => {
        document.getElementById('sourceModal').classList.add('hidden');
    };

    const absensiDelete = async (id, nama) => {
        Swal.fire({
            title: `Yakin ingin menghapus jadwal ini?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/absensi/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: `Jadwal berhasil dihapus.`,
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
