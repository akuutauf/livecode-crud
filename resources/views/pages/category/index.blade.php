@extends('layouts.template')

@section('title')
    <title>MSIB | Halaman Index Kategori</title>
@endsection

@section('content')
    <div class="container min-h-screen pb-5 pt-5 mt-3">
        <div class="mt-3">
            <a href="{{ route('create.category') }}" type="button" class="btn btn-theme">Tambah kategori <i
                    class="fa-solid fa-plus"></i></a>
        </div>

        {{-- banner --}}
        <div class="alert alert-success mt-4" role="alert">
            <b>Data Kategori</b>
        </div>

        @foreach ($categories as $item)
            <div class="card card-theme shadow-sm mt-3">
                <div class="card-body">
                    <div class="row justify-content-between">

                        <div class="col-6 d-flex">
                            <div class="card-text my-auto">
                                Nama Kategori : <i>{{ $item->name }}</i><br>
                            </div>
                        </div>

                        <div class="col-3 d-flex">
                            <div class="mx-auto my-auto">
                                <div class="mb-2">
                                    <a href="{{ route('edit.category', $item->id) }}" type="button"
                                        class="btn btn-green text-white">Edit
                                        Data</a>
                                </div>
                                <div class="mb-2">

                                    <button type="button" class="btn btn-red text-white" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">Hapus
                                        Data</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal Popup when delete active-->
            <div class="modal fade" id="exampleModal{{ $item->id }}" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus kategori
                                {{ $item->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin untuk menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                            <a href="{{ route('delete.category', $item->id) }}" type="button" value="true"
                                class="btn btn-danger">Hapus
                                Data</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
