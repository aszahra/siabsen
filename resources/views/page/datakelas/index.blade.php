<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Kelas') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT DATA KELAS
                    </div>
                    <div>
                        <form class="max-w-sm mx-5" method="POST" action="{{ route('datakelas.store') }}">
                            @csrf
                            <div class="mb-5">
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
                            <div class="mb-5">
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
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-center">
                        DATA KELAS
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            TINGKATAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            SUB KELAS
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($nama as $index => $item)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                            align="center">
                                            <th scope="row"
                                                class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ ($nama->currentPage() - 1) * $nama->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="px-5 py-3">
                                                {{ $item->tingkat }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $item->sub_kelas }}
                                            </td>
                                            <td class="px-5 py-3">
                                                <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $item->id }}" data-tingkat="{{ $item->tingkat }}"
                                                    data-sub_kelas="{{ $item->sub_kelas }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return datakelasDelete('{{ $item->id }}','{{ $item->tingkat }}','{{ $item->sub_kelas }}')">
                                                    <i class="fi fi-sr-delete-document"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $nama->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
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
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tingkatan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full" name="tingkat"
                                id="tingkat">
                                <option value="" disabled selected>Pilih...</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Sub Kelas</label>
                            <select class="js-example-placeholder-single js-states form-control w-full" name="sub_kelas"
                                id="sub_kelas">
                                <option value="" disabled selected>Pilih Sub Kelas...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            id="formSourceButton"class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal"
                            onclick="sourceModalClose(this)"class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
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

        // let event = new Event('change');
        // document.querySelector('[name="tingkat_edit"]').value = tingkat;
        // document.querySelector('[name="tingkat_edit"]').dispatchEvent(event);

        // let event = new Event('change');
        // document.querySelector('[name="sub_kelas_edit"]').value = sub_kelas;
        // document.querySelector('[name="sub_kelas_edit"]').dispatchEvent(event);

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
