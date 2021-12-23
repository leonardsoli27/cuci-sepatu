@extends('admin.layout.main')

@section('dashboard', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Profil</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Profil Perusahaan
        </div>
        <div class="card-body">
            @foreach ($profil as $item)
            <form action="{{ route('edtProfil') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="id_profil" value="{{ $item->id_profil }}">
                    <label for="nama_perusahaan" class="form-label"><strong>Nama Perusahaan</strong></label>
                    <input type="text" class="form-control @error('nama_perusahaan') is-invalid
                    @enderror" name="nama_perusahaan" id="nama_perusahaan" value="{{ $item->nama }}">
                    <div class="invalid-feedback">
                        Wajib Diisi | Min 5 Karakter.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tentang_kami" class="form-label"><strong>Tentang Kami</strong></label>
                    <textarea name="tentang_kami" id="tentang_kami" class="@error('tentang_kami') is-invalid
                    @enderror">{!! $item->tentang_kami !!}</textarea>
                    <div class="invalid-feedback">
                        Wajib Diisi | Min 10 Karakter.
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-lg-6">
                        <label for="visi" class="form-label"><strong>Visi Perusahaan</strong></label>
                        <textarea name="visi" id="visi" class="@error('visi') is-invalid
                            @enderror">{!! $item->visi !!}</textarea>
                        <div class="invalid-feedback">
                            Wajib Diisi | Min 10 Karakter.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="misi" class="form-label"><strong>Misi Perusahaan</strong></label>
                        <textarea name="misi" id="misi" class="@error('misi') is-invalid
                            @enderror">{!! $item->misi !!}</textarea>
                        <div class="invalid-feedback">
                            Wajib Diisi | Min 10 Karakter.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                    <textarea name="alamat" id="alamat" class="@error('alamat') is-invalid
                    @enderror">{!! $item->alamat !!}</textarea>
                    <div class="invalid-feedback">
                        Wajib Diisi | Min 10 Karakter.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label"><strong>No Handphone</strong></label>
                    <input type="text" class="form-control @error('no_hp') is-invalid
                    @enderror" name="no_hp" id="no_hp" value="{{ $item->no_hp }}">
                    <div class="invalid-feedback">
                        Wajib Diisi | Min 5 Karakter.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email Perusahaan</strong></label>
                    <input type="email" class="form-control @error('email') is-invalid
                    @enderror" name="email" id="email" value="{{ $item->email }}">
                    <div class="invalid-feedback">
                        Wajib Diisi | Min 5 Karakter.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label"><strong>Logo Perusahaan</strong></label>
                    <img src="{{ asset('Image/'. $item->gambar) }}" class="img-fluid col-sm-5 mb-3 d-block" alt="">
                    <input type="file" class="form-control @error('logo') is-invalid
                    @enderror" name="logo" id="logo">
                    <div class="invalid-feedback">
                        Wajib Diisi | Format file jpg, jpeg, png.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/dashboard" class="btn btn-danger">Kembali</a>
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('textarea')
<script>
    tinymce.init({
        selector: '#tentang_kami',
        height: 250,
    });

    tinymce.init({
        selector: '#visi',
        height: 300,
    });

    tinymce.init({
        selector: '#misi',
        height: 300,
    });

    tinymce.init({
        selector: '#alamat',
        height: 250,
    });

</script>
@endsection
