@extends('layouts.app')

@section('title', 'Team KiloKopi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Team Dashboard</h1>
            </div>
        </section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/ourteam/update/{{ $ourteam->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $ourteam->nama }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" name="posisi" class="form-control" value="{{ $ourteam->posisi }}"
                                    required>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
