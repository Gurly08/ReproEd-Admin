@extends('layouts.app')

@section('title', 'Add New Materi')

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
                <h1>Add Materi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Materi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Materi</h2>



                <div class="card">
                    <form action="{{ route('materi.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Masukan data edukasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Kategori</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kategori" value="reproduksi" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Reproduksi</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="kategori" value="pubertas" class="selectgroup-input">
                                        <span class="selectgroup-button">Pubertas</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text"
                                    class="form-control @error('judul')
                                is-invalid
                            @enderror"
                                    name="judul">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Materi</label>
                                <input type="text"
                                    class="form-control @error('deskripsi_materi')
                                is-invalid
                            @enderror"
                                    name="deskripsi_materi">
                                @error('deskripsi_materi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="text"
                                    class="form-control @error('gambar')
                                is-invalid
                            @enderror"
                                    name="gambar">
                                @error('gambar')
                                    <div class="gambar">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Video Materi</label>
                                <input type="text"
                                    class="form-control @error('video_materi')
                                is-invalid
                            @enderror"
                                    name="video_materi">
                                @error('video_materi')
                                    <div class="video_materi">
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
