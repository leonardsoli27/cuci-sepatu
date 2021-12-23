@extends('admin.layout.main')

@section('dashboard', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-8">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"><strong>{{ $jmlPromosi }}</strong></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <strong>Jumlah Promosi</strong>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-8">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body"><strong>{{ $jmlLayanan }}</strong></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <strong>Jumlah Pelayanan</strong>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-8">
            <div class="card bg-success text-white mb-4">
                <div class="card-body"><strong>{{ $jmlProsedur }}</strong></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <strong>Jumlah Prosedur</strong>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Profil Perusahaan
        </div>
        <div class="card-body">
            @foreach ($profil as $item)
            <form>
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="id_profil" value="{{ $item->id_profil }}">
                    <label for="nama_perusahaan" class="form-label"><strong>Nama Perusahaan</strong></label>
                    <br>
                    {{ $item->nama }}
                </div>
                <div class="mb-3">
                    <label for="tentang_kami" class="form-label"><strong>Tentang Kami</strong></label>
                    <br>
                    {!! $item->tentang_kami !!}
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-lg-6">
                        <label for="visi" class="form-label"><strong>Visi Perusahaan</strong></label>
                        <br>
                        {!! $item->visi !!}
                    </div>
                    <div class="col-lg-6">
                        <label for="misi" class="form-label"><strong>Misi Perusahaan</strong></label>
                        <br>
                        {!! $item->misi !!}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                    <br>
                    {!! $item->alamat !!}
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label"><strong>No Handphone</strong></label>
                    <br>
                    {{  $item->no_hp  }}
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email Perusahaan</strong></label>
                    <br>
                    {{  $item->email  }}
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label"><strong>Logo Perusahaan</strong></label>
                    <br>
                    <img class="img-fluid d-block mb-3 col-sm-5" src="{{ asset('Image/' . $item->gambar) }}" alt="">
                </div>
                <a href="/edtProfil/{{ $item->id_profil }}" class="btn btn-primary">Edit</a>
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
