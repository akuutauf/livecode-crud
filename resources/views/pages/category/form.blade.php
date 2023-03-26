@extends('layouts.template')

@section('title')
    <title>MSIB | Halaman Edit kategori</title>
@endsection

@section('content')
    <div class="container mt-5 pt-5">
        {{-- manual check validation --}}
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
                    @method('put')
                    @csrf
                    <div class="card-tite mb-3">
                        <h4><b>Form Edit Data kategori</b></h4>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            aria-describedby="name" name="name" value="{{ $category->name }}">
                    </div>

                    @if ($errors->has('name'))
                        <div class="invalid feedback text-danger mb-3">
                            Nama tidak boleh kosong
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="description" class="form-label">Desckripsi kategori</label>
                        <textarea class="form-control" id="description" style="height: 100px" placeholder="Masukkan deskripsi kategori Anda"
                            name="description">{{ $category->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah kategori</button>
                    <a type="button" href="{{ route('index.category') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
