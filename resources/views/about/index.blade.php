@extends('layouts.app')

@section('title', 'Contact KiloKopi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contact Dashboard</h1>
            </div>
        </section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5>List Contact</h5>
                            <div><a href="/contact/create" class="btn btn-primary">Update Contact</a></div>
                        </div>
                        <table class="table-hover table">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($abouts as $sbout)
                                <tr>
                                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                    <td>{{ $about->judul }}</td>
                                    <td>{{ $about->isi }}</td>
                                    <td>
                                        <a href="/about/edit/{{ $about->id }}" class="btn btn-warning">Edit</a>
                                        <form action="/about/delete/{{$about->id}}" method="POST" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
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
