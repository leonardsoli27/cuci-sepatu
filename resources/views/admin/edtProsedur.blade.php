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
                    @foreach ($prosedur as $item)
                    <form action="{{ route('edtProsedur') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_prosedur" value="{{ $item->id_prosedur }}">
                        <div class="mb-3">
                            <label for="nama_prosedur" class="form-label">Nama Prosedur</label>
                            <input type="text" class="form-control @error('nama_prosedur') is-invalid
                            @enderror" name="nama_prosedur" id="nama_prosedur" value="{{ $item->nama }}">
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 5 Karakter.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="@error('deskripsi') is-invalid
                            @enderror" id="deskripsi">{{ $item->deskripsi }}</textarea>
                            <div class="invalid-feedback">
                                Wajib Diisi | Min 10 Karakter.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="/psdPesanan" class="btn btn-danger">Kembali</a>
                    </form>
                    @endforeach
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
