@extends('layouts.dashboard')


@section('content')
    <div class="row justify-content-center align-content-center g-3 py-3">
        <div class="col-xl-8 col-lg-12">
            <div class="card rounded shadow-sm" style="min-height: 350px;">
                <div class="card-body">
                    <h5 class="card-title fst-bold">Buat Catatan Baru</h5>

                    <form action="{{ route('transactions.store') }}" method="POST" class="d-flex flex-column py-2">
                        @csrf

                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="type_id">{{ __('Type') }}</label>
                                <select name="type_id" id="type_id" class="form-control" onchange="updateCategories()">
                                    <option value="">Pilih Tipe</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">{{ __('Kategori') }}</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Pilih Tipe Transaksi Terlebih Dahulu</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="amount">{{ __('Amount') }}</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    value="{{ old('amount') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">{{ __('Date') }}</label>
                                <input type="date" class="form-control" name="transaction_date" id="date"
                                    value="{{ old('transaction_date') }}" required>
                            </div>
                        </div>

                        <div class="py-3">
                            <button type="submit"
                                class="btn btn-danger btn-md rounded w-100">{{ __('Tambahkan') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const categories = @json($categories);

        function updateCategories() {
            const typeId = document.getElementById('type_id').value;
            const categorySelect = document.getElementById('category_id');

            // Hapus kategori sebelumnya
            categorySelect.innerHTML = '<option value="">Pilih Kategori</option>';

            // Filter kategori berdasarkan type_id
            const filteredCategories = categories.filter(category => category.type_id == typeId);

            // Tambahkan kategori yang sesuai
            filteredCategories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.text = category.name;
                categorySelect.appendChild(option);
            });
        }
    </script>
@endsection
