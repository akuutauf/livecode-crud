@extends('layouts.template')

@section('title')
    <title>MSIB | Halaman Index Produk</title>
@endsection

@section('content')
    <div class="container min-h-screen">
        <div class="mt-3">
            <a href="{{ route('create.product') }}" type="button" class="btn btn-theme">Tambah Produk <i
                    class="fa-solid fa-plus"></i></a>
        </div>


        @foreach ($categories as $item)
            <div class="alert alert-success mt-4" role="alert">
                <b>Etalase {{ $item->name }}</b>
            </div>

            @foreach ($products as $value)
                @if ($item->name == $value->category->name)
                    <div class="card card-theme shadow-sm mt-3">
                        <div class="card-body">
                            <div class="row justify-content-between">

                                <div class="col-6">
                                    <div class="card-title">
                                        <b>{{ $value->name }}</b>
                                    </div>
                                    <div class="card-text">
                                        Price Product : <i>Rp. {{ $value->price }}</i><br>
                                        Category Product : <i>{{ $value->category->name }}</i>
                                    </div>
                                    <div class="card-text">
                                        Description Product :
                                        @if ($value->description == '')
                                            <i>Belum ditambahkan</i>
                                        @else
                                            {{ $value->description }}
                                        @endif
                                    </div>
                                </div>

                                <div class="col-3 d-flex">
                                    <div class="mx-auto my-auto">
                                        <div class="mb-2">
                                            <a href="{{ route('edit.product', $value->id) }}" type="button"
                                                class="btn btn-green text-white">Edit
                                                Data</a>
                                        </div>
                                        <div class="mb-2">

                                            <button type="button" class="btn btn-red text-white" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $value->id }}">Hapus
                                                Data</button>

                                            {{-- <a href="{{ route('delete.product', $value->id) }}" type="button"
                                                class="btn btn-red text-white">Hapus
                                                Data</a> --}}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Modal Popup when delete active-->
                    <div class="modal fade" id="exampleModal{{ $value->id }}" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk
                                        {{ $value->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin untuk menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                    <a href="{{ route('delete.product', $value->id) }}" type="button" value="true"
                                        class="btn btn-danger">Hapus
                                        Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection
