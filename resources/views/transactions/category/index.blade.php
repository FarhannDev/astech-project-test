@extends('layouts.dashboard')

@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp

@section('content')
    <div class="row justify-content-start g-3 py-3">
        <div class="col">
            <div class="card rounded shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fst-bold">Kategori Transaksi</h5>

                    <a href="{{ route('transactions.category.create') }}"
                        class="btn btn-md rounded bg-danger text-white  mt-2">Buat
                        Kategori Baru <i class="fa fa-plus"></i></a>


                    <div class=" pt-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col-auto">No</th>
                                        <th scope="col-auto">Nama </th>
                                        <th scope="col-auto">Tipe</th>
                                        <th scope="col-auto">Waktu</th>
                                        <th scope="col-auto">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row " class="text-start align-middle">

                                                {{ $categories->currentPage() * $categories->perPage() - $categories->perPage() + 1 + $loop->index }}
                                            </th>
                                            <td class="text-start align-middle">{{ $category->name }}
                                            </td>
                                            <td class="text-start align-middle">
                                                {{ $category->type->name }}
                                            </td>
                                            <td class="text-start align-middle">
                                                {{ $time = Carbon::parse($category->created_at) }}
                                            </td>
                                            <td>
                                                <div class="mx-2">
                                                    <div class="d-flex justify-content-start align-items-center g-3">

                                                        <div class="mx-2">
                                                            <button onclick="confirmDelete({{ $category->id }})"
                                                                type="button"
                                                                class="btn btn-sm bg-danger rounded text-white">
                                                                <i class="fa fa-trash"></i></button>

                                                            <form id="delete-form-{{ $category->id }}"
                                                                action="{{ route('transactions.category.destroy', $category->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>

                                                        <a href="{{ route('transactions.category.edit', $category->id) }}"
                                                            class="btn btn-sm bg-danger rounded text-white">
                                                            <i class="fa fa-pencil-alt"></i></a>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <div class="pt-3 d-flex justify-content-center">
                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- SweetAlert2 Script -->
    <script>
        function confirmDelete(transactionId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, submit form hapus
                    document.getElementById('delete-form-' + transactionId).submit();
                }
            });
        }
    </script>

    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection
