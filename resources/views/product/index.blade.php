@extends('layouts.app')

@section('title', 'Product KiloKopi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product Dashboard</h1>
            </div>
        </section>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5>List Product</h5>
                            <div><a href="/product/create" class="btn btn-primary">Tambah Produk</a></div>
                        </div>
                        <table class="table-hover table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Produk</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $product->nama_produk }}</td>
                                        <td>{{ $product->harga_produk }}</td>
                                        <td><img src="{{ asset('img/gambar_produk/' . $product->image) }}" alt=""
                                                width="100"></td>
                                        <td>
                                            <form action="">

                                            </form>
                                            <a href="/product/edit/{{ $product->id }}" class="btn btn-warning">Edit</a>
                                            <form action="/product/delete/{{ $product->id }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                {{-- <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button> --}}
                                                <button type="submit" class="btn btn-danger confirm-delete">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
