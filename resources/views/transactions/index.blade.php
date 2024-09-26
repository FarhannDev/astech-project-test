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
                    <h5 class="card-title fst-bold">Transaksi Uang Masuk</h5>

                    <a href="{{ route('transactions.create') }}" class="btn btn-md rounded bg-danger text-white  mt-2">Buat
                        Catatan Baru <i class="fa fa-plus"></i></a>


                    <div class=" pt-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col-auto">No</th>
                                        <th scope="col-auto">Kategori </th>
                                        <th scope="col-auto">Jumlah Uang</th>
                                        <th scope="col-auto">Tanggal</th>
                                        <th scope="col-auto">Waktu</th>
                                        <th scope="col-auto">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <th scope="row " class="text-start align-middle">

                                                {{ $transactions->currentPage() * $transactions->perPage() - $transactions->perPage() + 1 + $loop->index }}
                                            </th>
                                            <td class="text-start align-middle">{{ $transaction->category->name }}
                                            </td>
                                            <td class="text-start align-middle">{{ $transaction->amount }}</td>
                                            <td class="text-start align-middle">{{ $transaction->transaction_date }}</td>
                                            <td class="text-start align-middle">
                                                {{ $time = Carbon::parse($transaction->created_at)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <div class="mx-2">
                                                    <div class="d-flex justify-content-start align-items-center g-3">
                                                        {{-- <form method="POST" class="m-2 delete-form"
                                                            action="{{ route('transactions.destroy', $transaction->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button title="Hapus" type="submit"
                                                                class="btn btn-danger btn-sm rounded text-white"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form> --}}

                                                        <div class="mx-2">
                                                            <button onclick="confirmDelete({{ $transaction->id }})"
                                                                type="button"
                                                                class="btn btn-sm bg-danger rounded text-white">
                                                                <i class="fa fa-trash"></i></button>

                                                            <form id="delete-form-{{ $transaction->id }}"
                                                                action="{{ route('transactions.destroy', $transaction->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>

                                                        <a href="{{ route('transactions.edit', $transaction->id) }}"
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
                                {{ $transactions->links('pagination::bootstrap-4') }}
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
