<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Mata Pelajaran') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex flex-col lg:flex-row">
                <!-- Form Input Section -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full lg:w-1/3 p-4 order-2 lg:order-1">
                    <div class="p-4 bg-gray-100 dark:bg-gray-700 mb-2 rounded-xl font-bold">
                        FORM INPUT DATA MATA PELAJARAN
                    </div>
                    <div class="p-2 sm:p-0">
                        <form method="POST" action="{{ route('datamatpel.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Mata Pelajaran
                                </label>
                                <input type="text" name="nama" placeholder="Masukkan Nama Mata Pelajaran"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Data Table Section -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4 order-1 lg:order-2">
                    <div class="p-4 bg-gray-100 dark:bg-gray-700 mb-2 rounded-xl font-bold text-center">
                        DATA MATA PELAJARAN
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col" class="px-4 py-3 bg-gray-100 dark:bg-gray-600">NO</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-600">NAMA MATA
                                        PELAJARAN</th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100 dark:bg-gray-600">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($datamatpel as $index => $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" align="center">
                                        <th scope="row"
                                            class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100 dark:bg-gray-700">
                                            {{ ($datamatpel->currentPage() - 1) * $datamatpel->perPage() + $loop->iteration }}
                                        </th>
                                        <td class="px-5 py-3 bg-gray-100 dark:bg-gray-700">
                                            {{ $item->nama }}
                                        </td>
                                        <td class="px-5 py-3 bg-gray-100 dark:bg-gray-700">
                                            <div class="flex justify-center space-x-2">
                                                <button type="button"
                                                    class="bg-amber-400 p-2 w-8 h-8 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $item->id }}" data-nama="{{ $item->nama }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                    </svg>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-2 w-8 h-8 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return datamatpelDelete('{{ $item->id }}','{{ $item->nama }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 px-4">
                        {{ $datamatpel->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4 overflow-y-auto">
            <div class="w-full max-w-md relative bg-white dark:bg-gray-800 rounded-lg shadow mx-2">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="title_source">
                        Update Mata Pelajaran
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="p-4 space-y-4">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Mata Pelajaran
                            </label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Mata Pelajaran" required>
                        </div>
                    </div>
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-full md:w-40 h-10 rounded-xl hover:bg-green-500 text-white">
                            Simpan
                        </button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-full md:w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">
                            Batal
                        </button>
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
        const nama = button.dataset.nama;
        let url = "{{ route('datamatpel.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Data Mata Pelajaran ${nama}`;
        document.getElementById('nama').value = nama;
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

    const datamatpelDelete = async (id, nama) => {
        Swal.fire({
            title: `Yakin ingin menghapus mata pelajaran ${nama}?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/datamatpel/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: `Data mata pelajaran ${nama} berhasil dihapus.`,
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
