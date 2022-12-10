@extends('layouts.app')

@section('title', 'Gallery')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<style>
    .upload-image:hover {
        cursor: pointer;
        opacity: 0.7;
    }
</style>
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div
                            class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Gallery</h2>
                                <p class="mb-0 text-sm">Kelola Gallery {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="#video-modal" data-toggle="modal" class="btn btn-primary"><i
                                        class="fas fa-video mr-2"></i> Pengaturan Video</a>
                                <a href="#tambah-gambar" data-toggle="modal" class="btn btn-primary"><i
                                        class="fas fa-image mr-2"></i> Tambah Gambar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="row mt-4 justify-content-center">
    @forelse ($galleries as $item)
    @if ($item['jenis'] == 1)
    <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
        <a href="{{ url(Storage::url($item['gambar'])) }}" data-fancybox data-caption="{{ $item['caption'] }}">
            <img class="mw-100" src="{{ url(Storage::url($item['gambar'])) }}" alt="">
        </a>
        <a href="#modal-hapus" data-toggle="modal" data-action="{{ route('gallery.destroy',$item['id']) }}"
            class="mb-0 btn btn-sm btn-danger hapus-data"
            style="position: absolute; top: 0; left: 0; z-index: 1; left:15px">
            <i class="fas fa-trash" title="Hapus" data-toggle="tooltip"></i>
        </a>
    </div>
    @else
    <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
        <a href="https://www.youtube.com/watch?v={{ $item['id'] }}" data-fancybox data-caption="{{ $item['caption'] }}">
            <i class="fas fa-play fa-2x" style="position: absolute; top:43%; left:46%;"></i>
            <img class="mw-100" src="{{ $item['gambar'] }}" alt="">
        </a>
    </div>
    @endif
    @empty
    <div class="col">
        <div class="single-service bg-white rounded shadow">
            <h4>Data belum tersedia</h4>
        </div>
    </div>
    @endforelse
</div>

<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="video-modal" aria-hidden="true">
    <div class="row fixed-top m-3">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <div class="notifikasi"></div>
        </div>
    </div>
    <div class="modal-dialog modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Pengaturan Video</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <form class="d-inline" action="{{ route("video.update") }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label">Channel ID Youtube</label>
                        <input type="text" name="channel_id" id="channel_id" class="form-control"
                            value="{{ $desa->channel_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <form class="d-inline" action="{{ route("video.store") }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Sync</button>
                </form>
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="tambah-gambar" tabindex="-1" role="dialog" aria-labelledby="tambah-gambar"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Tambah gambar</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route("gallery.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="slider" value="">
                    <div class="form-group">
                        <label class="form-control-label">Gambar</label>
                        <div class="text-center">
                            <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image"
                                style="max-height: 300px" src="{{ asset('storage/upload.jpg') }}" alt="">
                            <input accept="image/*" onchange="uploadImage(this)" type="file" name="gambar"
                                class="images" style="display: none">
                            <span class="invalid-feedback font-weight-bold"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Caption</label>
                        <textarea class="form-control" name="caption"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Gambar?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p><strong>Apakah anda yakin ingin menghapus gallery ini ???</strong></p>
                </div>

            </div>

            <div class="modal-footer">
                <form id="form-hapus" action="" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-white">Yakin</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
            </div>

        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script>
    function uploadImage(inputFile) {
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(inputFile).siblings('img').attr("src", e.target.result);
            }
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
</script>
@endpush
