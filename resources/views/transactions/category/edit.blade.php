@extends('layouts.dashboard')


@section('content')
    <div class="row justify-content-center align-content-center g-3 py-3">
        <div class="col-xl-8 col-lg-12">
            <div class="card rounded shadow-sm" style="min-height: 350px;">
                <div class="card-body">
                    <h5 class="card-title fst-bold">Buat Kategori Transaksi </h5>

                    <form action="{{ route('transactions.category.update', $category->id) }}" method="POST"
                        class="d-flex flex-column py-2">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">{{ __('Nama') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $category->name) }}" required placeholder="Nama kategori">
                        </div>

                        <div class="form-group mb-3">
                            <label for="type_id">{{ __('Type') }}</label>
                            <select name="type_id" id="type_id" class="form-control" onchange="updateCategories()">
                                <option value="">Pilih Tipe Kategori</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $category->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="py-3">
                            <button type="submit" class="btn btn-danger btn-md rounded w-100">{{ __('Perbarui') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
