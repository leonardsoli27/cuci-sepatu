@extends('admin.layout.main')

@section('pesanan', 'active')
@section('prosedur', 'active')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Pesanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Prosedur Pesanan</li>
    </ol>

    <div class="row">
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-clipboard-list"></i>
                    Prosedur Pesanan
                </div>
                <div class="card-body">
                    <form action="{{ route('tbhProsedur') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_prosedur" class="form-label">Nama Prosedur</label>
                            <input type="text" class="form-control @error('nama_prosedur') is-invalid
                            @enderror" name="nama_prosedur" id="nama_prosedur">
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 5 Karakter.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="@error('deskripsi') is-invalid
                            @enderror"></textarea>
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 10 Karakter.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/psdPesanan" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('textarea')
<script>
    tinymce.init({
        selector: '#deskripsi',
        height: 300,
    });

</script>
@endsection
