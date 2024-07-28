@extends('layouts.app')

@section('title', 'Add New Edukasi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Edukasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Edukasi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edukasi</h2>



                <div class="card">
                    <form action="{{ route('edukasi.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Masukan data edukasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control @error('judul_edukasi') is-invalid @enderror" name="judul_edukasi">
                                @error('judul_edukasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Materi</label>
                                <input type="text" class="form-control @error('deskripsi_edukasi') is-invalid @enderror" name="deskripsi_edukasi">
                                @error('deskripsi_edukasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="text" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Video Materi</label>
                                <input type="text" class="form-control @error('video_edukasi') is-invalid @enderror" name="video_edukasi">
                                @error('video_edukasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
