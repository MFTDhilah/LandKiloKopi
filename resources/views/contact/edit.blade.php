@extends('layouts.app')

@section('title', 'Contact KiloKopi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
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
                    <form action="/contact/update/{{ $contact->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" name="notelepon" class="form-control"
                                    value="{{ $contact->notelepon }}" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $contact->alamat }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Jam Operasional</label>
                                <input type="text" name="jamoperasional" class="form-control"
                                    value="{{ $contact->jamoperasional }}" required>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" value="{{ $contact->lokasi }}"
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
