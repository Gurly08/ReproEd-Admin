@extends('layouts.app')

@section('title', 'Edit Materi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Materi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Materi</a></div>
                    <div class="breadcrumb-item">Edit Materi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Materi</h2>

                <div class="card">
                    <form action="{{ route('materi.update', $materi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    name="kategori" value="{{ old('kategori', $materi->kategori) }}">
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul', $materi->judul) }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Materi</label>
                                <textarea class="form-control @error('deskripsi_materi') is-invalid @enderror"
                                    name="deskripsi_materi">{{ old('deskripsi_materi', $materi->deskripsi_materi) }}</textarea>
                                @error('deskripsi_materi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="text" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar" value="{{ old('gambar', $materi->gambar) }}">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Video Materi</label>
                                <input type="text" class="form-control @error('video_materi') is-invalid @enderror"
                                    name="video_materi" value="{{ old('video_materi', $materi->video_materi) }}">
                                @error('video_materi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
