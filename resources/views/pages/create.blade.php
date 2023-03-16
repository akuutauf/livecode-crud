@extends('layouts.template')

@section('title')
    <title>MSIB | Halaman Tambah Produk</title>
@endsection

@section('content')
    <div class="container mt-5">
        {{-- manual check vaidation --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="card">
            <div class="card-body">
                <form class="p-3 needs-validation novalidate" method="POST" action="{{ $action }}">
                    @csrf
                    <div class="card-tite mb-3">
                        <h4><b>Form Insert Data Produk</b></h4>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            aria-describedby="name" name="name">
                    </div>

                    @if ($errors->has('name'))
                        <div class="invalid feedback text-danger mb-3">
                            Nama tidak boleh kosong
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price">
                    </div>

                    @error('price')
                        {{-- error field price --}}
                        <div class="invalid feedback text-danger mb-3">
                            Harga tidak boleh kosong & harus numeric
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori Produk</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('category_id')
                        {{-- error field category_id --}}
                        <div class="invalid feedback text-danger mb-3">
                            Kategori harus dipilih
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">Desckripsi Produk</label>
                        <textarea class="form-control" id="description" style="height: 100px" placeholder="Masukkan deskripsi produk Anda"
                            name="description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a type="button" href="{{ route('index.product') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
