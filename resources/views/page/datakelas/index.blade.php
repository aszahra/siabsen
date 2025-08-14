<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Kelas') }}
        </h2>
    </x-slot>

    <div class="py-5 md:py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <!-- Ubah flex direction menjadi column pada mobile -->
            <div class="flex flex-col md:flex-row gap-5 items-start">
                <!-- Form Input (full width on mobile) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full md:w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-sm md:text-base">
                        FORM INPUT DATA KELAS
                    </div>
                    <div>
                        <form class="max-w-sm mx-auto md:mx-5" method="POST" action="{{ route('datakelas.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkatan</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="tingkat">
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub
                                    Kelas</label>
                                <select class="js-example-placeholder-single js-states form-control w-full"
                                    name="sub_kelas">
                                    <option value="" disabled selected>Pilih Sub Kelas...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Data Kelas Table (full width on mobile) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-center text-sm md:text-base">
                        DATA KELAS
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-3 py-2 md:px-4 md:py-3 bg-gray-100 text-center">NO</th>
                                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 bg-gray-100 text-center">
                                        TINGKATAN</th>
                                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 bg-gray-100 text-center">SUB
                                        KELAS</th>
                                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 bg-gray-100 text-center">ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($nama as $index => $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-3 py-2 md:px-5 md:py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 text-center">
                                            {{ ($nama->currentPage() - 1) * $nama->perPage() + $loop->iteration }}
                                        </th>
                                        <td class="px-3 py-2 md:px-5 md:py-3 text-center">
                                            {{ $item->tingkat }}
                                        </td>
                                        <td class="px-3 py-2 md:px-5 md:py-3 text-center">
                                            {{ $item->sub_kelas }}
                                        </td>
                                        <td class="px-3 py-2 md:px-5 md:py-3 text-center space-x-1 md:space-x-2">
                                            <button type="button"
                                                class="bg-amber-400 p-2 md:p-3 w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl text-white hover:bg-amber-500"
                                                onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                data-id="{{ $item->id }}" data-tingkat="{{ $item->tingkat }}"
                                                data-sub_kelas="{{ $item->sub_kelas }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                </svg>
                                            </button>
                                            @if ($item->siswa->isNotEmpty() || $item->absensi->isNotEmpty())
                                                <button
                                                    class="bg-gray-500 p-2 md:p-3 w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button
                                                    class="bg-red-400 p-2 md:p-3 w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl text-white hover:bg-red-500"
                                                    onclick="return datakelasDelete('{{ $item->id }}','{{ $item->tingkat }}','{{ $item->sub_kelas }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 md:mt-4">
                        {{ $nama->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (responsive) -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900" id="title_source">
                        Update Data Kelas
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-4 md:space-y-6">
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tingkatan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full" name="tingkat"
                                id="tingkat">
                                <option value="" disabled selected>Pilih...</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Sub
                                Kelas</label>
                            <select class="js-example-placeholder-single js-states form-control w-full"
                                name="sub_kelas" id="sub_kelas">
                                <option value="" disabled selected>Pilih Sub Kelas...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center p-4 space-y-2 md:space-y-0 md:space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-1 w-full md:w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-1 w-full md:w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('message_exists'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Duplikat!',
            text: '{{ session('message_exists') }}',
            showConfirmButton: false,
            timer: 2500
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
        const tingkat = button.dataset.tingkat;
        const sub_kelas = button.dataset.sub_kelas;
        let url = "{{ route('datakelas.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Data Kelas ${tingkat}${sub_kelas}`;

        $('#tingkat').val(tingkat).trigger('change');
        document.getElementById('tingkat').value = tingkat;

        $('#sub_kelas').val(sub_kelas).trigger('change');
        document.getElementById('sub_kelas').value = sub_kelas;

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

    const datakelasDelete = async (id, tingkat, sub_kelas) => {
        Swal.fire({
            title: `Yakin ingin menghapus kelas ${tingkat}${sub_kelas}?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/datakelas/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: `Data kelas ${tingkat}${sub_kelas} berhasil dihapus.`,
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
